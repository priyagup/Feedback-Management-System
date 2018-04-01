<?php

 class SocialInt extends CI_Controller{

    function __construct()
    {
        parent::__construct();
    }

     public function myreq(){
        $this->load->model("checkout_model");
        $this->checkout_model->mytestreq();
        
    }

    public function testcall_api(){
        $this->load->model("checkout_model");
        $this->checkout_model->call_api();
    }

    public function curlcall(){
        $this->load->model("checkout_model");
        $this->checkout_model->curlcall();   
    }

    public function testgetCategory($keyword){
        $this->load->model("checkout_model");
        $this->checkout_model->getCategory($keyword);
    }



   public  function index()
    {

        $fb_config = array(
            'appId'  => 'YOUR_APP_ID_HERE',
            'secret' => 'YOUR_APP_SECRET_HERE'
        );

        $this->load->library('facebook', $fb_config);

        $user = $this->facebook->getUser();

        if ($user) {
            try {
                $data['user_profile'] = $this->facebook
                    ->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }

        if ($user) {
            $data['logout_url'] = $this->facebook
                ->getLogoutUrl();
        } else {
            $data['login_url'] = $this->facebook
                ->getLoginUrl();
        }

        $this->load->view('view',$data);
    }




}

?>