<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Orderscontrol extends CI_Controller {

function __construct(){

	parent::__construct();
	$this->load->model("m_order");

}


public function get_orderlist($id=''){

$data['listorder']=	$this->m_order->get_orderlist($id);
// echo "<pre>";
// print_r($data['listorder']);
// echo "<pre>";
// die();

$datav['content']=$this->load->view("order/v_listorder",$data,true);
$this->load->view('template/template1',$datav);

}






}
