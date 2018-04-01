<?php

 class RepController extends CI_Controller{

 	 function __construct()
    {
        parent::__construct();
          $this->load->model("repModel");
          $this->load->library('session');
    }

    public function index(){

        $this->load->view('reports/index');
    }


    public function test(){

    	$res = $this->repModel->ajaxGetCategoryGd();
    	$jres = json_encode($res);
    	//print_r($jres);
    	print_r(implode(",", $res));
    }



    public function testajaxGetCategoryGd($hotel){
    	$results = $this->repModel->ajaxgetGdData($hotel);
    	$json = json_encode($results, JSON_NUMERIC_CHECK);
    	echo $json;
    }

    public function testajaxGetCategoryBd($hotel){
        $results = $this->repModel->ajaxgetBdData($hotel);
        $json = json_encode($results, JSON_NUMERIC_CHECK);
        echo $json;
    }

    public function getNps($hotel){
        $nps = $this->repModel->getNPS($hotel);
        $json = json_encode($nps);
        echo $json;
    }

    public function getRatingsCount($hotel){
        $data = $this->repModel->getRatingsCount($hotel);
        $dat = json_encode($data,JSON_NUMERIC_CHECK);
        echo $dat;
    }

    public function getOverallCatAnal($hotel){
        $data = $this->repModel->getOverallCatAnal($hotel);
        $dat = json_encode($data,JSON_NUMERIC_CHECK);
        echo $dat;
    }

    public function ovrallRatAnalysis(){
        $this->load->view('pages/report1');
    }

    public function testgetSubCatDrillDown(){
        $data = $this->repModel->ajaxGetCategoryDrillDown('good','Ambience','Marriot');
        echo json_encode($data,JSON_NUMERIC_CHECK);
    }

    public function getSubCatDrillDown($val,$cat,$hotel){
        $data = $this->repModel->ajaxGetCategoryDrillDown($val,$cat,$hotel);
        echo json_encode($data,JSON_NUMERIC_CHECK);
    }

    public function getDayCount(){
        $data = $this->repModel->getDayCount();
        echo json_encode($data,JSON_NUMERIC_CHECK);   
    }

 }
 ?>