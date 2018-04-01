<?php
 class QR_model extends CI_Model{

	 public function __construct(){
	 	 parent::__construct();
         $this->load->database();
         $this->load->helper('form');
         $this->load->helper('url');
         $this->load->library('ciqrcode');
	 }

	 public function saveQR($link,$description){
	 	$location = $this->iflinkexists($link);

	 	if($location != ''){
	 		return $location;
	 	}
	 	else{
	 		$name = $this->random_string(8);
	 		$path = FCPATH.'/public//app//'.$name.'.png';
	 		$fullname = base_url().'/public/app/'.$name.'.png';
	 		log_message('info','inside else to generate  the qr name : '.$fullname);
	 		$params['data'] = $link;
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = $path;
			$arr = array('qr_id'=>'','link'=>$link, 'description' => $description ,'location' => $fullname);
			$this->db->set('last_modified', 'NOW()', FALSE);
			$this->db->insert('qr_data',$arr);
			$this->ciqrcode->generate($params);

			return $fullname;
	 	}

	 }

	 public function iflinkexists($link){
	 	$location = '';
	 	$query = $this->db->get_where('qr_data', array('link' => $link));
	 	foreach ($query->result() as $row)
				{
				    $location =  $row->location;
				    log_message('info','inside foreach where check iflink exists value is '.$location);
				}
		return $location;
	 }


	 function random_string($length) {
	    $key = '';
	    $keys = array_merge(range(0, 9), range('a', 'z'));

	    for ($i = 0; $i < $length; $i++) {
	        $key .= $keys[array_rand($keys)];
	    }

	    return $key;
	}

}
?>