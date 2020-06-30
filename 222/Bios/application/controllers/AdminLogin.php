<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('HackathonModel');
	}

	public function index()
	{
		$this->load->view('page/AdminLogin.php');
	}

	public function action($uname, $pass){
		// $uname=$this->input->post('uname');
		// $pass=$this->input->post('pass');

        $pass = md5($pass."bios2019mantapAdmin");
        if($uname=="bios19" && $pass=="549e67bd1178e4d0ecaf9a0d6d2a4148"){
			$this->session->set_userdata('mantapBiosAdmin', md5($pass."2019"));
			// var_dump(md5($pass."2019"));
			echo json_encode(1);
        }
        else{
        	echo json_encode(0);
        }

	}

}
?>