<?php

class QR_controller extends CI_Controller{

	function __construct(){
		// Construct our parent class
        parent::__construct();
        //$this->load->helper('url');
        //$this->load->library('ciqrcode');
        $this->load->model("QR_model");
	}


	public function getQR(){
		$this->load->view('qr/QR');
	}

	public function generateQR($data){
		
		//header("Content-Type: image/png");
		$params['size'] = '250';
		$params['data'] = $data;
		$this->ciqrcode->generate($params);
	}


	public function saveQR(){

		$link = $this->input->post('link');
		$description = $this->input->post('description');
		$location = $this->QR_model->saveQR($link,$description);
		$data['location'] = $location;
		//echo $data['location'];
		$this->load->view('qr/generatedQR',$data);
	}
}

?>