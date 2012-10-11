<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_ctrl extends CI_Controller {
	
	// Constructor
	public function __construct()
	{
		parent::__construct();
		
		// Load User Model
		$this->load->model('model_user', 'user');
		
		// Check AUTH & LEVEL
		$auth = $this->session->userdata('AUTH');
		$level = $this->session->userdata('LEVEL');
		
		if(!isset($auth) || $level != 'admin')
		{
			// Send alert to browser then redirect
			echo '<!DOCTYPE html>';
			echo '<html>';
				echo '<head>';
				echo '<title>Sistem Informasi Alumni :: Access Restricted</title>';
				echo '<script type="text/javascript" src="'.base_url('assets/js/jquery-1.8.2.min.js').'">/* jQuery V.1.8.2 */</script>';
				echo '<script type="text/javascript">';
				echo '$(function() { alert(\'WARNING::\nAnda tidak mempunyai hak untuk mengakses halaman ini!\');';
				echo 'window.location.href = "'.base_url().'" });';
				echo '</script>';
				echo '</head>';
			echo '</html>';
			exit();
		}
		// End Checking AUTH & LEVEL
	}
	
	// Index
	public function index()
	{
		// HTML Data
		$html = array(
			'CONTENT' => $this->load->view('right_contents/content_admin_frontpage', NULL, TRUE)
		);
	
		// View Master Template
		$this->load->view('view_master', $html);
	}
	
	// ===================================================================================================
	// SECTION: ALUMNI
	// ===================================================================================================
	// Alumni Management
	public function page_management_alumni()
	{
		// HTML Data
		$html = array(
			'CONTENT' => $this->load->view('right_contents/content_admin_management_alumni', NULL, TRUE)
		);
		
		// View Master Template
		$this->load->view('view_master', $html);
	}
	
	// Alumni: List Jurusan
	public function page_alumni_list_jurusan($year = 0)
	{
		// Check Year
		if(!$year) redirect('admincp');
		
		// Load Model
		$this->load->model('model_jurusan', 'jurusan');
		
		// HTML Data
		$html = array(
			'CONTENT' => $this->load->view('right_contents/content_admin_alumni_list_jurusan', array(
				'LIST_JURUSAN' => $this->jurusan->get_all()
			), TRUE)
		);
		
		// View Master Template
		$this->load->view('view_master', $html);
	}
	
	// Alumni: List Alumni
	public function page_alumni_list($year = 0, $id_jurusan = 0)
	{
	
		// Check Year and ID Jurusan
		if(!$year || !$id_jurusan) redirect('admincp');
		
		// Load Model
		$this->load->model('model_jurusan', 'jurusan');
		$this->load->model('model_alumni', 'alumni');
		
		// Load Library
		$this->load->library('table');
		
		// HTML Data
		$html = array(
			'CONTENT' => $this->load->view('right_contents/content_admin_alumni_list_data', array(
				'JURUSAN' => $this->jurusan->get_where(array('id' => $id_jurusan))->nama,
				'LIST_ALUMNI' => $this->alumni->get_all(array('tgl_wisuda' => $year), TRUE)
			), TRUE)
		);
		
		// View Master Template
		$this->load->view('view_master', $html);
	
	}
	
	// ===================================================================================================
	// ===================================================================================================

}