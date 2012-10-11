<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_jurusan extends CI_Model {

	// Constructor
	public function __construct()
	{
		parent::__construct();
		// Load Database
		$this->load->database();
	}
	
	// Get Where
	public function get_where($data = NULL)
	{
		return $this->db->get_where('jurusan', $data)->row();
	}
	
	// Get All
	public function get_all($query = NULL)
	{
		// Order By
		$this->db->order_by('id', 'asc');
		// Check the query parameter
		if(isset($query)) $this->db->where($query);
		// Return
		return $this->db->get('jurusan')->result();
	}

}