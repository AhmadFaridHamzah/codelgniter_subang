<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_order extends CI_Model {


		
		public function get_orderlist($id=''){

				$this->db->select('c.last_name as cus_name,e.last_name staff_name,o.*');
				$this->db->from('orders o');
				$this->db->join('customers c','c.id=o.customer_id','right');
				$this->db->join('employees e','e.id=o.employee_id','right');

				if(!empty($id)){
					$this->db->where('id',$id);
				}
				

			    $query=$this->db->get();


            if($query->num_rows() > 0){
            		return $query->result();
            }


		}




}


