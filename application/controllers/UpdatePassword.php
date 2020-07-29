<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UpdatePassword extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('HackathonModel');
	}

	public function index()
	{
		$data['script'] = $this->load->view('include/Script', NULL, TRUE);
		$data['style'] = $this->load->view('include/Style', NULL, TRUE);
		$data['footer'] = $this->load->view('include/Footer', NULL, TRUE);
		$data['header'] = $this->load->view('include/Header', NULL, TRUE);
		$data['loader'] = $this->load->view('include/Loader', NULL, TRUE);
		$this->load->view('page/UpdatePassword.php', $data);
	}

	public function sendMessageAction($email, $title, $m)
	{
		$config = [
			'protocol'	=>	'smtp',
			'smtp_host'	=>	'ssl://smtp.googlemail.com',
			'smtp_user'	=>	'bios@umn.ac.id',
			'smtp_pass'	=>	'biosHMIF',
			'smtp_port'	=>	465,
			'mailtype'	=>	'html',
			'charset'	=>	'utf-8',
			'newline'	=>	"\r\n",
		];
		$this->load->library('email', $config);

		$this->email->from('bios@umn.ac.id', 'BIOS UMN');
		$this->email->to($email);
		$this->email->subject($title);
		$this->email->message($m);
		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function updatePassAction()
	{

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode(0);
		} else {
			$email = $this->input->post('email');
			$clean['email'] = $this->security->xss_clean($email);
			$userInfo = $this->HackathonModel->select_data($clean, 'persondetail');

			$data['personId'] = $userInfo['id'];
			$group = $this->HackathonModel->select_data($data, 'group');
			$data2['id'] = $group['groupId'];
			$groupdetail = $this->HackathonModel->select_data($data2, 'groupdetail');

			if (!$userInfo) {
				echo json_encode(0);
			} else {
				$token = $this->HackathonModel->insertToken($groupdetail['id']);
				$qstring = $this->base64url_encode($token);
				$url = base_url() . 'index.php/UpdatePassword/reset_password/token/' . $qstring;
				$link = '<a href="' . $url . '">' . $url . '</a>';

				$message = '
	             Kepada Tim ' . $groupdetail['gname'] . ',<br>
	             <br>
					Kami telah menerima permintaan untuk mengatur ulang password pada akun tim Anda. Silahkan mengunjungi link berikut ' . $link . ', untuk mengatur ulang password baru akun tim Anda.<br>
					<br>
				Panitia BIOS 2019<br>
				Universitas Multimedia Nusantara
	             ';

				if ($this->sendMessageAction($email, 'Reset Password', $message))
					echo json_encode(1);
				else
					echo json_encode(0);
			}
		}
	}


	public function reset_password()
	{
		$token = $this->base64url_decode($this->uri->segment(4));
		$cleanToken = $this->security->xss_clean($token);
		$groupdetail = $this->HackathonModel->isTokenValid($cleanToken);

		if ($groupdetail) {
			$data['script'] = $this->load->view('include/Script', NULL, TRUE);
			$data['style'] = $this->load->view('include/Style', NULL, TRUE);
			$data['footer'] = $this->load->view('include/Footer', NULL, TRUE);
			$data['header'] = $this->load->view('include/Header', NULL, TRUE);
			$data['loader'] = $this->load->view('include/Loader', NULL, TRUE);
			$data['gname'] = $groupdetail['gname'];
			$data['token'] = $token;
			$this->load->view('page/ResetPassword.php', $data);
		} else {
			echo json_encode(0);
		}
	}

	public function resetPasswordAction()
	{
		$token = $this->uri->segment(4);;
		$cleanToken = $this->security->xss_clean($token);
		$groupdetail = $this->HackathonModel->isTokenValid($cleanToken); //either false or array();    
		if (!$groupdetail) {
			$this->session->set_flashdata('sukses', 'Token tidak valid atau kadaluarsa');
			redirect(site_url('login'), 'refresh');
		}
		$post = $this->input->post(NULL, TRUE);
		$cleanPost = $this->security->xss_clean($post);
		$hashed = md5($cleanPost['pass'] . "bios2019mantap");
		$cleanPost['pass'] = $hashed;
		$cleanPost['gname'] = $groupdetail['gname'];
		unset($cleanPost['pass2']);
		if (!$this->HackathonModel->updatePassword($cleanPost)) {
			echo json_encode(0);
		} else {
			echo json_encode(1);
		}
	}

	public function base64url_encode($data)
	{
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
	}

	public function base64url_decode($data)
	{
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
	}
}
