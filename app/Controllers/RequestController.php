<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\UsersController;
use App\Controllers\CommentsController;
use App\Controllers\OrderController;
use App\Models\RequestModel;

class RequestController extends BaseController
{

	private $contUser;
	private $contRequest;
	private $contOrder;
	private $contComment;

	function __construct()
	{
		helper(['status', 'user', 'gw_view']);

		$this->contUser = new UsersController();
		$this->contRequest = new RequestModel();
		$this->contOrder = new OrderController();
		$this->contComment = new CommentsController();

	}

	
	public function index()
	{
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}


		if($this->contUser->isAdmin())
		{
			$requests = $this->contRequest->where('description !=""')
							->findAll();
		}else{
			$requests = $this->contRequest->where('status !="Closed" AND status !="Suspend" and description !=""')
							->where('subject != "Task"')
							->where('addedby', session()->get('username'))
							->orWhere('in_public ="1" AND status !="Closed" AND subject = "Purchase"')
							->findAll();
		}

	
		$data['requests'] = $requests;
		return view('requests/index', $data);
	}

	public function view($id)
	{
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		if(isset($id))
		{
			$data = [
				'request' => $this->contRequest->find($id),
				'orders' => $this->contOrder->getOrdersByRequest($id),
				'comments' => $this->contComment->getCommentsByRequest($id)
			];

			return view('requests/view', $data);
		}
	}

	public function print($id)
	{
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		if(isset($id)){
			$data['request'] = $this->contRequest->find($id);

			if(session()->get('username') == $data['request']->addedby){
				return view('requests/print', $data);
			}else{
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		}
	}


	public function AddRequest()
	{
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		return view('requests/add');
	}

	public function EditRequest($id)
	{
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		$data['request'] = $this->contRequest->find($id);
		return view('requests/edit', $data);
	}

	public function LoadCategory($id)
	{
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		$data = $this->contRequest->find($id);
		
		return json_encode($data);
	}

	
	public function save()
	{	
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		$requestmodel = new RequestModel();
		$data = [
			'requestor'		=>	$this->request->getPost('requestor'),
			'branch'		=>	$this->request->getPost('branch'),
			'department'	=>	$this->request->getPost('department'),
			'subject'		=>	$this->request->getPost('subject'),
			'category'		=>	$this->request->getPost('category'),
			'priority'		=>	$this->request->getPost('priority'),
			'description'	=>	$this->request->getPost('description'),
			'addedby'		=>	session()->get('username'),
			'search_tag'	=>	$this->request->getPost('search_tag'),
			'status'		=>	'New'
		];

		if($data != null){
			return ($requestmodel->insert($data)) ? 'true' : 'false';
		} 
	}

	public function UpdateRequest()
	{	
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		$requestmodel = new RequestModel();

		$data = [
			'requestor'		=>	$this->request->getPost('requestor'),
			'branch'		=>	$this->request->getPost('branch'),
			'department'	=>	$this->request->getPost('department'),
			'subject'		=>	$this->request->getPost('subject'),
			'category'		=>	$this->request->getPost('category'),
			'priority'		=>	$this->request->getPost('priority'),
			'description'	=>	$this->request->getPost('description'),
			'search_tag'	=>	$this->request->getPost('search_tag'),
			'status'		=>	$this->request->getPost('status'),
		];

		$request_id = $this->request->getPost('request_id');
		if($data != null){
			return ($requestmodel->update($request_id,$data)) ? 'true' : 'false';
		} 
	}

	public function AddRequestTask()
	{
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		return view('task/add');
	}

	public function TaskList()
	{
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		$data['tasks'] = $this->contRequest
								->where('subject = "Task" and description != ""')
								->where('addedby', session()->get('username'))
								->where('status !=', 'Closed')
								->findAll();
		return view('task/index', $data);
	}

	public function closeRequest(){
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		$data = [
			'status' =>	'Closed',
		];

		$requestID = $this->request->getPost('reqID');
		if($requestID != null){
			return  ($this->contRequest->update($requestID,$data)) ? 'true' : 'false';
		}
	}

	function isPublic(){
		
		
		$data = [
			'in_public' =>	'1',
		];
	
		$requestID = $this->request->getPost('reqID');
		 if($requestID != null){
		 	return  ($this->contRequest->update($requestID,$data)) ? 'true' : 'false';
		}
		
	}


	public function GatepassList()
	{
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		if($this->contUser->isAdmin())
		{
			$gatepass = $this->contRequest->where('status !=', 'Closed')
							->where('subject =','Gatepass')
							->findAll();
		}else{
			$gatepass = $this->contRequest->where('status !=', 'Closed')
								->where('subject = "Gatepass"')	
								->where('addedby', session()->get('username'))
								->findAll();
		}

		$data['gatepass'] = $gatepass;
		return view('gatepass/index', $data);
	}

	public function ForRepairList()
	{
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		if($this->contUser->isAdmin())
		{
			$for_repairs = $this->contRequest->where('status !=', 'Closed')
							->where('subject =','For Repair')
							->findAll();
		}else{
			$for_repairs = $this->contRequest->where('status !=', 'Closed')
								->where('subject =','For Repair')	
								->where('addedby', session()->get('username'))
								->findAll();
		}
		$data['for_repairs'] = $for_repairs;
		return view('for_repair/index', $data);
	}

	public function EmailAccountList()
	{
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		if($this->contUser->isAdmin())
		{
			$email_accounts = $this->contRequest->where('status !=', 'Closed')
							->where('subject =','Email Accounts')
							->findAll();
		}else{
			$email_accounts = $this->contRequest->where('status !=', 'Closed')
								->where('subject = "Email Accounts"')	
								->where('addedby', session()->get('username'))
								->findAll();
		}

		$data['email_accounts'] = $email_accounts;
		return view('email_accounts/index', $data);
	}


	public function ObPassList(){
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		if($this->contUser->isAdmin()){
			$ob_pass = $this->contRequest->where('status !=','Closed')
					->where('subject =','OB Pass')
					->findAll();
		} else {
			$ob_pass = $this->contRequest->where('status !=','Closed')
						->where('subject =','OB Pass')
						->where('addedby', session()->get('username'))
						->findAll();
		}

		$data['ob_pass'] = $ob_pass;
		return view('obpass/index',$data);
	}

	public function FundsList(){
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		if($this->contUser->isAdmin()){
			$funds = $this->contRequest->where('status !=','Closed')
					->where('subject =','Funds')
					->findAll();
		} else {
			$funds = $this->contRequest->where('status !=','Closed')
						->where('subject =','Funds')
						->where('addedby', session()->get('username'))
						->findAll();
		}

		$data['funds'] = $funds;
		return view('funds/index',$data);
	}

	public function TravelList(){
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		if($this->contUser->isAdmin()){
			$travel = $this->contRequest->where('status !=','Closed')
					->where('subject =','Travel')
					->findAll();
		} else {
			$travel = $this->contRequest->where('status !=','Closed')
						->where('subject =','Travel')
						->where('addedby', session()->get('username'))
						->findAll();
		}

		$data['travels'] = $travel;
		return view('travel/index',$data);

		
	}

	public function ItemPullOutList(){
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		if($this->contUser->isAdmin()){
			$item_pullout = $this->contRequest->where('subject =','Item Pullout')
					->findAll();
		} else {
			$item_pullout = $this->contRequest->where('subject =','Item Pullout')
						->where('addedby', session()->get('username'))
						->findAll();
		}

		$data['item_pullouts'] = $item_pullout;
		return view('item_pullout/index',$data);

		
	}

	public function Search(){
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		$search = $this->request->getPost('search');
		
		if($search != null){
			$query = $this->contRequest
						->where('description like "%'.$search.'%"')
						->orWhere('id =',$search)
						->findAll();

			$data['search'] = $query;
			return view('search/index',$data);
		} 
		
	}
}
