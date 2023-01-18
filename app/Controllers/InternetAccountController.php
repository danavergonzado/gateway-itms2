<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\UsersController;
use App\Models\InternetAccountModel;

class InternetAccountController extends BaseController
{
    private $contUser;
    private $modInternetAccount;

    function __construct(){
        helper(['count','gw_view','status','user']);

        $this->contUser = new UsersController();
        $this->modInternetAccount = new InternetAccountModel();
    }

    public function index()
	{
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		$internet_accounts = $this->modInternetAccount->findAll();

		$data['internet_accounts'] = $internet_accounts;
		return view('internet_account/index', $data);
	}

    public function view($id)
	{
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		if(isset($id))
		{
			$data = [
				'internet_account' => $this->modInternetAccount->find($id)
			];

			return view('internet_account/view', $data);
		}
	}

	public function AddAccount()
	{
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		return view('internet_account/add');
	}

	public function save(){	
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		$accountmodel = new InternetAccountModel();
		$data = [
			'no'				=>	$this->request->getPost('no'),
			'name'				=>	$this->request->getPost('name'),
			'type'				=>	$this->request->getPost('type'),
			'provider'			=>	$this->request->getPost('provider'),
			'branch'			=>	$this->request->getPost('branch'),
			'circuit_no'		=>	$this->request->getPost('circuit_no'),
			'plan_amount'		=>	$this->request->getPost('plan_amount'),
			'plan_type'         =>  $this->request->getPost('plan_type'),
			'date_installed'	=>	$this->request->getPost('date_installed'),
			'details'			=>	$this->request->getPost('details')
		];

		if($data != null){
			return ($accountmodel->insert($data)) ? 'true' : 'false';
		} 
	}
}

?>