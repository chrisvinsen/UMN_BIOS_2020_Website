<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignIn extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('HackathonModel');
	}

	public function index()
	{
		// if (isset($_SESSION['gname'])) {
		// 	redirect(base_url().'transaction/view_aju',$data);
		// }
		$data['script'] = $this->load->view('include/Script', NULL, TRUE);
		$data['style'] = $this->load->view('include/Style', NULL, TRUE);
		$data['footer'] = $this->load->view('include/Footer', NULL, TRUE);
		$data['header'] = $this->load->view('include/Header', NULL, TRUE);
		$data['loader'] = $this->load->view('include/Loader', NULL, TRUE);		
		$this->load->view('page/SignIn.php', $data);
	}

	public function action()
	{
		$gname=trim($this->input->post('gname'));
		$pass=trim($this->input->post('pass'));

		$return = new stdClass();

		$status = false;

        $data['gname'] = $gname;
        $data['pass'] = md5($pass."bios2019mantap");
		$result = $this->HackathonModel->select_data($data,'groupdetail');

		if($result){
			$this->session->set_userdata('gname', $result['gname']);
			$status = true;
		}

		$return->status = $status;

		echo json_encode($return);
	}

}
