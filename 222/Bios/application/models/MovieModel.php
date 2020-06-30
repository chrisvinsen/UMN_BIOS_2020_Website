<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MovieModel extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function getAllMovies(){
		$res = $this->db->query("SELECT * FROM movies")->result_array();
		
		return $res;
	}

	public function getMovie($id){
		$res = $this->db->query("SELECT * FROM movies WHERE id='". $id . "'")->row_array();
		
		return $res;
	}

	public function insert($values){
		$this->db->insert('movies', $values);
	}

	public function update($values, $id){
		$this->db->where('id', $id); 
		$this->db->update('movies', $values); 

	}
	
}
