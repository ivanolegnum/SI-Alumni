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
    
    // Get Where
    public function get_info_by($var = NULL, $val = NULL)
    {
        // Order By
        $this->db->order_by('id_pekerjaan', 'asc');
        
        return $this->db->get_where('pekerjaan', array($var => $val))->result();
    }

}