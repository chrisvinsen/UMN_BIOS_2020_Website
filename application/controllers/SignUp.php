<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SignUp extends CI_Controller
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
		$this->load->view('page/SignUp.php', $data);
	}

	public function sendMessageAction($email, $m)
	{
		//$email = $this->input->post('email');

		// The mail sending protocol.
		$config['protocol'] = 'smtp';
		// SMTP Server Address for Gmail.
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		// SMTP Port - the port that is required
		$config['smtp_port'] = 465;
		// SMTP Username like. (abc@gmail.com)
		$config['smtp_user'] = 'bios@umn.ac.id';
		// // SMTP Password like (abc***##)
		$config['smtp_pass'] = 'biosHMIF';


		// $config['smtp_user'] = 'javabuddies123@gmail.com';
		// SMTP Password like (abc***##)
		// $config['smtp_pass'] = 'Tugasakhirpemweb123';


		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('javabuddies123@gmail.com', 'BIOS UMN');
		// $this->email->to('cfirdayantij@gmail.com');
		$this->email->to($email);

		// $image = base_url()."/assets/resources/images/mail_attach.png"; // image path

		// $fileExt = get_mime_by_extension($image); // <- what the file helper is used for (to get the mime type)
		// <img src="data:'.$fileExt.';base64,'.base64_encode(file_get_contents($image)).'" alt="javabuddies">

		$this->email->subject('Konfirmasi Email');

		// echo $m;
		$this->email->message($m);

		if ($this->email->send()) {
			return 1;
		} else {
			return 0;
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
		$gname = $this->input->post('gname');
		$uname = $this->input->post('uname');
		$pass = trim($this->input->post('pass'));
		$pass = md5($pass . "bios2019mantap");

		$return = new stdClass();
		$return->status = false;

		$i = 0;
		$cek = 0;
		foreach ($firstName as $key) {
			if ($key != "") {
				$person[$i++]['firstName'] = $key;
				$cek++;
			}
		}
		$i = 0;
		foreach ($lastName as $key) {
			if ($key != "")
				$person[$i++]['lastName'] = $key;
		}
		$i = 0;
		foreach ($birthPlace as $key) {
			if ($key != "")
				$person[$i++]['birthPlace'] = $key;
		}
		$i = 0;
		foreach ($birthDate as $key) {
			if ($key != "")
				$person[$i++]['birthDate'] = $key;
		}
		$i = 0;
		foreach ($phoneNumber as $key) {
			if ($key != "")
				$person[$i++]['phoneNumber'] = $key;
		}
		$i = 0;
		foreach ($email as $key) {
			if ($key != "")
				$person[$i++]['email'] = $key;
		}
		$i = 0;
		foreach ($idLine as $key) {
			if ($key != "")
				$person[$i++]['idLine'] = $key;
		}

		if ($cek >= 2) {
			// persondeta
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
					if (($i - 1) == 0) {
						$m = "Kepada Tim " . $gname . ",<br>
							<br>
						Selamat Anda telah berhasil membuat akun tim <strong>" . $gname . "</strong> untuk BIOS Hackathon 2019! Klik disini untuk mengaktifkan akun tim Anda, kemudian silahkan mengupload bukti pembayaran tim Anda untuk tahap registrasi tim peserta lebih lanjut.<br>
						<br>
						Panitia BIOS 2019<br>
						Universitas Multimedia Nusantara
						";
						$this->sendMessageAction($data['email'], $m);
					}
				}

				// groupdetail
				$groupdetail['gname'] = $gname;
				$groupdetail['uname'] = $uname;
				$groupdetail['pass'] = $pass;
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
		}

		$return->stEmail = $stEmail;
		$return->stGname = $stGname;
		echo json_encode($return);
	}
}
