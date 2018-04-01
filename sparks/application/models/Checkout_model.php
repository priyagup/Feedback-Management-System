<?php

include('httpful.phar');
 class Checkout_model extends CI_Model{

	 public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        		$this->load->helper('form');
        }

        public function getCustomerId($first_name,$last_name,$phone_number){
        	try {
        		$id = '';
	        	$query = $this->db->get_where('fms_customer', array('first_name' => $first_name, 'last_name' => $last_name, 'contact_number' => $phone_number));
			        	foreach ($query->result() as $row)
						{
						       $id =  $row->customer_id;
						       log_message('info','inside foreach where check user id value is '.$id);
						}

					log_message('info','in check user id value is '.$id);

					if ($id) {
						return $id;
					} else {
						return "Customer doesnot exist";
					}
					
					

        	} catch (Exception $e) {
        		echo $e->getMessage();
        	}
        }

        public function getReservationId($customer_id){
        	try {
        		$reservation_id = '';

        		$query = $this->db->query('SELECT * FROM fms_reservation where customer_id = '.$customer_id.'  ORDER BY reservation_id DESC LIMIT 0, 1');

        		foreach ($query->result() as $row) {
 	      			$reservation_id = $row->reservation_id;
        		}
        		
        		log_message('info','Inside the getReservationId and reservation ID value is '.$reservation_id);
        		
        		if ($reservation_id) {
        			return $reservation_id;
        		} else {
        			return "Sorry incorrect input";
        		}
        		

        	} catch (Exception $e) {
        		echo $e->getMessage();
        	}

        }


        public function checkout_customer($arr){

        	try {
        		
        	} catch (Exception $e) {
        		
        	}

        }


         public function update_reservation($checkout_timestamp, $reservation_id){
        	log_message('info', 'Inside the Update Reservation in Checkout');
        	$timestamp = date('Y-m-d H:i:s');
        	try {
        		
        		$data = array( 'checkout_timestamp' => $checkout_timestamp,
				               'last_modified' => $timestamp
				         		);

    			$this->db->where('reservation_id', $reservation_id);
				$this->db->update('fms_reservation', $data); 
    			return true;
        	} catch (Exception $e) {
        		echo $e->getMessage();        		
        	}
        	
        }



        function CallAPI($method, $url, $data = false)
        {
            $curl = curl_init();

            switch ($method)
            {
                case "POST":
                    curl_setopt($curl, CURLOPT_POST, 1);

                    if ($data)
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    break;
                case "PUT":
                    curl_setopt($curl, CURLOPT_PUT, 1);
                    break;
                default:
                    if ($data)
                        $url = sprintf("%s?%s", $url, http_build_query($data));
            }

            // Optional Authentication:
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_USERPWD, "username:password");

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($curl);

            curl_close($curl);

            return $result;
        }



        function call_api(){

        $url = 'https://servicemanager-cie.openmarket.com/service/v1/invokeService/3ACF90B7ED3B10FE';

        $this->load->library('client/rest');
        //$this->load->library('Curl');
        log_message('info', 'Started Rest Client ');
        $mydata = array("endUser"=>array("phoneNumber"=> '9767506576'),
                            "variables"=> array("session"=>array("Username"=>"rahul bussa","hotel"=>"cocoon"),"user"=>array("keyword"=>"bcns","phoneNumber"=>'9767506576')));


        $config = array('server' => 'https://servicemanager-cie.openmarket.com/service/v1/invokeService/3ACF90B7ED3B10FE',
                                'http_user'       => 'sudip.gandhi',
                                'http_pass'       => 'qKu$fQXWP4',
                                'http_auth'       => 'basic',
                                'ssl_verify_peer' => TRUE,
                                'ssl_cainfo'      => 'C:\wamp\www\cert\DigiCertGlobalRootCA.pem'
                );
       $data = json_encode($mydata);
       $this->rest->initialize($config);
       //print_r($data);
       echo "\n after converting to json";
       //print_r($data);
        $Result = $this->rest->post($url ,$data,'json');
        echo "Result is".$Result;
        //log_message('info','Value of mydata:'.$mydata);

       

}


public function curlcall(){
    $this->load->library('Curl');
    $mydata = array("endUser"=>array("phoneNumber"=> '9767506576'),
                            "variables"=> array("session"=>array("Username"=>"rahul bussa","hotel"=>"cocoon","email"=>"Rahul.Bussa@amdocs.com"),"user"=>array("keyword"=>"bcnsapi","phoneNumber"=>'9767506576')));
    $data = json_encode($mydata,JSON_PRETTY_PRINT);
    
    try{
    $curl = curl_init();    

    /*
        https://servicemanager-cie.openmarket.com/service/v1/invokeService/3ACF90B7ED3B10FE
        https://servicemanager-cie.openmarket.com/service/v1/invokeService/EF2DC2A3D615657B
    */
    curl_setopt($curl, CURLOPT_URL,'https://sudip.gandhi:qKu$fQXWP4@servicemanager-cie.openmarket.com/service/v1/invokeService/3ACF90B7ED3B10FE');
        $headers = array(
                        'Content-Type:application/json'
                    );

                       // 'Authorization: Basic c3VkaXAuZ2FuZGhpOnFLdSRmUVhXUDQ='

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS,$data);
    curl_setopt($curl, CURLOPT_VERBOSE, 1);
    curl_setopt($curl, CURLOPT_HEADER, 1);
     
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt($curl, CURLOPT_SSLVERSION,3); // verify ssl version 2 or 3
    
    //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true); // allow https verification if true
    //curl_setopt($curl, CURLOPT_CAPATH, "http://rahulbus03/FMS/public/cert/DigiCertGlobalRootCA.pem"); // allow ssl cert direct comparison
    //curl_setopt($curl, CURLOPT_CAPATH,'http://rahulbus03/FMS/public/cert/DigiCertGlobalRootCA.pem');
    //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); // check common name and verify with host name

    // receive server response ...
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec ($curl);

    $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
    $header = substr($server_output, 0, $header_size);
    $body = substr($server_output, $header_size);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    echo "\ncurl response header:".$httpcode;
    echo $header_size;
    echo $header;
    echo $body;

    curl_close ($curl);
    }
    catch(Exception $e){
         trigger_error(sprintf(
        'Curl failed with error #%d: %s',
        $e->getCode(), $e->getMessage()),
        E_USER_ERROR);  

    }
     //echo(curl_error($curl));
    var_dump($server_output);

}

//$mydata
public function myreq($mydata){

    $url = 'https://sudip.gandhi:qKu$fQXWP4@servicemanager.openmarket.com/service/v1/invokeService/1BFCCAE3EB9EC540';
     //$mydata = array("endUser"=>array("phoneNumber"=> '9767506576'),
       //                     "variables"=> array("session"=>array("Username"=>"rahul bussa","hotel"=>"cocoon","email"=>"Abhinav.Shukla@amdocs.com"),"user"=>array("keyword"=>"bcnsapi","phoneNumber"=>'9767506576')));
    $data = json_encode($mydata,JSON_PRETTY_PRINT);

    $response = Httpful\Request::post($url)
                ->addHeader('Content-Type', 'application/json') 
                ->body($data)
                ->send();
    var_dump($response);
    return $response;
}

public function mytestreq(){

    $url = 'https://sudip.gandhi:qKu$fQXWP4@servicemanager-cie.openmarket.com/service/v1/invokeService/8C8FE26CE492A953';
     $mydata = array("endUser"=>array("phoneNumber"=> '9767506576'),
                            "variables"=> array("session"=>array("Username"=>"rahul bussa","hotel"=>"cocoon","email"=>"Abhinav.Shukla@amdocs.com"),"user"=>array("keyword"=>"bcnsapi","phoneNumber"=>'9767506576')));
    $data = json_encode($mydata,JSON_PRETTY_PRINT);

    $response = Httpful\Request::post($url)
                ->addHeader('Content-Type', 'application/json')
                ->body($data)
                ->send();
    var_dump($response);
    return $response;
}


    public function getcustomerByNumber($phone){

          try {
                        $customer_id = '';

                        $query = $this->db->query('SELECT customer_id FROM fms_customer where contact_number = '.$phone);

                        foreach ($query->result() as $row) {
                            $customer_id = $row->customer_id;
                        }
                        
                        log_message('info','Inside the getcustomerByNumberand customer ID value is '.$customer_id);  

                        return $customer_id;

        }catch(Exception $e){
                $e->getMessage();
        }
    }


    public function insertRating($data){
        $db_debug = $this->db->db_debug; //save setting
        $data['error']='';
        $data['feedback_id'] = '';
        $data['message']='';
        try {
            $this->db->db_debug = FALSE; //disable debugging for queries
            $customer_id= $data['customer_id'];
            $resrvation_id = $data['reservation_id'] ;
            $rating = $data['rating'];
            $timestamp = date('Y-m-d H:i:s');
            $insert_array = array('feedback_id'=>'','customer_id'=> $customer_id,'overall_rating' => $rating,'feedback_message'=>'','feedback_status'=>'W','created_date'=>$timestamp ,'modified_date'=>$timestamp,'reservation_id'=>$resrvation_id);
            $this->db->insert('fms_customer_feedback',$insert_array);
            $feedback_id=$this->db->insert_id();
            $data['error'] = false;
            $data['feedback_id'] = $feedback_id;
            $data['message'] =  '';
            $this->db->db_debug = $db_debug; //restore settingss
	    $loyalty['customer_id'] =    $customer_id ; 
            $loyalty['resrvation_id'] =    $resrvation_id;
            $loyalty['level'] = 'lvl_1';
            $loyalty_id = $this->insertLoyalty($loyalty);
            $data['loyalty_id'] = $loyalty_id;
            

        } 
        catch (Exception $e) {
            $data['message'] = $e->getMessage();
            $data['error'] = true;
            //echo "In catch0";
            $this->db->db_debug = $db_debug; //restore settingss
            return $data;
             //throw new Exception("Database error");
        }

        return $data;

        
    }

    //Insert loyalty data

    //Insert loyalty data

    public function insertLoyalty($data){

        $customer_id = $data['customer_id'];
        $reservation_id = $data['resrvation_id'] ;
        $level = $data['level'];
        //Get the loyalty data from loyalty conf for that level
        $this->db->select('loyalty_phase,loyalty_type,loyalty_value');
        $this->db->from('fms_loyalty_conf');
        $this->db->where('loyalty_phase', $level);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $loyalty_phase = $row->loyalty_phase;
                $loyalty_type = $row->loyalty_type;
                $loyalty_value = $row->loyalty_value;
            }
        }

        $loy = array('loyalty_id'=> '','customer_id' => $customer_id, 'reservation_id' =>  $reservation_id, 'loyalty_phase' => $loyalty_phase,'loyalty_type'=>$loyalty_type,'loyalty_value'=>$loyalty_value);
        $this->db->insert('fms_loyalty',$loy);
        $loyalty_id = $this->db->insert_id();

        return $loyalty_id;


    }

    //Configuring loyalty points


    //Getting the feedback id

        public function getFeedbackId($customer_id,$reservation_id){
            $feedback_id = '';
            if($customer_id == '' || $reservation_id == ''){
                return 'invalidRequest';
            }
            else{
                    try {
                        
                        $query = $this->db->query('SELECT * FROM fms_customer_feedback WHERE customer_id ='.$customer_id.'  AND reservation_id = '.$reservation_id.' ORDER BY reservation_id DESC LIMIT 0,1');
                        foreach ($query->result() as $row) {
                            $feedback_id = $row->feedback_id;
                        }
                        
                        log_message('info','Inside the getFeedbackId Feedback ID value is '.$feedback_id);  

                        return $feedback_id;

                    } catch (Exception $e) {
                        $e->getMessage();
                    }

            }

        }



       public function insertDetailedFdBck($data){
        $db_debug = $this->db->db_debug; //save setting
        $rdata['error']='';
        $rdata['processed_fdbck_id'] = '';
        $rdata['message']='';
        $feedback_cat  = $this->getCategory($data['feedback_subcat']);

        if($feedback_cat == ''){

            $feedback_cat = 'Other';
        }
        try {
                $timestamp = date('Y-m-d H:i:s');
		//get category rating
                $this->db->select('feedback_category');
                $this->db->from('fms_cat_rating_mapping');
                $this->db->where('feedback__keyword',$data['feedback_keyword']);
                $query1 = $this->db->get();
                $cat_rating= '';
                if ($query1->num_rows() > 0)
                {
                	foreach ($query1->result() as $row1)
                	{
                		$cat_rating = $row1->feedback_category;	
                	}
                }
                $this->db->db_debug = FALSE; //disable debugging for queries
                $insert_array = array('processed_fdbck_id' => '','customer_id' => $data['customer_id'] , 'reservation_id' => $data['reservation_id'] , 'feedback_id' => $data['feedback_id'],'feedback_keyword' => $data['feedback_keyword'] , 'feedback_subcat'=>$data['feedback_subcat'],'feedback_category' =>$feedback_cat ,'category_rating' =>$cat_rating, 'created_date' =>$data['feedback_time'],'modified_date' => $timestamp );
                $this->db->insert('fms_process_feedback', $insert_array);
                $processed_fdbck_id = $this->db->insert_id();
                $rdata['error'] = false;
                $rdata['processed_fdbck_id'] = $processed_fdbck_id;
                $rdata['message'] =  '';
                //Update customer feedback table
                $retflag = $this->updateCustFdBck($data['feedback_id'],$data['feedback_message']);

                if($retflag == true){
                    log_message('info','After the updatecustfeedback in insertDetailedFdbck and table custfdbck is successfulllyy uupdated');
                }else{
                    log_message('info','After the updatecustfeedback in insertDetailedFdbck and table custfdbck is UNSUCCESSFULL');
                }



                $this->db->db_debug = $db_debug; //restore settingss

            } catch (Exception $e) {
                $rdata['message'] = $e->getMessage();
                $rdata['error'] = true;
                //echo "In catch0";
                $this->db->db_debug = $db_debug; //restore settingss
                return $rdata;
                
            }

            return $rdata;
       } 



       public function getCategory($keyword){

            $category = '';

            try {
                $query = $this->db->query('SELECT * FROM fms_category_mapping WHERE LOWER(sub_category) = LOWER("'.$keyword.'") LIMIT 0,1');
                
                    foreach ($query->result() as $row) {
                                $category = $row->category;
                }                         
                 log_message('info','Inside the getCategory category ID value is '.$category);  

                //var_dump($category);
                return $category;

            } catch (Exception $e) {
               $e->getMessage(); 
            }

        }

            //Update the Customer feedback table with feedbac message once we get second feedback
        public function updateCustFdBck($fdbck_id, $fdbck_msg){
            log_message('info', 'Inside the updateCustFdBck in Checkout');
            $timestamp = date('Y-m-d H:i:s');
            try {
                if ($fdbck_id == '' || $fdbck_msg == '' ) {
                    return false;
                } else {
                    $data = array( 
                    'feedback_message' => $fdbck_msg,
                    'feedback_status' => 'R',
                    'modified_date' => $timestamp
                                );
                    $this->db->where('feedback_id', $fdbck_id);
                    $this->db->update('fms_customer_feedback', $data); 
                    return true;
                }
                
                
            } catch (Exception $e) {
                echo $e->getMessage();              
            }            

        }    









}

?>