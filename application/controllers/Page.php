<?php

 class Page extends CI_Controller{

 	 function __construct()
    {
        parent::__construct();
          $this->load->model("repModel");
           $this->load->helper('URL');
          $this->load->library('session');
    }


    public function userhome(){
    	$isloged=$this->session->userdata('is_logged_in');
		if($isloged){
				        $role= $this->session->userdata('role');
						if($role == 'admin'){
							$this->load->view('dashboard/admin');
						}
						else{
							
							$this->load->view('dashboard/user');
							}
					}	
		else{
			redirect('Auth/login');
			}		
    }


    public function landing(){
    	$this->load->view('landing/index');
    }

    public function index(){
    	$this->load->view('landing/index');
    }
    public function path(){
    	echo FCPATH;
    	$path = getcwd();
    	echo $path;
    }

    public function testgen(){
    	$this->load->view('qr/generatedQR');
    }

}	