<?php defined('BASEPATH') OR exit('No direct script access allowed');


class testController extends CI_Controller{

	function __construct()
    {
        // Construct our parent class
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    

     }

	public function test_getReservationId($customer_id){

		$this->load->model("checkout_model");
		$result = $this->checkout_model->getReservationId($customer_id);
		echo $result;

	}

	public function test_getCustomerId($first_name,$last_name,$phone_number){

		$this->load->model("checkout_model");
		$result = $this->checkout_model->getCustomerId($first_name,$last_name,$phone_number);
		echo $result;
	}









}
?>