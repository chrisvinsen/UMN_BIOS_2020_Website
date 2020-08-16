<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GroupName extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('HackathonModel');
	}

	public function index()
	{
		if (isset($_SESSION['user_data'])) {
			$gname = $_SESSION['user_data']['gname'];
	        $data['gname'] = $gname;
			$groupdetail = $this->HackathonModel->select_data($data,'groupdetail');
			$data2['groupId'] = $groupdetail['id'] ;
			$personId = $this->HackathonModel->select_array_data($data2,'group');

			$i=0;
			foreach ($personId as $key) {
				$data3['id'] = $key['personId'];
				$persondetail[$i++] = $this->HackathonModel->select_array_data($data3,'persondetail');
			}
			$data['groupdetail'] = $groupdetail;
			$data['persondetail'] = $persondetail;
		}
		$data['script'] = $this->load->view('include/Script', NULL, TRUE);
		$data['style'] = $this->load->view('include/Style', NULL, TRUE);
		$data['footer'] = $this->load->view('include/Footer', NULL, TRUE);
		$data['header'] = $this->load->view('include/Header', NULL, TRUE);
		$data['loader'] = $this->load->view('include/Loader', NULL, TRUE);		
		$this->load->view('page/GroupName.php', $data);
	}

	public function action(){

		$id=$this->input->post('id');
		$firstName=$this->input->post('firstName');
		$lastName=$this->input->post('lastName');
		$birthPlace=$this->input->post('birthPlace');
		$birthDate=$this->input->post('birthDate');
		$phoneNumber=$this->input->post('phoneNumber');
		$email=$this->input->post('email');
		$idLine=$this->input->post('idLine');		
		$fileCardBefore=$this->input->post('fileCardBefore');

		$gname=$_SESSION['user_data']['gname'];		

		$return = new stdClass();

		$status=false;

		$i=0;
		foreach ($id as $key ) {
			$person[$i++]['id'] = $key;
		}
		$i=0;
		foreach ($firstName as $key ) {
			$person[$i++]['firstName'] = $key;
		}		
		$i=0;
		foreach ($lastName as $key ) {
			$person[$i++]['lastName'] = $key;
		}		
		$i=0;
		foreach ($birthPlace as $key ) {
			$person[$i++]['birthPlace'] = $key;
		}		
		$i=0;
		foreach ($birthDate as $key ) {
			$person[$i++]['birthDate'] = $key;
		}		
		$i=0;
		foreach ($phoneNumber as $key ) {
			$person[$i++]['phoneNumber'] = $key;
		}		
		$i=0;
		foreach ($email as $key ) {
			$person[$i++]['email'] = $key;
		}		
		$i=0;
		foreach ($idLine as $key ) {
			$person[$i++]['idLine'] = $key;
		}
		$i=0;
		if($fileCardBefore)
			foreach ($fileCardBefore as $key ) {
				$person[$i++]['fileCard'] = $key;
			}		
		// var_dump($person);

		// persondeta
		$i=0;
		$iPerson = 0;
		foreach ($person as $data) {
			$status=true;
			$iPerson++;
			$persondetail[$i++] = $this->HackathonModel->update_data($data,'persondetail');
		}
		// echo "---------------------------\n";
		// var_dump($persondetail);

		$data2['gname'] = $gname;
		$groupdetail = $this->HackathonModel->select_data($data2,'groupdetail');

		// var_dump($groupdetail);


		if(!empty($_FILES['fileCard']['name'])){
            $filesCount = count($_FILES['fileCard']['name']);
            for($i = 0; $i < $filesCount; $i++){
            	if(!empty($_FILES['fileCard']['name'][$i])){
            		

		 			$_FILES['fileCard']['name'][$i] = str_replace(' ', '_', $_FILES['fileCard']['name'][$i]);
	                $_FILES['file']['name']     = "pd_".$persondetail[$i]['id'] ."_". $_FILES['fileCard']['name'][$i];
	                $_FILES['file']['type']     = $_FILES['fileCard']['type'][$i];
	                $_FILES['file']['tmp_name'] = $_FILES['fileCard']['tmp_name'][$i];
	                $_FILES['file']['error']     = $_FILES['fileCard']['error'][$i];
	                $_FILES['file']['size']     = $_FILES['fileCard']['size'][$i];

	                $uploadPath = './mantapBios1Secret/resources/card/';

	                if($_FILES['file']['name']!=""){
			        	if($persondetail[$i]['fileCard']!=""){
			        		unlink($uploadPath . $persondetail[$i]['fileCard']);
			        	}
	                	$persondetail[$i]['fileCard'] =  $_FILES['file']['name'];
			        	$persondetail[$i] = $this->HackathonModel->update_data($persondetail[$i],"persondetail");
	                }

	                $config['upload_path'] = $uploadPath;
	                $config['allowed_types'] = 'zip';
	                
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);
	                
	                if($this->upload->do_upload('file')){
	                    $st_file = $_FILES['file']['name'];
	                    $fileData = $this->upload->data();
	                    $uploadData[$i]['file_name'] = $fileData['file_name'];
	                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
	                }
	                else
	                    $st_file = $this->upload->display_errors();
            	}
			 		
            }
            
        }

		$iCard = 0;
        foreach ($persondetail as $key) {
        	if($key['fileCard']!="")
        		$iCard++;
        }
        if($iCard==$iPerson && $groupdetail['statusCard'] !=2 ){
			$groupdetail['statusCard'] =  1;
		    $this->HackathonModel->update_data($groupdetail,"groupdetail");
        }

		if(!empty($_FILES['filePembayaran']['name'])){
            $filesCount = count($_FILES['filePembayaran']['name']);
            for($i = 0; $i < $filesCount; $i++){
            	if(!empty($_FILES['filePembayaran']['name'][$i])){

		 			$_FILES['filePembayaran']['name'][$i] = str_replace(' ', '_', $_FILES['filePembayaran']['name'][$i]);
	                $_FILES['file']['name']     = "gd_pembayaran_".$groupdetail['id'] ."_". $_FILES['filePembayaran']['name'][$i];
	                $_FILES['file']['type']     = $_FILES['filePembayaran']['type'][$i];
	                $_FILES['file']['tmp_name'] = $_FILES['filePembayaran']['tmp_name'][$i];
	                $_FILES['file']['error']     = $_FILES['filePembayaran']['error'][$i];
	                $_FILES['file']['size']     = $_FILES['filePembayaran']['size'][$i];

	                $uploadPath = './mantapBios1Secret/resources/pembayaran/';

	                if($_FILES['file']['name']!=""){
			        	if($groupdetail['filePembayaran']!=""){
			        		unlink($uploadPath . $groupdetail['filePembayaran']);
			        	}
	                	$groupdetail['filePembayaran'] =  $_FILES['file']['name'];
						$groupdetail['statusPembayaran'] =  1;
			        	$groupdetail = $this->HackathonModel->update_data($groupdetail,"groupdetail");
	                }
						

	                $config['upload_path'] = $uploadPath;
	                $config['allowed_types'] = 'jpg|jpeg|png';
	                
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);
	                
	                if($this->upload->do_upload('file')){
	                    $st_file = $_FILES['file']['name'];
	                    $fileData = $this->upload->data();
	                    $uploadData[$i]['file_name'] = $fileData['file_name'];
	                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
	                }
	                else
	                    $st_file = $this->upload->display_errors();
            	}
			 		
            }
            
        }

		if(!empty($_FILES['fileProposal']['name'])){
            $filesCount = count($_FILES['fileProposal']['name']);
            for($i = 0; $i < $filesCount; $i++){
            	if(!empty($_FILES['fileProposal']['name'][$i])){
            		
		 			$_FILES['fileProposal']['name'][$i] = str_replace(' ', '_', $_FILES['fileProposal']['name'][$i]);
	                $_FILES['file']['name']     = "gd_pembayaran_".$groupdetail['id'] ."_". $_FILES['fileProposal']['name'][$i];
	                $_FILES['file']['type']     = $_FILES['fileProposal']['type'][$i];
	                $_FILES['file']['tmp_name'] = $_FILES['fileProposal']['tmp_name'][$i];
	                $_FILES['file']['error']     = $_FILES['fileProposal']['error'][$i];
	                $_FILES['file']['size']     = $_FILES['fileProposal']['size'][$i];

	                $uploadPath = './mantapBios1Secret/resources/proposal/';

	                if($_FILES['file']['name']!=""){
			        	if($groupdetail['fileProposal']!=""){
			        		unlink($uploadPath . $groupdetail['fileProposal']);
			        	}
	                	$groupdetail['fileProposal'] =  $_FILES['file']['name'];
			        	$groupdetail = $this->HackathonModel->update_data($groupdetail,"groupdetail");
	                }
						
	                $config['upload_path'] = $uploadPath;
	                $config['allowed_types'] = 'pdf';
	                
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);
	                
	                if($this->upload->do_upload('file')){
	                    $st_file = $_FILES['file']['name'];
	                    $fileData = $this->upload->data();
	                    $uploadData[$i]['file_name'] = $fileData['file_name'];
	                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
	                }
	                else
	                    $st_file = $this->upload->display_errors();
            	}
			 		
            }
            
        }

        if($groupdetail['fileProposal']!="" && $groupdetail['statusProposal']!=2){
			$groupdetail['statusProposal'] =  1;
		    $this->HackathonModel->update_data($groupdetail,"groupdetail");
        }

		$return->status = $status;

		echo json_encode($return);
	}

	public function signOut(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
