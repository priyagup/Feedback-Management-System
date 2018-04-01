<?php
class Auth_model extends CI_Model{

	 function __construct()
    {
        parent::__construct();
        $this->load->database();

    }


	// Read data using username and password
public function login($data) {
	$username = $data['username'];
	$password = md5($data['password']);

	if($username != '' && $password != ''){
		$cond = array('login_name'=>$username,'login_password'=>$password);
		//$this->db->select('Name','Organisation','role');
		$query = $this->db->get_where('fms_profile',$cond);
		$data = '';
		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row){
				$name = $row->Name;
				$org = $row->Organisation;
				$role = $row->role;
				$hotel = explode(',', $row->hotel);
			}

			$data = array('is_valid'=>1,'is_logged_in'=>1,'name'=>$name,'role'=>$role,'Org'=>$org,'hotel'=>$hotel);
		}
		else{
			$data = array('is_valid'=>0,'is_logged_in'=>0);
		}

		return $data;
	}

}




}

?>