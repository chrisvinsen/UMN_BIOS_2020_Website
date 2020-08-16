<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SignUp extends CI_Controller
{
	function __construct()
	{
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
		$this->load->view('page/SignUp.php', $data);
	}

	public function sendMessageAction($email, $m)
	{

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'bios@umn.ac.id';
		$config['smtp_pass'] = 'biosHMIF';

		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('bios@umn.ac.id', 'BIOS UMN');
		$this->email->to($email);
		$this->email->subject('Konfirmasi Email');

		$this->email->message($m);

		if ($this->email->send()) {
			return 1;
		} else {
			return $this->email->print_debugger();
		}
	}

	public function action()
	{
		$firstName = $this->input->post('firstName');
		$lastName = $this->input->post('lastName');
		$birthPlace = $this->input->post('birthPlace');
		$birthDate = $this->input->post('birthDate');
		$phoneNumber = $this->input->post('phoneNumber');
		$email = $this->input->post('email');
		$idLine = $this->input->post('idLine');
		$gname = $this->input->post('group_name');
		$uname = $this->input->post('university');
		$pass = trim($this->input->post('password'));
		$pass = md5($pass . "bios2019mantap");

		$return = new stdClass();
		$return->status = false;

		for ($i = 0; $i < 4; $i++) {
			if ($firstName[$i] != "") {
				$person[$i]['firstName'] = $firstName[$i];
				$person[$i]['lastName'] = $lastName[$i];
				$person[$i]['birthPlace'] = $birthPlace[$i];
				$person[$i]['birthDate'] = $birthDate[$i];
				$person[$i]['phoneNumber'] = $phoneNumber[$i];
				$person[$i]['email'] = $email[$i];
				$person[$i]['idLine'] = $idLine[$i];
			} 
		}

		// person data
		$i = 0;
		$stEmail = true;
		$personCekEmail = $this->HackathonModel->select_array_table('persondetail');
		foreach ($person as $data) {
			foreach ($personCekEmail as $key) {
				if ($data['email'] == $key['email']) {
					if ($i == 0)
						$return->member = "Leader";
					else
						$return->member = "Member " . $i;
					$stEmail = false;
				}
			}
			$i++;
		}
		$stGname = true;
		$groupCekGname = $this->HackathonModel->select_array_table('groupdetail');
		foreach ($groupCekGname as $key) {
			if ($gname == $key['gname']) {
				$stGname = false;
			}
		}
		if ($stEmail == true && $stGname == true) {
			foreach ($person as $data) {
				$personIdArray[$i++] = $this->HackathonModel->input_data($data, 'persondetail');
			}

			$token = md5(Date('Y-m-d h:i:s'));

			$m = "Kepada Tim " . $gname . ",<br>
				<br>
				Selamat Anda telah berhasil membuat akun tim <b> " . $gname . " </b> untuk BIOS Hackathon 2020! Silahkan Klik <a href='http://localhost/BIOS-Website/GroupName/activate?token=" . $token . "'><b>disini<b></a> untuk melakukan aktivasi akun tim, agar Anda dapat masuk ke <a href='http://localhost/BIOS-Website/signin'><b>Website BIOS<b></a> menggunakan akun tim Anda. Jangan lupa untuk melakukan pembayaran dan mengupload bukti pembayaran pada website BIOS untuk tahap registrasi tim peserta lebih lanjut. Terimakasih
				<br>
			Panitia BIOS 2020<br>
			Universitas Multimedia Nusantara
			";
			$this->sendMessageAction($person[0]['email'], $m);

			// groupdetail
			$groupdetail['gname'] = $gname;
			$groupdetail['uname'] = $uname;
			$groupdetail['pass'] = $pass;
			$groupdetail['token'] = $token;
			$groupdetail['activated'] = 0;
			$groupdetail['statusPembayaran'] = 0;
			$groupdetail['statusProposal'] = -1;
			$groupdetail['statusCard'] = -1;
			$groupId = $this->HackathonModel->input_data($groupdetail, 'groupdetail');

			// grouprelation
			foreach ($personIdArray as $key) {
				$group['groupid'] = $groupId;
				$group['personid'] = $key;
				$this->HackathonModel->input_data($group, 'group');
				$return->status = true;
			}
		}

		$return->stEmail = $stEmail;
		$return->stGname = $stGname;
		echo json_encode($return);
	}
}
