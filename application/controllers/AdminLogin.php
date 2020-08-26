<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminLogin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('HackathonModel');
	}

	public function index()
	{
		$this->load->view('page/AdminLogin.php');
	}

	public function action()
	{
		//username = Bios2020
		//password = BiosHMIF
		//uname and password Case Sensitive
		$uname = trim($this->input->post('name'));
		$pass = trim($this->input->post('pass'));
		$pass = md5($pass . "bios2020");
		if ($uname == "Bios2020" && $pass == "ed7ede39aec516550fa6e63d1b7c1d1b") {
			$this->session->set_userdata('mantapBiosAdmin', "ed7ede39aec516550fa6e63d1b7c1d1b");
			// var_dump(md5($pass."2019"));
			echo json_encode(1);
 			redirect(base_url() . "Admin");
		} else {
			echo json_encode(0);
		}
	}
}
