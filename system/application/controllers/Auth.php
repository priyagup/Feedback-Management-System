<?php
class Auth extends CI_Controller{

 function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('URL');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('auth_model');
          
    }

 public function login(){
 	$this->load->view('login');
 }



 public function Authenticate(){

 	$this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
	$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
//	echo "\nafter form validate\n";
	echo $this->form_validation->run();
	
			   if($this->form_validation->run() != TRUE)
			   {

			   	$data = array(
							'username' => $this->input->post('username'),
							'password' => $this->input->post('password')
							);
			   	//print_r($data);
			   	$res = $this->auth_model->login($data);

				   	if($res['is_valid'] == 1){

				   		$session = array('is_logged_in'=>$res['is_logged_in'],'name'=>$res['name'],'role'=>$res['role'],'Org'=>$res['Org'],'hotel'=>$res['hotel']);
				   		$this->session->set_userdata($session);
				   		$role = $res['role'];
						if($role == 'user'){
							redirect(base_url().'index.php/page/userhome');
							//$this->load->view('dashboard/user');
						}
						else{
							$this->load->view('dashboard/admin');
						}
						//redirect(base_url().'index.php/Auth/home');
				   	}
				   	else{
				   		$data['error'] = TRUE;
						$data['msg']="Login Not Success";
						$this->load->view('login',$data);
				   	}

			   }
			   else{
			   	
						$data['error'] = TRUE;
						$data['msg']="username or password is empty";
						$this->load->view('login',$data);
			   }

 	

}

public function logout(){
			  $user_data = $this->session->all_userdata();
			  $this->session->sess_destroy();
			  redirect(base_url().'index.php/Auth/login');
}

public function testLogin(){
	$data = array('username' => 'testadmin',
	   			'password' => 'testadmin'
							);
		$res = $this->auth_model->login($data);
	var_dump($res);

	}

}
?>