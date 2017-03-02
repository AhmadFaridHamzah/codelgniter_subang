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

$datav['content']=$this->load->view("employee/employee_list.php",$data,true);
$this->load->view('template/template1',$datav);
  


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




public function add_employee(){

$this->form_validation->set_rules('email_emply','Email','required|valid_email|is_unique[employees.email_address]|matches[email_emplycheck]');
$this->form_validation->set_rules('first_name','First Name','required|regex_match[/^[a-z .,\-]+$/i]');
$this->form_validation->set_rules('email_emplycheck','Email','required|valid_email');  
 $this->form_validation->set_rules('last_name','Last Name','required|callback_check_lastname');  
  $this->form_validation->set_message('regex_match','Tidak sah sila masukan Huruf Sahaja');

if ($this->form_validation->run() == false){


$data['title']='add';
$datav['content']=$this->load->view("employee/v_addemployee",$data,true);
$this->load->view('template/template1',$datav);


}else{
 $first_name=$this->input->post('first_name',true);
 $last_name=$this->input->post('last_name',true);
 $email_emply=$this->input->post('email_emply',true);


	$dataempy=['first_name'=>$first_name,
				'last_name'=>$last_name,
				'email_address'=> $email_emply];



 $id=$this->m_employee->insertEmployee($dataempy);

 	if($id){
 		   $data['name']=$first_name.' '.$last_name ;
		   $data['info_tugas']='tugas-tugas khas';

 	$templateletter=$this->load->view('/employee/v_templateemail',$data,true);
	$emaildata=[[

			'from'=>'sukor.muhammad@gmail.com',
			'from_name'=>'abu',
			'to'=> $email_emply,
			'cc'=>'sukor.muhammad@gmail.com',
			'subject'=>'test',
			'message'=>$templateletter

	]];

	$this->func->sendEmailmpsj($emaildata);






 	$idex=encryptInUrl($id);
 	$this->session->set_flashdata('msg','Berjaya');
	redirect('admin/employeescontrol/detail_employee/'.$idex);

 	}else{

$data['title']='add';
$datav['content']=$this->load->view("employee/v_addemployee",$data,true);
$this->load->view('template/template1',$datav);
 	}


}



}




public function check_lastname($val){

		if($val=='test'){

			 $this->form_validation->set_message('check_lastname','{field} Tidak boleh masukan Test');
			 return false;
		}else{

			return true;
		}


}



public function delete_employee($id){

	$idclear=decryptInUrl($id);


	$this->db->where('id',$idclear);
	$this->db->delete('employees');

	


}


public function testemail(){

		$data['name']='abu';
		$data['info_tugas']='tugas-tugas khas';

	$templateletter=$this->load->view('/employee/v_templateemail',$data,true);

	$emaildata=[[

			'from'=>'syntaxerror.brontox@gmail.com',
			'from_name'=>'abu',
			'to'=>['syntaxerror.brontox@gmail.com','sukor.muhammad@gmail.com'],
			'cc'=>'sukor.muhammad@gmail.com',
			'subject'=>'test',
			'message'=>$templateletter


	]];

	$this->func->sendEmailmpsj($emaildata);
}




}
