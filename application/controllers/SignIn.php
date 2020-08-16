<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignIn extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('HackathonModel');
		$this->load->library('session');
	}

	public function index()
	{
		$data['script'] = $this->load->view('include/Script', NULL, TRUE);

		
		$data['script'] = $this->load->view('include/Script', NULL, TRUE);
		$data['style'] = $this->load->view('include/Style', NULL, TRUE);
		$data['footer'] = $this->load->view('include/Footer', NULL, TRUE);
		$data['header'] = $this->load->view('include/Header', NULL, TRUE);
		$data['loader'] = $this->load->view('include/Loader', NULL, TRUE);		
		$this->load->view('page/SignIn.php', $data);
	}

	public function action()
	{
		$group_name = trim($this->input->post('group_name'));
		$password = trim($this->input->post('password'));
		$remember_me = trim($this->input->post('remember_me'));

		$return = new stdClass();

        $data['gname'] = $group_name;
        $data['pass'] = md5($password."bios2019mantap");
		$result = $this->HackathonModel->select_data($data,'groupdetail');

		$response = array(
	        'status'  		=> true,
	        'message'		=> "",
		);

		if($result){
			if ($result['activated'] == 0) {
				$response['status'] = false;
				$response['message'] = "*Please activate your account via the email that was sent to the email leader.";
			} else {
				$user_data = array(
			        'gname'  		=> $result['gname'],
			        'remember_me'	=> $remember_me,
			        'limit_login'	=> 3,
				);
				$this->session->set_userdata('user_data', $user_data);
			}
		} else {
			$response['status'] = false;
			$response['message'] = "*Incorrect group name or password.";
		}
		$this->output->set_status_header('200');
		
		echo json_encode($response);
	}
}
