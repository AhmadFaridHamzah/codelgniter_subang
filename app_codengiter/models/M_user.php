<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {



	public function get_user_list(){

		$this->db->select('*');
		$this->db->from('user');
		$query=$this->db->get();

		if($query->num_rows()> 0){
			return $query->result();
		}

		



	}





}
