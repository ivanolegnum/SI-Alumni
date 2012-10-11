<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model {

	// Constructor
	public function __construct()
	{
		parent::__construct();
		// Load Database
		$this->load->database();
	}
	
	// Get total data.
	public function total($data = NULL)
	{
		// Check the input first
		if(isset($data)) $this->db->where($data);
		// Return total data
		return $this->db->get('user')->num_rows();
	}
	
	// Get Spesific Data, result by 1 row/data.
	public function get_where($data = NULL)
	{
		return $this->db->get_where('user', $data)->row(); 
	}

}