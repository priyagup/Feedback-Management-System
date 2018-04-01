<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';


class checkout extends REST_Controller{


	function __construct()
    {
        // Construct our parent class
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model("checkout_model");
  		$this->load->library('pagination');
  		$this->load->library('session');

    }

    




    public function checkoutuser_post(){

    	$first_name = $this->post('first_name');
    	$last_name = $this->post('last_name');
    	$contact_number = $this->post('contact_number');
    	$checkout_timestamp = $this->post('checkout_timestamp');
    	$hotel = $this->post('hotel');
    	$hotel_location = $this->post('hotel_location');

    	/************************Validate input post elements***********************************/

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

    	//checkout timestamp
    	if($checkout_timestamp == ''){
    		$message =array('error'=>true,'message' => 'Checkout timestamp is mandatory');
    		$this->response($message, 200);	
    	}

    	if($hotel == ''){
    		$message =array('error'=>true,'message' => 'hotel field is mandatory');
    		$this->response($message, 200);	
    	}

    	if($hotel_location == ''){
    		$message =array('error'=>true,'message' => 'hotel_location field is mandatory');
    		$this->response($message, 200);	
    	}

    	// Get Customer ID

    	$customer_id = $this->checkout_model->getCustomerId($first_name, $last_name, $contact_number);

    	if($customer_id == 'Customer doesnot exist'){
    		$message =array('error'=>true,'message' => 'Customer doesnot exists.Hence cannot checked out');
    		$this->response($message, 200);
    	}


    	// retrieve Reservation ID

    	$reservation_id = $this->checkout_model->getReservationId($customer_id);

    	if($reservation_id == 'Sorry incorrect input'){
    		$message =array('error'=>true,'message' => 'Error In processing customer Reservation');
    		$this->response($message, 200);
    	}

    	
        /*********
        $message =array('error'=>false,'message' => 'Correct till here');
    		$this->response($message, 200);
        *********/



    	/******************************Update the reservation**********************************/
    	

    	log_message('info', 'Inside the Checkout controller updating reservation');
  
    	$result = $this->checkout_model->update_reservation($checkout_timestamp, $reservation_id);


        /********
        $message =array('error'=>false,'message' => 'Correct till here','result'=>$result);
        $this->response($message, 200);
		********/

		/******************************Trigger Call to open Market*****************************/    	
		

        /*
        // Load the library
        $this->load->library('client/rest');

         $url = 'https://servicemanager-cie.openmarket.com/service/v1/invokeService/3ACF90B7ED3B10FE';

        // Set config options (only 'server' is required to work)

        $config = array('server'            => 'https://sudip.gandhi:qKu$fQXWP4@servicemanager-cie.openmarket.com/service/v1/invokeService/3ACF90B7ED3B10FE' );
                        //'http_user'       => 'sudip.gandhi',
                        //'http_pass'       => 'qKu$fQXWP4',
                        //'http_auth'       => 'basic'
                       

              $data = '{
                "endUser": {
                    "phoneNumber": '.$contact_number.'
                },
                "variables": {
                    "session": {
                        "Username": '.$first_name.$last_name .',
                        "hotel": '.$hotel.'
                    },
                    "user": {
                        "keyword" : "bcns",
                        "phoneNumber": '.$contact_number.'
                    }
                }
            }';
            $mydata = array("endUser"=>array("phoneNumber"=> $contact_number),
                            "variables"=> array("session"=>array("Username"=>$first_name.$last_name,"hotel"=>$hotel),"user"=>array("keyword"=>"bcns","phoneNumber"=>$contact_number)));
               $hdata = json_encode($mydata);

               $sdata = "";
        // Run some setup
        $this->rest->initialize($config);

        $Result = $this->rest->post($url ,$mydata,'json');
        log_message('info','Value of mydata:'.$mydata);

    */
        //Send call to trigger openmarket call

        $modifiedContact = '91'.$contact_number;
        $mydata = array("endUser"=>array("phoneNumber"=> $modifiedContact),
                            "variables"=> array("session"=>array("Username"=>$first_name.$last_name,"hotel"=>$hotel),"user"=>array("keyword"=>"bcns rating","phoneNumber"=>$contact_number)));
        $response = $this->checkout_model->myreq($mydata);


         $message =array('error'=>false,'message' => 'Correct till here','result'=>"Dummy Request");
         $this->response($message, 200);


    }


    public function rating_post(){

        $contact_number = $this->post('contact_number');
        $overall_rating = $this->post('overall_rating');

        if($contact_number == '' or !preg_match("/^[789]\d{9}$/", $contact_number)){
            $message =array('error'=>true,'message' => 'Mobile number is mandatory and it should be 10 digit length starting from 7-9');
            $this->response($message, 500); 
        }

        if($overall_rating == ''){
            $message =array('error'=>true,'message' => 'Overall rating is mandatory field');
            $this->response($message, 500); 
        } 

        //Get customer Id

        $customer_id = $this->checkout_model->getcustomerByNumber($contact_number);       

        if($customer_id == ''){
            $message =array('error'=>true,'message' => 'Error processing data customer id is null');
            $this->response($message, 500);    
        }

        //Get latest Reservation ID of the customer.

        $reservation_id = $this->checkout_model->getReservationId($customer_id);

        if($reservation_id == 'Sorry incorrect input'){
            $message =array('error'=>true,'message' => 'Error In processing customer Reservation');
            $this->response($message, 500);
        }

        $data = array("customer_id"=>$customer_id,"reservation_id"=>$reservation_id,"rating"=>$overall_rating );

        //Update the rating.
        
        $returndata = $this->checkout_model->insertRating($data);
        
        $err = $returndata['error'];
        //$mess = $returndata['message'];
        $feedback_id = $returndata['feedback_id'];

        if($err == true || $feedback_id == '' ){
         //'There was a problem in given Input Please Review'
         $message =array('error'=>true,'message' =>'There was a problem in given Input Please Review' );
         $this->response($message, 500);       
        }

        

        $message = array('error'=>false,'message'=>'Sucessfullyinserted','feedback_id'=>$feedback_id);
        $this->response($message,200);

    }


    public function rating_get(){

         $contact_number1 = $this->get('contact_number');
        $overall_rating = $this->get('overall_rating');


        if($contact_number1 == '' or !preg_match("/^[789]\d{11}$/", $contact_number1)){
            $message =array('error'=>true,'message' => 'Mobile number is mandatory and it should be 12 digit length starting from 7-9');
            $this->response($message, 500); 
        }

        $contact_number = substr($contact_number1, 2);

        if($overall_rating == ''){
            $message =array('error'=>true,'message' => 'Overall rating is mandatory field');
            $this->response($message, 500); 
        } 

        //Get customer Id

        $customer_id = $this->checkout_model->getcustomerByNumber($contact_number);       

        if($customer_id == ''){
            $message =array('error'=>true,'message' => 'Error processing data customer id is null');
            $this->response($message, 500);    
        }

        //Get latest Reservation ID of the customer.

        $reservation_id = $this->checkout_model->getReservationId($customer_id);

        if($reservation_id == 'Sorry incorrect input'){
            $message =array('error'=>true,'message' => 'Error In processing customer Reservation');
            $this->response($message, 500);
        }

        $data = array("customer_id"=>$customer_id,"reservation_id"=>$reservation_id,"rating"=>$overall_rating );

        //Update the rating.
        
        $returndata = $this->checkout_model->insertRating($data);
        
        $err = $returndata['error'];
        //$mess = $returndata['message'];
        $feedback_id = $returndata['feedback_id'];

        if($err == true || $feedback_id == '' ){
         //'There was a problem in given Input Please Review'
         $message =array('error'=>true,'message' =>'There was a problem in given Input Please Review' );
         $this->response($message, 500);       
        }

        

        $message = array('error'=>false,'message'=>'Sucessfullyinserted','feedback_id'=>$feedback_id);
        $this->response($message,200);

    }


    public function feedback_post(){
        $contact_number = $this->post('contact_number');
        $feedback_message = $this->post('feedback_message');
        $feedback_keyword = $this->post('feedback_keyword');
        $feedback_subcat = $this->post('feedback_subcat');
        $category_rating = $this->post('category_rating');
        $feedback_time = $this->post('feedback_time');

        if($contact_number == '' or !preg_match("/^[789]\d{9}$/", $contact_number)){
            $message =array('error'=>true,'message' => 'Mobile number is mandatory and it should be 10 digit length starting from 7-9');
            $this->response($message, 500); 
        }

        if($feedback_message == ''){
            $message =array('error'=>true,'message' => 'feedback_message is mandatory field.');
            $this->response($message, 500); 
        }

        if($feedback_keyword == ''){
            $message =array('error'=>true,'message' => 'feedback_keyword is mandatory field.');
            $this->response($message, 500); 
        }

        if($feedback_subcat == ''){
            $message =array('error'=>true,'message' => 'feedback_subcat is mandatory field.');
            $this->response($message, 500); 
        }

        if($category_rating == ''){
            $message =array('error'=>true,'message' => 'category_rating is mandatory field.');
            $this->response($message, 500); 
        }

        if($feedback_time == ''){
            $message =array('error'=>true,'message' => 'feedback_time is mandatory field.');
            $this->response($message, 500); 
        }
        
        //get the customer key 

        $customer_id = $this->checkout_model->getcustomerByNumber($contact_number);       

        if($customer_id == ''){
            $message =array('error'=>true,'message' => 'Error processing data customer id is null');
            $this->response($message, 500);    
        }

        //Get latest Reservation ID of the customer.

        $reservation_id = $this->checkout_model->getReservationId($customer_id);

        if($reservation_id == 'Sorry incorrect input'){
            $message =array('error'=>true,'message' => 'Error In processing customer Reservation');
            $this->response($message, 500);
        }


        //Get the Feedback id
        $feedback_id =  $this->checkout_model->getFeedbackId($customer_id,$reservation_id);

        if($feedback_id == '' || $feedback_id == 'invalidRequest'){
            $message =array('error'=>true,'message' => 'Error processing data feedback id is null');
            $this->response($message, 500);

        }

        //insert Detailed feedback

        $data['customer_id'] = $customer_id;
        $data['reservation_id'] = $reservation_id;
        $data['feedback_id'] = $feedback_id;
        $data['feedback_message'] = $feedback_message;
        $data['feedback_keyword'] = $feedback_keyword;
        $data['feedback_subcat'] = $feedback_subcat;
        $data['category_rating'] = $category_rating;
        $data['feedback_time'] = $feedback_time;

         $returndata = $this->checkout_model->insertDetailedFdBck($data);
         $processed_fdbck_id = $returndata['processed_fdbck_id'];


         if($processed_fdbck_id == ''){
            $message =array('error'=>true,'message' => 'Error processing data processed_fdbck id is null');
            $this->response($message, 500);            
         }


        $message = array('error'=>false,'message'=>'Sucessfullyinserted','processed_fdbck_id'=>$processed_fdbck_id);
        $this->response($message,200);


    }


    public function feedback_get(){
        $contact_number1 = $this->get('contact_number');
        $feedback_message = $this->get('feedback_message');
        $feedback_keyword = $this->get('feedback_keyword');
        $feedback_subcat = $this->get('feedback_subcat');
        $category_rating = $this->get('category_rating');
        $feedback_time = $this->get('feedback_time');

        /*
	if($contact_number1 == '' or !preg_match("/^[789]\d{11}$/", $contact_number1)){
            $message =array('error'=>true,'message' => 'Mobile number is mandatory and it should be 12 digit length starting from 7-9');
            $this->response($message, 500); 
        }

*/
	$contact_number = substr($contact_number1, 2);

        if($feedback_message == ''){
            $message =array('error'=>true,'message' => 'feedback_message is mandatory field.');
            $this->response($message, 500); 
        }

        if($feedback_keyword == ''){
            $message =array('error'=>true,'message' => 'feedback_keyword is mandatory field.');
            $this->response($message, 500); 
        }

        if($feedback_subcat == ''){
            $message =array('error'=>true,'message' => 'feedback_subcat is mandatory field.');
            $this->response($message, 500); 
        }

        if($category_rating == ''){
            $message =array('error'=>true,'message' => 'category_rating is mandatory field.');
            $this->response($message, 500); 
        }

        if($feedback_time == ''){
            $message =array('error'=>true,'message' => 'feedback_time is mandatory field.');
            $this->response($message, 500); 
        }
        
        //get the customer key 

        $customer_id = $this->checkout_model->getcustomerByNumber($contact_number);       

        if($customer_id == ''){
            $message =array('error'=>true,'message' => 'Error processing data customer id is null');
            $this->response($message, 500);    
        }

        //Get latest Reservation ID of the customer.

        $reservation_id = $this->checkout_model->getReservationId($customer_id);

        if($reservation_id == 'Sorry incorrect input'){
            $message =array('error'=>true,'message' => 'Error In processing customer Reservation');
            $this->response($message, 500);
        }


        //Get the Feedback id
        $feedback_id =  $this->checkout_model->getFeedbackId($customer_id,$reservation_id);

        if($feedback_id == '' || $feedback_id == 'invalidRequest'){
            $message =array('error'=>true,'message' => 'Error processing data feedback id is null');
            $this->response($message, 500);

        }

        //insert Detailed feedback

        $data['customer_id'] = $customer_id;
        $data['reservation_id'] = $reservation_id;
        $data['feedback_id'] = $feedback_id;
        $data['feedback_message'] = $feedback_message;
        $data['feedback_keyword'] = $feedback_keyword;
        $data['feedback_subcat'] = $feedback_subcat;
        $data['category_rating'] = $category_rating;
        $data['feedback_time'] = $feedback_time;

         $returndata = $this->checkout_model->insertDetailedFdBck($data);
         $processed_fdbck_id = $returndata['processed_fdbck_id'];


         if($processed_fdbck_id == ''){
            $message =array('error'=>true,'message' => 'Error processing data processed_fdbck id is null');
            $this->response($message, 500);            
         }


        $message = array('error'=>false,'message'=>'Sucessfullyinserted','processed_fdbck_id'=>$processed_fdbck_id);
        $this->response($message,200);


    }


    public function testget_GET(){


        $v1 = $this->get('p1');
        $v2 = $this->get('p2');
        $v3 = $this->get('p3');
        $v4 = $this->get('p4');
        $v5 = $this->get('p5');
        $result = array('param1'=>$v1,'param2'=>$v2,'param3'=>$v3,'param4'=>$v4,'param5'=>$v5);
        $this->response($result,200);
    }

    


}?>