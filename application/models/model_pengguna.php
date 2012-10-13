<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_pengguna extends CI_Model
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
		return $this->db->get_where('pa', $data)->row();
	}
	
	// Get All
	public function get_all($query = NULL, $islike = FALSE)
	{
		// Order By
		$this->db->order_by('id', 'asc');
		// Check the query parameter
		if(isset($query) && !$islike) $this->db->where($query);
		// Check if is like?
		if($islike) $this->db->like($query);
		// Return
		return $this->db->get('pa')->result();
	}
	
	// Insert Lowongan kerja
    public function insert_loker()
    {
        $this->db->order('id','asc');
    }
	

}