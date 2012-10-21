<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loker_ctrl extends CI_Controller {

	// Constructor
	public function __construct()
	{
		parent::__construct();
		
		// Load User Model
		$this->load->model('model_user', 'user');
        $this->load->model('model_pekerjaan','pekerjaan');
		
		}
		// End Checking AUTH & LEVEL
        
        public function index()
        {
            $html = array ('CONTENT' => $this->load->view('right_contents/content_pa_loker',null,true));
            
            $this->load->view('view_master',$html);
        }
        
        public function tampilkan_loker()
        {
            
        }
        
        public function masukkan_loker()
        {
            
        }
}
