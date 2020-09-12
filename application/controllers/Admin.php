<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('HackathonModel');
	}

	public function index()
	{
		if (isset($_SESSION['mantapBiosAdmin']) && $_SESSION['mantapBiosAdmin'] == "997a8ec108acea9fe390942ad76d6c55") {
			$data['group'] = $this->HackathonModel->select_all();
			$data['script'] = $this->load->view('include/Script', NULL, TRUE);
			$data['loader'] = $this->load->view('include/Loader', NULL, TRUE);
			$data['style'] = $this->load->view('include/Style', NULL, TRUE);
			$this->load->view('page/Admin.php', $data);
		} else {
			$this->load->view('page/AdminLogin.php');
		}
	}

	public function uploadView()
	{
		if (isset($_SESSION['mantapBiosAdmin']) && $_SESSION['mantapBiosAdmin'] == "997a8ec108acea9fe390942ad76d6c55") {
			$data2['id'] = 'bios19';
			$data['upload'] = $this->HackathonModel->select_data($data2, 'upload');
			$this->load->view('page/Upload.php', $data);
		} else {
			$this->load->view('page/AdminLogin.php');
		}
	}

	public function uploadAction()
	{
		$data['id'] = "bios19";
		$upload = $this->HackathonModel->select_data($data, 'upload');

		if (!empty($_FILES['rulebook']['name'])) {
			$filesCount = count($_FILES['rulebook']['name']);
			for ($i = 0; $i < $filesCount; $i++) {
				if (!empty($_FILES['rulebook']['name'][$i])) {

					$_FILES['rulebook']['name'][$i] = str_replace(' ', '_', $_FILES['rulebook']['name'][$i]);
					$_FILES['file']['name']     = $_FILES['rulebook']['name'][$i];
					$_FILES['file']['type']     = $_FILES['rulebook']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['rulebook']['tmp_name'][$i];
					$_FILES['file']['error']     = $_FILES['rulebook']['error'][$i];
					$_FILES['file']['size']     = $_FILES['rulebook']['size'][$i];

					$uploadPath = './assets/resources/upload/';

					if ($_FILES['file']['name'] != "") {
						$upload['id'] =  "bios19";
						if ($upload['rulebook'] != "") {
							unlink($uploadPath . $upload['rulebook']);
						}
						$upload['rulebook'] =  $_FILES['file']['name'];
						$upload = $this->HackathonModel->update_data($upload, "upload");
					}

					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'pdf|docx';

					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ($this->upload->do_upload('file')) {
						$st_file = $_FILES['file']['name'];
						$fileData = $this->upload->data();
						$uploadData[$i]['file_name'] = $fileData['file_name'];
						$uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
					} else
						$st_file = $this->upload->display_errors();
				}
			}
		}

		if (!empty($_FILES['proposal']['name'])) {
			$filesCount = count($_FILES['proposal']['name']);
			for ($i = 0; $i < $filesCount; $i++) {
				if (!empty($_FILES['proposal']['name'][$i])) {

					$_FILES['proposal']['name'][$i] = str_replace(' ', '_', $_FILES['proposal']['name'][$i]);
					$_FILES['file']['name']     = $_FILES['proposal']['name'][$i];
					$_FILES['file']['type']     = $_FILES['proposal']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['proposal']['tmp_name'][$i];
					$_FILES['file']['error']     = $_FILES['proposal']['error'][$i];
					$_FILES['file']['size']     = $_FILES['proposal']['size'][$i];

					$uploadPath = './assets/resources/upload/';

					if ($_FILES['file']['name'] != "") {
						$upload['id'] =  "bios19";
						if ($upload['proposal'] != "") {
							unlink($uploadPath . $upload['proposal']);
						}
						$upload['proposal'] =  $_FILES['file']['name'];
						$upload = $this->HackathonModel->update_data($upload, "upload");
					}


					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'pdf|docx';

					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ($this->upload->do_upload('file')) {
						$st_file = $_FILES['file']['name'];
						$fileData = $this->upload->data();
						$uploadData[$i]['file_name'] = $fileData['file_name'];
						$uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
					} else
						$st_file = $this->upload->display_errors();
				}
			}
		}
		echo json_encode(1);
	}

	public function sendMessageAction($email, $title, $m)
	{
		//$email = $this->input->post('email');

		// The mail sending protocol.
		$config['protocol'] = 'smtp';
		// SMTP Server Address for Gmail.
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		// SMTP Port - the port that you is required
		$config['smtp_port'] = 465;
		// // SMTP Username like. (abc@gmail.com)
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

		$this->email->subject($title);
		// $m = 'This is your ID and password!<img src="'.base_url().'assets/resources/home/logo-bios.png"><br>';
		// echo $m;
		$this->email->message($m);
		if ($this->email->send()) {
			return 1;
		} else {
			return 0;
		}
	}

	public function sendEmailAction()
	{
		$email = $this->input->post('email');
		$groupId = $this->input->post('groupId');
		$statusEmail = $this->input->post('statusEmail');

		$data['id'] = $groupId;
		$groupdetail = $this->HackathonModel->select_data($data, 'groupdetail');

		$title = "Verifikasi Data Peserta";
		$m = "Kepada Tim " . $groupdetail['gname'] . ",<br>
			<br>
			Terimakasih telah melakukan registrasi data-data anggota tim dengan benar. Selanjutnya, tim Anda dapat mengupload proposal ide aplikasi sesuai dengan ketentuan yang dapat dibaca pada rulebook dan format penulisan proposal.<br>
			<br>
			Panitia BIOS 2019<br>
			Universitas Multimedia Nusantara";
		if ($statusEmail == "proposal") {
			$title = "Verifikasi Proposal";
			$m = "Kepada Tim " . $groupdetail['gname'] . ",<br>
				<br>
				Terimakasih telah mengumpulkan proposal ide aplikasi Tim Anda. Nantikan pengumuman hasil seleksi 30 tim yang lolos ke final BIOS Hackathon 2019 pada tanggal 22 Agustus 2019. Hasil pengumuman dapat dicek pada alamat web bios.umn.ac.id/hackathon atau email masing-masing peserta. Semoga tim Anda beruntung!<br>
				<br>
				Salam hormat,<br>
				<br>
				Panitia BIOS 2019<br>
				Universitas Multimedia Nusantara";
			$groupdetail['statusProposal'] =  2;
			$this->HackathonModel->update_data($groupdetail, "groupdetail");
		} else if ($statusEmail == "pembayaran") {
			$title = "Verifikasi Bukti Pembayaran";
			$m = "Kepada Tim " . $groupdetail['gname'] . ",<br>
				<br>
				Terimakasih telah melakukan pembayaran biaya pendaftaran BIOS Hackathon 2019 dengan benar. Selanjutnya, tim Anda dapat mengupload kartu identitas mahasiswa dan surat keterangan mahasiswa aktif masing-masing anggota untuk diverifikasi lebih lanjut.<br>
				<br>
				Panitia BIOS 2019<br>
				Universitas Multimedia Nusantara";
			$groupdetail['statusPembayaran'] =  2;
			$groupdetail['statusCard'] =  0;
			$this->HackathonModel->update_data($groupdetail, "groupdetail");
		} else {
			$groupdetail['statusProposal'] =  0;
			$groupdetail['statusCard'] =  2;
			$this->HackathonModel->update_data($groupdetail, "groupdetail");
		}


		echo json_encode($this->sendMessageAction($email, $title, $m));
	}

	public function editAction()
	{
		$groupId = $this->input->post('groupId');

		$data['id'] = $groupId;
		$groupdetail = $this->HackathonModel->select_data($data, 'groupdetail');
		$data2['groupId'] = $groupdetail['id'];
		$personId = $this->HackathonModel->select_array_data($data2, 'group');

		$i = 0;
		foreach ($personId as $key) {
			$data3['id'] = $key['personId'];
			$persondetail[$i++] = $this->HackathonModel->select_array_data($data3, 'persondetail');
		}
		$data['groupdetail'] = $groupdetail;
		$data['persondetail'] = $persondetail;
		$this->load->view('page/AdminEdit.php', $data);
	}


	public function deleteAction()
	{
		$groupId = $this->input->post('groupId');
		if ($this->HackathonModel->deleteGroup($groupId))
			echo json_decode(1);
		else
			echo json_decode(0);
	}

	public function action()
	{

		$id = $this->input->post('id');
		$firstName = $this->input->post('firstName');
		$lastName = $this->input->post('lastName');
		$birthPlace = $this->input->post('birthPlace');
		$birthDate = $this->input->post('birthDate');
		$phoneNumber = $this->input->post('phoneNumber');
		$email = $this->input->post('email');
		$idLine = $this->input->post('idLine');
		$fileCardBefore = $this->input->post('fileCardBefore');
		$gname = $this->input->post('gname');

		$return = new stdClass();

		$status = false;

		$i = 0;
		foreach ($id as $key) {
			$person[$i++]['id'] = $key;
		}
		$i = 0;
		foreach ($firstName as $key) {
			$person[$i++]['firstName'] = $key;
		}
		$i = 0;
		foreach ($lastName as $key) {
			$person[$i++]['lastName'] = $key;
		}
		$i = 0;
		foreach ($birthPlace as $key) {
			$person[$i++]['birthPlace'] = $key;
		}
		$i = 0;
		foreach ($birthDate as $key) {
			$person[$i++]['birthDate'] = $key;
		}
		$i = 0;
		foreach ($phoneNumber as $key) {
			$person[$i++]['phoneNumber'] = $key;
		}
		$i = 0;
		foreach ($email as $key) {
			$person[$i++]['email'] = $key;
		}
		$i = 0;
		foreach ($idLine as $key) {
			$person[$i++]['idLine'] = $key;
		}
		$i = 0;
		if ($fileCardBefore)
			foreach ($fileCardBefore as $key) {
				$person[$i++]['fileCard'] = $key;
			}
		// var_dump($person);

		// persondeta
		$i = 0;
		$iPerson = 0;
		foreach ($person as $data) {
			$status = true;
			$iPerson++;
			$persondetail[$i++] = $this->HackathonModel->update_data($data, 'persondetail');
		}
		// echo "---------------------------\n";
		// var_dump($persondetail);

		$data2['gname'] = $gname;
		$groupdetail = $this->HackathonModel->select_data($data2, 'groupdetail');

		// var_dump($groupdetail);


		if (!empty($_FILES['fileCard']['name'])) {
			$filesCount = count($_FILES['fileCard']['name']);
			for ($i = 0; $i < $filesCount; $i++) {
				if (!empty($_FILES['fileCard']['name'][$i])) {


					$_FILES['fileCard']['name'][$i] = str_replace(' ', '_', $_FILES['fileCard']['name'][$i]);
					$_FILES['file']['name']     = "pd_" . $persondetail[$i]['id'] . "_" . $_FILES['fileCard']['name'][$i];
					$_FILES['file']['type']     = $_FILES['fileCard']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['fileCard']['tmp_name'][$i];
					$_FILES['file']['error']     = $_FILES['fileCard']['error'][$i];
					$_FILES['file']['size']     = $_FILES['fileCard']['size'][$i];

					

					if ($_FILES['file']['name'] != "") {
						$persondetail[$i]['fileCard'] =  $_FILES['file']['name'];
						$persondetail[$i] = $this->HackathonModel->update_data($persondetail[$i], "persondetail");
					}


					$uploadPath = './assets/resources/card';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'jpg|jpeg|png';

					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ($this->upload->do_upload('file')) {
						$st_file = $_FILES['file']['name'];
						$fileData = $this->upload->data();
						$uploadData[$i]['file_name'] = $fileData['file_name'];
						$uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
					} else
						$st_file = $this->upload->display_errors();
				}
			}
		}

		$iCard = 0;
		foreach ($persondetail as $key) {
			if ($key['fileCard'] != "")
				$iCard++;
		}
		if ($iCard == $iPerson && $groupdetail['statusCard'] != 2) {
			$groupdetail['statusCard'] =  1;
			$this->HackathonModel->update_data($groupdetail, "groupdetail");
		}

		if (!empty($_FILES['filePembayaran']['name'])) {
			$filesCount = count($_FILES['filePembayaran']['name']);
			for ($i = 0; $i < $filesCount; $i++) {
				if (!empty($_FILES['filePembayaran']['name'][$i])) {

					$_FILES['filePembayaran']['name'][$i] = str_replace(' ', '_', $_FILES['filePembayaran']['name'][$i]);
					$_FILES['file']['name']     = "gd_pembayaran_" . $groupdetail['id'] . "_" . $_FILES['filePembayaran']['name'][$i];
					$_FILES['file']['type']     = $_FILES['filePembayaran']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['filePembayaran']['tmp_name'][$i];
					$_FILES['file']['error']     = $_FILES['filePembayaran']['error'][$i];
					$_FILES['file']['size']     = $_FILES['filePembayaran']['size'][$i];

					if ($_FILES['file']['name'] != "") {
						$groupdetail['filePembayaran'] =  $_FILES['file']['name'];
						$groupdetail['statusPembayaran'] =  1;
						$groupdetail = $this->HackathonModel->update_data($groupdetail, "groupdetail");
					}


					$uploadPath = './assets/resources/pembayaran';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'jpg|jpeg|png';

					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ($this->upload->do_upload('file')) {
						$st_file = $_FILES['file']['name'];
						$fileData = $this->upload->data();
						$uploadData[$i]['file_name'] = $fileData['file_name'];
						$uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
					} else
						$st_file = $this->upload->display_errors();
				}
			}
		}

		if (!empty($_FILES['fileProposal']['name'])) {
			$filesCount = count($_FILES['fileProposal']['name']);
			for ($i = 0; $i < $filesCount; $i++) {
				if (!empty($_FILES['fileProposal']['name'][$i])) {

					$_FILES['fileProposal']['name'][$i] = str_replace(' ', '_', $_FILES['fileProposal']['name'][$i]);
					$_FILES['file']['name']     = "gd_pembayaran_" . $groupdetail['id'] . "_" . $_FILES['fileProposal']['name'][$i];
					$_FILES['file']['type']     = $_FILES['fileProposal']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['fileProposal']['tmp_name'][$i];
					$_FILES['file']['error']     = $_FILES['fileProposal']['error'][$i];
					$_FILES['file']['size']     = $_FILES['fileProposal']['size'][$i];

					if ($_FILES['file']['name'] != "") {
						$groupdetail['fileProposal'] =  $_FILES['file']['name'];
						$groupdetail = $this->HackathonModel->update_data($groupdetail, "groupdetail");
					}


					$uploadPath = './assets/resources/proposal';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'pdf';

					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ($this->upload->do_upload('file')) {
						$st_file = $_FILES['file']['name'];
						$fileData = $this->upload->data();
						$uploadData[$i]['file_name'] = $fileData['file_name'];
						$uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
					} else
						$st_file = $this->upload->display_errors();
				}
			}
		}

		if ($groupdetail['fileProposal'] != "" && $groupdetail['statusProposal'] != 2) {
			$groupdetail['statusProposal'] =  1;
			$this->HackathonModel->update_data($groupdetail, "groupdetail");
		}

		$return->status = $status;

		echo json_encode($return);
	}
}
