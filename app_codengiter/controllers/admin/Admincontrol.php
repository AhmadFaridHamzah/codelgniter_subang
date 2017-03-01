<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admincontrol extends CI_Controller {

function __construct(){

	parent::__construct();
	$this->load->model("m_user");
  $this->load->model("m_employee");
}


public function index(){

	echo 'ini index';
}


public function admin1(){


$data['title']='test';
$data['name']='abu bin ali';
$data['arrayvalue']=['test','test3','test4'];



  
  $datav['content']=$this->load->view('hello/v_test',$data,true);

  $this->load->view('template/template1',$datav);




}


public function admin2(){
	
$data['title']='test';
  $datav['content']=$this->load->view('hello/v_test2',$data,true);

  $this->load->view('template/template1',$datav);

}



public function userlist(){
	

  $data['title']='user list';

  $data['user']=  $this->m_user->get_user_list();

  print_r($data['user']);
  $this->output->enable_profiler(TRUE);

  $datav['content']=$this->load->view('admin/v_listuers',$data,true);

  $this->load->view('template/template1',$datav);

}




public function employeelist(){
  

  $data['title']='employeelist';

  $data['employees']=  $this->m_employee->get_employees_list();

  // print_r($data['user']);
  // $this->output->enable_profiler(TRUE);

  $datav['content']=$this->load->view('admin/v_listuers',$data,true);

  $this->load->view('template/template1',$datav);

}

public function addemployee(){
  

  $data['title']='employeelist';



  $datav['content']=$this->load->view('admin/add_employee',$data,true);

  $this->load->view('template/template1',$datav);

}


    /******************************************
     author:
     date:
     ********************************************/
  public function add_employees_prosse(){


        $data['title']='hello wolrd';

        $this->form_validation->set_rules('firstName',"First Name",'required|alpha|callback_nameCheck');
        $this->form_validation->set_rules('lastName',"Last Name",'required|alpha|callback_nameCheck');
        $this->form_validation->set_rules('email',"Email",'required|valid_email|is_unique[employees.email]|matches[emailp]');
        $this->form_validation->set_rules('emailp',"Email",'required|valid_email|is_unique[employees.email]');
        $this->form_validation->set_message('required','%s Wajib Di isi');
        $this->form_validation->set_message('alpha','%s Huruf sahaja');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">','</div>');
        



        if($this->form_validation->run()==false){


            $datav['content']= $this->load->view('admin/add_employee',$data='',true);
$this->load->view('template/template1',$datav);
       
        }else{

          $firstName=$this->input->post('firstName',TRUE);
          $lastName=$this->input->post('lastName',TRUE);
          $email=$this->input->post('email',TRUE);


          $dataepmloyes=array(
                  'firstName'=>$firstName,
                  'lastName'=>$lastName,
                  'email'=>$email,

            );

     $secc=$this->m_c->add_employees($dataepmloyes);

     if($secc){


            redirect('customer/customer/success_add_employee/'.$secc);


     }else{



     }


      

         

        }
   


        }



}