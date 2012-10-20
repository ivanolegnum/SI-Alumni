<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Copyright (C) FASILKOM UNSRI. 2012.
// Author:
//	-] Redi Vanhar
//	-] Nurimansyah Rifwan

class Main_ctrl extends CI_Controller {

	// Constructor
	public function __construct()
	{
		parent::__construct();
		
		// Load Model
		$this->load->model('model_user', 'user');
	}
	
	// Index
	public function index()
	{
		// Load Form Validation Library
		$this->load->library('form_validation');
		$validate = $this->form_validation;
		
		// Set Rules
		$validate
			->set_rules('userid', 'User ID', 'trim|required')
			->set_rules('password', 'Password', 'trim|required|callback_login_check|callback_status_check')
		// Set Message
			->set_message('required', '%s harus diisi!')
			->set_message('login_check', 'User ID dan/atau Password Anda salah!')
			->set_message('status_check', 'Mohon maaf, kamu belum menjadi alumni FASILKOM UNSRI.')
		// Set Error Delimiters
			->set_error_delimiters('<small class="error">', '</small>');
	
		// Cek Run
		if($validate->run())
		{
			// Set Data
			$data = array('username' => set_value('userid'), 'password' => set_value('password'));
			$result = $this->user->get_where($data);
			
			// Setting Session
			$this->session->set_userdata('AUTH', TRUE);
			$this->session->set_userdata('LEVEL', $result->level);
			$this->session->set_userdata('USER_ID', $result->id_user);
			
			// Check if alumni, then redirect a head to alumni page
			if($result->level == 'alumni')
			{
				// Load Model 
				$this->load->model('model_alumni', 'alumni');
				$alumni = $this->alumni->get_where(array('id_user' => $result->id_user));
				// Check if the status is '0'
				if(empty($alumni)) redirect('alumni');
			}
            
			
		}
		
		// Default Content
		$html = array('CONTENT' => $this->load->view('right_contents/content_frontpage', NULL, TRUE));
		
		// View Master Template
		$this->load->view('view_master', $html);
	}
	
	// Login Callback
	public function login_check()
	{	
		// Get User ID & Password
		$userid = set_value('userid');
		$password = set_value('password');
		
		// Check the data
		$data = array('username' => $userid, 'password' => $password);
		$isExist = $this->user->total($data);
		if($isExist > 0) return true;
		else return false;
	}
	
	// Status Callback
	public function status_check()
	{
		// Get User ID
		$userid = set_value('userid');
		
		// Check the data
		$data = array('username' => $userid, 'status' => '1');
		$isExist = $this->user->total($data);
		if($isExist > 0) return true;
		else return false;
	}
	
	// Logout
	public function logout()
	{
		$this->session->sess_destroy();
		// Redirect
		redirect(base_url());
	}

}