<?php

namespace App\Controllers;

use App\Models\RequestModel;
use App\Controllers\UsersController;


class Home extends BaseController
{
	protected $user;
	protected $modRequest;

	function __construct()
	{
		$this->user = new UsersController();
		helper('status');
		//helper('notification');
	}


	public function index(){
		return ($this->user->isLoggedIn()) ?  redirect()->to('/task-list') : view('login');

		//$data['count_email_accounts']	= this->modRequest->where('status !=', 'Done')->findAll();
		
	}



	public  function login(){
		return ($this->user->isLoggedIn()) ?  redirect()->to('/') : view('login');
	}

	public  function logout()
	{
		session()->destroy();
		return view('login');
	}
}
