<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HackathonModel extends CI_Model
{

	public function index()
	{
		$this->load->view('Home');
	}

	public function input_data($data, $table)
	{
		$this->db->insert($table, $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	public function select_data($data, $table)
	{
		$result = $this->db->get_where($table, $data)->row_array();
		return $result;
	}

	public function select_array_table($table)
	{
		$result = $this->db->get($table)->result_array();
		return $result;
	}

	public function select_array_data($data, $table)
	{
		$result = $this->db->get_where($table, $data)->result_array();
		return $result;
	}

	public function update_data($data, $table)
	{
		$this->db->replace($table, $data);
		return $this->select_data($data, $table);
	}

	public function select_all()
	{
		$groupdetail = $this->select_array_table('groupdetail');
		$sql = "SELECT groupId, GROUP_CONCAT(personId) personId FROM `group` group by 1";
		$grouprelation =  $this->db->query($sql)->result_array();
		$i = 0;
		$group = array();
		foreach ($grouprelation as $key) {
			$data['id'] = $key['groupId'];
			$group[$i]['groupdetail'] = $this->select_data($data, 'groupdetail');
			$j = 0;
			$personId = explode(',', $key['personId']);
			foreach ($personId as $key2) {
				$data2['id'] = $key2;
				$group[$i]['persondetail'][$j++] = $this->select_data($data2, 'persondetail');
			}
			$i++;
		}
		return $group;
	}

	public function deleteGroup($id)
	{
		$data['groupId'] = $id;
		$personId = $this->select_array_data($data, 'group');
		foreach ($personId as $value) {
			$this->db->where('id', $value['personId']);
			$this->db->delete('persondetail');
		}
		$this->db->where('id', $id);
		$this->db->delete('groupdetail');
		$this->db->where('groupId', $id);
		return $this->db->delete('group');
	}

	public function getUserInfo($id)
	{
		$q = $this->db->get_where('persondetail', array('id' => $id), 1);
		if ($this->db->affected_rows() > 0) {
			$row = $q->row();
			return $row;
		} else {
			error_log('no user found getUserInfo(' . $id . ')');
			return false;
		}
	}

	public function getUserInfoByEmail($email)
	{
		$q = $this->db->get_where('persondetail', array('email' => $email), 1);
		if ($this->db->affected_rows() > 0) {
			$row = $q->row();
			return $row;
		}
	}

	public function insertToken($user_id)
	{
		$token = substr(sha1(rand()), 0, 30);
		$date = date('Y-m-d');

		$string = array(
			'token' => $token,
			'user_id' => $user_id,
			'created' => $date
		);
		$query = $this->db->insert_string('tokens', $string);
		$this->db->query($query);
		return $token . $user_id;
	}

	public function isTokenValid($token)
	{
		$tkn = substr($token, 0, 30);
		$uid = substr($token, 30);

		$q = $this->db->get_where('tokens', array(
			'tokens.token' => $tkn,
			'tokens.user_id' => $uid
		), 1);

		if ($this->db->affected_rows() > 0) {
			$row = $q->row();

			$created = $row->created;
			$createdTS = strtotime($created);
			$today = date('Y-m-d');
			$todayTS = strtotime($today);

			if ($createdTS != $todayTS) {
				return false;
			}
			$data['id'] = $row->user_id;
			$user_info = $this->select_data($data, 'groupdetail');

			return $user_info;
		} else {
			return false;
		}
	}

	public function updatePassword($post)
	{
		$this->db->where('gname', $post['gname']);
		$this->db->update('groupdetail', array('pass' => $post['pass']));
		return true;
	}
}
