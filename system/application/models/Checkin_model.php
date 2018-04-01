<?php
 class checkin_model extends CI_Model{

	 public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        		$this->load->helper('form');
        }


       public function insert_user($arr){

        	//Extract Data

        	$first_name = $arr["first_name"];
    		$last_name = $arr["last_name"];
    		$contact_number = $arr["contact_number"];

    		log_message('info','value of first name '.$first_name);
    		log_message('info','value of last name '.$last_name);
    		log_message('info','value of contact_number '.$contact_number);
    		
    		//check if user exists

    		$customer_id = $this->check_user_exists($first_name, $last_name , $contact_number);

    		log_message('info', 'After the check user exists customer_id value '.$customer_id);

    		if($customer_id != ''){
    			return $customer_id;
    		}
    		else{
    			//Insert User data;
    			try {
    				$this->db->set('customer_id','');
    				$this->db->set('last_modified', 'NOW()', FALSE);
    				$this->db->insert('fms_customer',$arr);
    				$customer_id=$this->db->insert_id();
    				return $customer_id;
    			} catch (Exception $e) {
    				echo $e->getMessage();
    			}


    		}

        }

        public function check_user_exists($first_name,$last_name,$contact_number){
        	try {
        		$id = '';;
	        	$query = $this->db->get_where('fms_customer', array('first_name' => $first_name, 'last_name' => $last_name, 'contact_number' => $contact_number));
	        	foreach ($query->result() as $row)
				{
				       $id =  $row->customer_id;
				       log_message('info','inside foreach where check user id value is '.$id);
				}

				log_message('info','in check user id value is '.$id);
				return $id;
				/*
				if($query->num_rows() > 0){
					//
					$id = $query->row()->customer_id;
					log_message('info', 'In check user exists and user exists  '.$id);
					return $id;
				}
				else{
					$id = '';
					log_message('info', 'In check user exists and user not exists  '.$id);
					return $id;
				}
				*/

        	} catch (Exception $e) {
        		echo $e->getMessage();
        	}
        	
        }

        public function insert_reservation($arr){
        	log_message('info', 'Inside the Insert Reservation');
        	try {
        		$this->db->set('reservation_id','');
    			$this->db->set('last_modified', 'NOW()', FALSE);
    			$this->db->insert('fms_reservation',$arr);
    			$reservation_id=$this->db->insert_id();
    			return $reservation_id;
        	} catch (Exception $e) {
        		echo $e->getMessage();        		
        	}
        	
        }
}



?>