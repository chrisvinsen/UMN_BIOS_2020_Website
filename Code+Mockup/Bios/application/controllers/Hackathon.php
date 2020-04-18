<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hackathon extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('HackathonModel');
	}

	public function index()
	{
		$data2['id']='bios19';
		$data['upload'] = $this->HackathonModel->select_data($data2,'upload');
		$data['script'] = $this->load->view('include/Script', NULL, TRUE);
		$data['style'] = $this->load->view('include/Style', NULL, TRUE);
		$data['footer'] = $this->load->view('include/Footer', NULL, TRUE);
		$data['header'] = $this->load->view('include/Header', NULL, TRUE);
		$data['loader'] = $this->load->view('include/Loader', NULL, TRUE);		
		$this->load->view('page/Hackathon.php', $data);
	}

}
