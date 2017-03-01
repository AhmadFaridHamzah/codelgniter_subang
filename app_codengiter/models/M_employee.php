<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_employee extends CI_Model {


		
		public function get_employee($id=''){

				$this->db->select('*');
				$this->db->from('employees');

				if(!empty($id)){
					$this->db->where('id',$id);
				}
				

			    $query=$this->db->get();


            if($query->num_rows() > 0){

            	$datasempy=$query->result();

            	foreach ($datasempy as $row) {
            	$sale=$this->get_sale_employee($row->id);
            	$d[]=['employees'=>$row,
            		'sale'=>$sale];

            	}

            	return $d;
            		
            }


		}




		public function get_sale_employee($id){

				$this->db->select('*');
				$this->db->from('orders');

				if(!empty($id)){
					$this->db->where('employee_id',$id);
				}
				

			    $query=$this->db->get();


            if($query->num_rows() > 0){

            		return $query->result();
            }



		}




}


