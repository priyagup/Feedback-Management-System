<?php

 class RepController extends CI_Controller{

 	 function __construct()
    {
        parent::__construct();
          $this->load->helper('URL');
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
    
    
    public function testajaxgetcountbyday(){
    	$hotel='Cocoon';
    	$data = $this->repModel->ajaxgetcountbyday($hotel);
    	echo json_encode($data,JSON_NUMERIC_CHECK);
    	
    }
    
    public function ajaxgetcountbyday($hotel){
    	$data = $this->repModel->ajaxgetcountbyday($hotel);
    	echo json_encode($data,JSON_NUMERIC_CHECK);
    	 
    }
    
    public function ajaxcounttotalcount($hotel){
    	
    	$previous_week = strtotime("-1 week +1 day");
    	
    	$start_week = strtotime("last sunday midnight",$previous_week);
    	$end_week = strtotime("next saturday",$start_week);
    	
    	$start_week = date("Y-m-d",$start_week);
    	$end_week = date("Y-m-d",$end_week);
    	$d = date("Y-m-d");
    	//echo $start_week.' '.$end_week.' '.$d ;
    	$weekcount = $this->repModel->getcountlastweek($start_week,$end_week,$hotel);
    	$counttilldate = $this->repModel->counttilldate($hotel);
    	$counttoday = $this->repModel->counttoday($hotel);
    	$data = "<div class='row'>
    				<div class='container'>
    					Count Today : ".$counttoday."<br>
    					Count Last Week: ".$weekcount."<br>
    					Count Till date: ".$counttilldate."
    				</div>
    			</div>";
    	//Getting total feedback last week
    	echo $data;
    }
    public function testdaywiseCategory(){
        $hotel='Cocoon';
        $data = $this->repModel->daywiseCategory($hotel);
        echo json_encode($data,JSON_NUMERIC_CHECK);
    }

    public function ajaxdaywiseCategory($hotel){
        $data = $this->repModel->daywiseCategory($hotel);
        echo json_encode($data,JSON_NUMERIC_CHECK);
    }
 }
 ?>