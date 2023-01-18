<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Controllers\UsersController;
use App\Controllers\CommentsController;
use App\Controllers\OrderController;
use App\Models\AssetModel;

class AssetController extends BaseController
{

    private $contUser;
	private $modAsset;


    function __construct()
	{
        helper(['status', 'user', 'gw_view']);

		$this->contUser = new UsersController();
		$this->modAsset = new AssetModel(); 
        
	}

	public function index()
    {
        

		$assets = $this->modAsset->orderBy('id','DESC')
					->findAll();
		
		
		$data['assets'] = $assets;
		return view('asset/list',$data);
    }


    function AddAsset()
    {   
        if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		return view('asset/add');
    }

    function list()
    {
		$assets = $this->modAsset->findAll();
		
		$data['assets'] = $assets;
		return view('asset/list',$data);
    }

    function view($id)
    {
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		if(isset($id))
		{
			$data = [
				'asset' => $this->modAsset->find($id)
			];

		}
		return view('asset/view', $data);
    }

    public function save()
	{	

		
		$data = [
			'item'		            =>	$this->request->getPost('item'),
			'asset_no'		        =>	$this->request->getPost('asset_no'),
			'model_no'	            =>	$this->request->getPost('model_no'),
			'description'	        =>	$this->request->getPost('description'),
			'branch'		        =>	$this->request->getPost('branch'),
			'date_acquired'	        =>	$this->request->getPost('date_acquired'),
			'doc_reference_no'	    =>  $this->request->getPost('doc_reference_no'),
			'dr_no'	                =>	$this->request->getPost('dr_no'),
            'operational_status'    =>	$this->request->getPost('operational_status'),
			'remarks'		        =>	$this->request->getPost('remarks')
		];

		if($data != null){
			return ($this->modAsset->insert($data)) ? 'true' : 'false';
		} 
	}

	public function editAsset($id){
		
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		if(isset($id))
		{
			$data = [
				'asset' => $this->modAsset->find($id)
			];

		}

		return view('asset/edit', $data);
	}

	public function UpdateAsset(){
		if(!$this->contUser->IsLoggedIn()){
			return redirect()->to('/login');
		}

		$data = [
			'item'		            =>	$this->request->getPost('item'),
			'asset_no'		        =>	$this->request->getPost('asset_no'),
			'model_no'	            =>	$this->request->getPost('model_no'),
			'description'	        =>	$this->request->getPost('description'),
			'branch'		        =>	$this->request->getPost('branch'),
			'date_acquired'	        =>	$this->request->getPost('date_acquired'),
			'doc_reference_no'	    =>  $this->request->getPost('doc_reference_no'),
			'dr_no'	                =>	$this->request->getPost('dr_no'),
            'operational_status'    =>	$this->request->getPost('operational_status'),
			'remarks'		        =>	$this->request->getPost('remarks')
		];

		$asset_id = $this->request->getPost('asset_id');
		if($data != null){
			return ($this->modAsset->update($asset_id,$data)) ? 'true' : 'false';
		} 
	}
}
