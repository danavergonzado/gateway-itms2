<?php


use App\Controllers\UsersController;
use App\Models\RequestModel;


    function count_email_accounts(){
            $users = new UsersController;
            $request = new RequestModel();
           
            if($users->isAdmin())
	    	{
			$count = $request->where('status =','New')->where('subject =','Email Accounts')->get()->getNumRows();
            
		    }else{

            $count = $request->where('status =','New')->where('subject =','Email Accounts')->where('addedby', session()->get('username'))
                ->get()
                ->getNumRows();
        }
        return $count;
    }

    function count_request(){
        $users = new UsersController;
        $request = new RequestModel();
       
        if($users->isAdmin())
        {
        $count = $request->where('status =','New')->where('subject =','Purchase')->get()->getNumRows();
        
        }else{

        $count = $request->where('status =','New')->where('subject =','Purchase')->where('addedby', session()->get('username'))

            ->get()
            ->getNumRows();
       }
    return $count;
    }

?>