<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Usercontrol extends CI_Controller {



public function index(){
	$data['title']='test';

 $datav['content']  = $this->load->view('admin/v_admin',$data,true);	

	$this->load->view('template/template1',$datav);


}

}

