<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seminar extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['script'] = $this->load->view('include/Script', NULL, TRUE);
		$data['style'] = $this->load->view('include/Style', NULL, TRUE);
		$data['footer'] = $this->load->view('include/Footer', NULL, TRUE);
		$data['header'] = $this->load->view('include/Header', NULL, TRUE);
		$data['loader'] = $this->load->view('include/Loader', NULL, TRUE);
		$this->load->view('page/Seminar.php', $data);
	}
}
