<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Controllers\UsersController;
use App\Models\TodoModel;

class TodoController extends BaseController
{

    private $contUser;
	private $modTodo;


    function __construct()
	{
        helper(['status', 'user', 'gw_view']);

		$this->contUser = new UsersController();
        $this->modTodo = new TodoModel();
        
	}

	public function index()
    {
        
		$todos = $this->modTodo->findAll();
		$data['todos'] = $todos;
		return view('todo/index',$data);
    }
    

    public function view($id)
    {
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		if(isset($id))
		{
			$data = [
				'asset' => $this->modTodo->find($id)
			];

		}
		return view('todo/view', $data);
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
