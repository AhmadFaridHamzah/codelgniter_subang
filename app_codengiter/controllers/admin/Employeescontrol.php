<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Employeescontrol extends CI_Controller {

function __construct(){

	parent::__construct();
	$this->load->model("m_employee");

}


public function get_employeelist($id=''){

$data['employeelist']=	$this->m_employee->get_employee($id);
// echo "<pre>";

// print_r($data['employeelist']);
// echo "</pre>";
// die();
//$this->output->enable_profiler(true);
   
   // $this->benchmark->mark("ayam");
  
   // $this->benchmark->mark("monyet");

   // echo $this->benchmark->elapsed_time('ayam','monyet')."<br>";
  
$datav['content']=$this->load->view("employee/employee_list.php",$data,true);
$this->load->view('template/template1',$datav);

}


public function detail_employee($id=''){

$idclear=decryptInUrl($id);
$data['employeelist']=	$this->m_employee->get_employee($idclear);

print_r($data['employeelist']);
  


}

public function edit_employee($id=''){

$idclear=decryptInUrl($id);
$data['employeelist']=	$this->m_employee->get_employee($idclear);


    
$datav['content']=$this->load->view("employee/v_editemployee",$data,true);
$this->load->view('template/template1',$datav);


}

public function update_employee(){
	
	$first_name=$this->input->post('first_name',true);
	$last_name=$this->input->post('last_name',true);
	$email_emply=$this->input->post('email_emply',true);
	$id=$this->input->post('id',true);

	$dataupdate=['last_name'=>$last_name,
	'first_name'=>$first_name,
	'email_address'=>$email_emply
	];

	$this->db->where('id',$id);
	$this->db->update('employees',$dataupdate);

		$idex=encryptInUrl($id);
	redirect('admin/employeescontrol/detail_employee/'.$idex);



}










}
