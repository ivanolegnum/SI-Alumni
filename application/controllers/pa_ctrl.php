<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pa_ctrl extends CI_Controller {

	// Constructor
	public function __construct()
	{
		parent::__construct();
		
		// Load User Model
		$this->load->model('model_user', 'user');
		
		// Check AUTH & LEVEL
		$auth = $this->session->userdata('AUTH');
		$level = $this->session->userdata('LEVEL');
		
		if(!isset($auth) || $level != 'pengguna')
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
    
    public function index()
    {
<<<<<<< HEAD
        $html = array ('CONTENT' => $this->load->view ('right_contents/content_pa_frontpage',null, TRUE));
        
=======
        $html = array (
                        'CONTENT' => $this->load->view("right_contents/content_pa_frontpage",null,true) 
 
                        );
>>>>>>> master
        $this->load->view("view_master",$html);
    }
    
 }
    
    
 
