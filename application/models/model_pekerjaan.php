<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_pekerjaan extends CI_Model {

	// Constructor
	public function __construct()
	{
		parent::__construct();
		// Load Database
		$this->load->database();
	}
	
	// Insert Data
	public function insert($data = NULL)
	{
		$this->db->set($data);
		$this->db->set('tgl_daftar', 'CURRENT_DATE()', FALSE);
		$this->db->insert('pekerjaan');
		return true;
	}

}