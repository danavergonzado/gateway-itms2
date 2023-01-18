<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\UsersController;
use App\Models\OrdersModel;
use App\Models\RequestModel;

class OrderController extends BaseController
{
	private $contOrder;
	private $contUser;
	private $modRequest;
	

	function __construct()
	{
		helper(['status', 'user', 'gw_view']);
		$this->contUser = new UsersController();
		$this->contOrder = new OrdersModel();
		$this->modRequest = new RequestModel();
	}

	
	public function index()
	{
		$user = new UsersController();
		if(!$user->isLoggedIn()){
			return redirect()->to('/login');
		}
		
		$user_role = $user->get_role(session()->get('userid'));

		if( ($user_role == 'admin') OR ($user_role == 'superadmin') ) {
			$orders = new OrdersModel();
			$data['orders'] = $orders->where('status !=','Closed')->findAll();
			return view('orders/index', $data);
		}else{
			$data['error_message'] = "Unauthorize Access: The list you are trying to view may not be found or forbidden.";
			return view('custom_errors/common', $data);
		}
		
	}

	public function addOrder()
	{
	
		$data['requests'] = $this->modRequest->where('subject =','Purchase')->findAll();

		
		return view('orders/add',$data);
	}

	public function getOrdersByRequest($requestno)
	{
		$order = new OrdersModel();
		$orders = $order->where('req_no', $requestno)->findAll();
		return (count($orders)!= 0) ? $orders : NULL;
	}

	public function viewOrder($id){
		if(!$this->contUser->isLoggedIn()){
			return redirect()->to('/login');
		}

		if(isset($id))
		{
			$data = [
				'orders' => $this->contOrder->find($id),
			];

			return view('orders/view', $data);
		}
	}

	public function closePO(){
			$data = [
			'status' =>	'Closed',
		];

		$order_id = $this->request->getPost('orderID');
		if($order_id != null){
			return  ($this->contOrder->update($order_id,$data)) ? 'true' : 'false';
		} 
	}
}
