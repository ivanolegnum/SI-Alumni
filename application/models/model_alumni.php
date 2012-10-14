<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_alumni extends CI_Model
{

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
		return $this->db->get_where('alumni', $data)->row();
	}
	
	// Get All
	public function get_all($query = NULL, $islike = FALSE)
	{
		// Order By
		$this->db->order_by('id_alumni', 'asc');
		// Check the query parameter
		if(isset($query) && !$islike) $this->db->where($query);
		// Check if is like?
		if($islike) $this->db->like($query);
		// Return
		return $this->db->get('alumni')->result();
	}
	
	// Insert Data
	public function insert($data = NULL)
	{
		$this->db->set($data);
		$this->db->set('tgl_daftar', 'CURRENT_DATE()', FALSE);
		$this->db->insert('alumni');
		return true;
	}
	
	// Update Data
	public function update($idx = 0, $data = NULL)
	{
		$this->db->set($data);
		$this->db->where('id_user', $idx);
		$this->db->update('alumni');
		return true;
	}

}