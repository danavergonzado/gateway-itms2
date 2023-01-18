<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UsersController extends BaseController
{

	private $user;

	function __construct()
	{
		helper(['status', 'user', 'gw_view','count']);
		$this->user = new UsersModel();
	}
	

	// this will return TRUE if the current user is logged in or not
	function isLoggedIn()
	{
		return session()->has('logged_in') ? true : false;
	}


	// this will return TRUE if the current user is ad admin or just an ordinary user
	function isAdmin()
	{
		$admin_rights = array('admin', 'superadmin');
		$logged_user = session()->get('username');
		return (in_array($logged_user, $admin_rights)) ? TRUE : FALSE;
	}
	
	function get_role($userid)
	{
		$user_count = $this->user->find($userid);
		if( count($user_count) != 0) {
			$user_data = $this->user->where('id', $userid)->findAll();
			$user_role = $user_data[0]['role'];
		}
		else{
			return 0;
		}
		return $user_role;
	}

	// view users profile/ profile page
	function user_profile()
	{
		return view('users/profile');
	}

	function update_password()
	{
		$new_pass = $this->request->getPost('new_pass');
		$conf_pass = $this->request->getPost('conf_pass');

		switch($new_pass)
		{
			
			case (strlen($new_pass) > 10): 
				$error[] = "Password must not exceed to 10 characters."; 
				break;
			
			case (strlen($new_pass) <= 5): 
				$error[] = "Password must not lesser than 6 characters."; 
				break;

			case ($new_pass != $conf_pass): 
				$error[] = "Password mismatch";
				break;
	
		}

		if(empty($error))
		{
			try {
				$response = $this->user->where('id', session()->get('userid'))
						->set([ 'password' => password_hash($new_pass, PASSWORD_DEFAULT)])
						->update();
			} catch (\Throwable $th) {
				$response = $th->getMessage();
			}
		}
		else
		{
			$response = $error;
		}

		return json_encode($response);

	}
}
