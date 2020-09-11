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
		if ($uname == "Bios2020" && $pass == "997a8ec108acea9fe390942ad76d6c55") {
		$this->session->set_userdata('mantapBiosAdmin', "997a8ec108acea9fe390942ad76d6c55");
			$data['group'] = $this->HackathonModel->select_all();
			$data['script'] = $this->load->view('include/Script', NULL, TRUE);
			$data['loader'] = $this->load->view('include/Loader', NULL, TRUE);
			$data['style'] = $this->load->view('include/Style', NULL, TRUE);
			$this->load->view('page/Admin.php', $data);
		} else {
			redirect('admin');
		}
	}

	public function logout(){
		$this->session->unset_userdata('mantapBiosAdmin');
		redirect('Home');
	}		
}
