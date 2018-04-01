<?php defined('BASEPATH') OR exit('No direct script access allowed');


// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class checkin extends REST_Controller{

	function __construct()
    {
        // Construct our parent class
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model("checkin_model");
  		$this->load->library('pagination');
  		$this->load->library('session');
  		$this->load->library('table');

    }
    public function data_post(){

    		log_message('info', 'Inside the data_post of Controller');

    		//Set Post Data to Variables
    		$first_name = $this->post('first_name');
    		$last_name = $this->post('last_name');
    		$contact_number = $this->post('contact_number');
    		$email = $this->post('email');
    		$address = $this->post('address');
    		$age = $this->post('age');
    		$dob = $this->post('dob');
    		
    		log_message('info', 'After the user data set in data_post');

    		//Reservation attributes
    		$checkin = $this->post('checkin');
    		$hotel_name = $this->post('hotel_name');
    		$hotel_location = $this->post('hotel_location');
    		$room_type = $this->post('room_type');

    		log_message('info', 'After the reservation data set in data_post');

    		//check if firstname and last name are set

    		if($first_name == ''){
    			$message =array('error'=>true,'message' => 'customer first name is missing');
    			$this->response($message, 200);
    		}

    		if($last_name == ''){
    			$message =array('error'=>true,'message' => 'customer last name is missing');
    			$this->response($message, 200);	
    		}

    		//check if contact number is set and length is correct or not
    		if($contact_number == '' or !preg_match("/^[789]\d{9}$/", $contact_number)){

    			$message =array('error'=>true,'message' => 'Mobile number is mandatory and it should be 10 digit length starting from 7-9');
    			$this->response($message, 200);	
    		}

    		//validate age is present or not.

    		if($age == ''){
    			$message =array('error'=>true,'message' => 'Age is missing');
    			$this->response($message, 200);		
    		}

    		//Check if reservation data is present in post are not.
    		if($checkin == ''){
    			$message =array('error'=>true,'message' => 'Checkin Time is missing');
    			$this->response($message, 200);
    		}
    		if($hotel_name == '' || $hotel_location == ''){
    			$message =array('error'=>true,'message' => 'Hotel name or Location is missing');
    			$this->response($message, 200);
    		}
    		if($room_type == ''){
    			$message =array('error'=>true,'message' => 'Room Type is missing');
    			$this->response($message, 200);
    		}

    		//Prepare User array
    		$user = array('first_name' => $first_name,'last_name' => $last_name,'contact_number' => $contact_number,'email' => $email,'address' => $address,'age' => $age,'dob' => $dob);
    		$customer_id = $this->checkin_model->insert_user($user);

    		log_message('info', 'After the call to checkin_model->insert_user($user) '.$customer_id);

    		//Prepare Reservation array()
    		$reserv = array('checkin_timestamp' => $checkin,'hotel_name' => $hotel_name ,'hotel_location' => $hotel_location,'room_type' => $room_type ,'customer_id' => $customer_id);
    		$reservation_id = $this->checkin_model->insert_reservation($reserv);
			log_message('info', 'After the call to checkin_model->insert_reservation($reserv) '.$reservation_id);    		


    		$message =array('error'=>false,'user'=>$customer_id,'reservation Id'=>$reservation_id,'message' => 'ADDED!');
    		$this->response($message, 200);




    	//$this->some_model->updateUser( $this->get('id') );
        //$message = array('firstname' => $first_name, 'lastname' => $last_name, 'age' => $age, 'message' => 'ADDED!');
        
       //$this->response($message, 200); // 200 being the HTTP response code
    }


    
}
?>