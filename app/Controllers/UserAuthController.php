<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\UserController;
use App\Models\UsersModel;


class UserAuthController extends BaseController
{

	protected $validated; 

	function login()
	{
		// 1. Set rules
		$rules = [
			'username' => [
				'rules'		=>	'required|min_length[5]|max_length[12]',
				'errors'	=>	[
					'required'		=>	'Username is required',
					'min_length'	=>	'Username is lesser than minimum required.',
					'max_length'	=>	'Username should not be more than 12 characters.'
				]
			],

			'password' => [
				'rules'		=>	'required|min_length[5]|max_length[10]',
				'errors'	=>	[
					'required'		=>	'Password is required',
					'min_length'	=>	'Password is lesser than the minimum required.',
					'max_length'	=>	'Password should not be more than 10 characters.'
				]
			],
		];

		// 2. Validate data base on rules 
		//return $this->validated = ($validated) ? true :  false; //$this->validator->listErrors(); --> display errors

		$validated = $this->validate($rules);

		if($validated) {
			$user = new UsersModel();
			$post_username = $this->request->getPost('username');
			$post_password =  $this->request->getPost('password');

			$user_data = $user->where('username', $post_username)->findAll();

			if(count($user_data) !=0){

				if (password_verify($post_password,  $user_data[0]['password'])) {
					$session_vars = [
						'username' => $user_data[0]['username'],
						'userid'	=> $user_data[0]['id'],
						'userbranch'	=> $user_data[0]['branch'],
						'logged_in' => true
						];
						session()->set($session_vars);
						return redirect()->to('/');
				} else {
					$data['errors']  = 'Invalid Password.';
				}
			}else{
				$data['errors'] = "Credentials not accepted. Check your username or password.";
			}
		}else {
				$data['errors'] = $this->validator->listErrors();
		}
                                                                                                                                                                                                                                                                                                                    
		return view('/login', $data);  
		
	}




}
