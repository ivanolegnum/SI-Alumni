<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumni_ctrl extends CI_Controller {

	// Constructor
	public function __construct()
	{
		parent::__construct();
		
		// Load User Model
		$this->load->model('model_user', 'user');
		
		// Check AUTH & LEVEL
		$auth = $this->session->userdata('AUTH');
		$level = $this->session->userdata('LEVEL');
		
		if(!isset($auth) || $level != 'alumni')
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
		// Load Libs
		$this->load->library('table');
		$this->load->library('form_validation');
		
		// Load Models
		$this->load->model('model_alumni', 'alumni');
		$this->load->model('model_jurusan', 'jurusan');
		
		// Form Validation
		$validate = $this->form_validation;
		$validate
		// Set Rules
		// --- Data Alumni
		->set_rules('jurusan', 'Jurusan', 'trim|callback_dropdown_check')
		->set_rules('nama', 'Nama Lengkap', 'trim|required')
		->set_rules('ttl', 'Tempat/Tanggal Lahir', 'trim|required')
		->set_rules('yudisium', 'Tanggal Yudisium', 'trim|required')
		->set_rules('wisuda', 'Tanggal Wisuda', 'trim|required')
		->set_rules('studi', 'Lama Studi', 'trim|required')
		->set_rules('ipk', 'Indeks Prestasi Kumulatif', 'trim|required|numeric')
		->set_rules('alamat', 'Alamat Lengkap', 'trim|required')
		->set_rules('email', 'Email', 'trim|required|valid_email')
		->set_rules('telp', 'No. Telepon', 'trim|required|numeric')
		->set_rules('ponsel', 'Ponsel', 'trim|numeric')
		// --- Data Pekerjaan
		->set_rules('tempat', 'Tempat Bekerja', 'trim')
		->set_rules('status', 'Status Pekerjaan', 'trim|callback_dropdown_check_pekerjaan')
		->set_rules('alamat_kerja', 'Alamat Pekerjaan', 'trim|callback_if_job_filled')
		->set_rules('jabatan', 'Jabatan Pekerjaan', 'trim|callback_if_job_filled')
		// --- Data Orang Tua
		->set_rules('nama_ot', 'Nama Orang Tua', 'trim|required')
		->set_rules('alamat_ot', 'Alamat Orang Tua', 'trim|required')
		->set_rules('telp_ot', 'Telepon', 'trim|required|numeric')
		->set_rules('ponsel_ot', 'Ponsel', 'trim|numeric')
		// Set Message
		->set_message('required', '%s tidak boleh kosong.')
		->set_message('dropdown_check', '%s harus dipilih.')
		->set_message('dropdown_check_pekerjaan', '%s harus dipilih.')
		->set_message('numeric', '%s harus berupa angka.')
		->set_message('valid_email', '%s harus merupakan email yang valid.')
		->set_message('if_job_filled', '%s harus diisi.')
		// Set Error Delimiters
		->set_error_delimiters('<small class="error">', '</small>');
		
		// Run
		if($validate->run())
		{
			// Check for ambiguos data malfunction
			$isExist = $this->alumni->get_where(array('id_user' => $this->session->userdata('USER_ID')));
			if(!empty($isExist))
			{
				redirect('alumni');
				exit();
			}
			
			// Retrieve Data
			$data = array(
			
				// Alumni Data
				'id_user' => $this->session->userdata('USER_ID'),
				'nim' => $this->user->get_where(array('id_user' => $this->session->userdata('USER_ID')))->username,
				'nama' => set_value('nama'),
				'id_jurusan' => set_value('jurusan'),
				'ttl' => set_value('ttl'),
				'tgl_wisuda' => set_value('wisuda'),
				'tgl_yudisium' => set_value('yudisium'),
				'lama_studi' => set_value('studi'),
				'ipk' => set_value('ipk'),
				'alamat' => set_value('alamat'),
				'email' => set_value('email'),
				'telepon' => set_value('telp'),
				'ponsel' => set_value('ponsel'),
				
				// Job Data
				'tempat' => set_value('tempat'),
				
				// Parent Data
				'nama_ot' => set_value('nama_ot'),
				'alamat_ot' => set_value('alamat_ot'),
				'telepon_ot' => set_value('telp_ot'),
				'ponsel_ot' => set_value('ponsel_ot')
			
			);
			
			// Check for not-required fields
			// Data Alumni
			if(empty($data['ponsel'])) unset($data['ponsel']);
			
			// Job Data
			if(!empty($data['tempat']))
			{
				// Load Model
				$this->load->model('model_pekerjaan', 'pekerjaan');
				
				// Retrieve Data
				$data_p = array(
					'id_user' => $this->session->userdata('USER_ID'),
					'tempat' => set_value('tempat'),
					'status' => set_value('status'),
					'alamat' => set_value('alamat_kerja'),
					'jabatan' => set_value('jabatan')
				);
				
				
				// Insert Process
				$this->pekerjaan->insert($data_p);
			}
			// Unset Tempat Pekerjaan
			unset($data['tempat']);
			
			// Parent Data
			if(empty($data['ponsel_ot'])) unset($data['ponsel_ot']);
			
			// Insert Process
			$this->alumni->insert($data);
		
			// Alert Information
			echo '<!DOCTYPE html>';
			echo '<html>';
				echo '<head>';
				echo '<title>Sistem Informasi Alumni :: Registrasi Berhasil</title>';
				echo '<script type="text/javascript" src="'.base_url('assets/js/jquery-1.8.2.min.js').'">/* jQuery V.1.8.2 */</script>';
				echo '<script type="text/javascript">';
				echo '$(function() { alert(\'INFORMASI::\nTerima kasih telah mendaftarkan informasi alumni kamu.\nKamu dapat mengubah data informasi kamu di halaman alumni.\n\nSalam hangat,\nTim Sistem Informasi Alumni FASILKOM UNSRI!\');';
				echo 'window.location.href = "'.base_url().'" });';
				echo '</script>';
				echo '</head>';
			echo '</html>';
			exit();
		} else {
            // Load Model Pekerjaan
            $this->load->model('model_pekerjaan', 'pekerjaan');
          
			// HTML Data
			$html = array(
				'CONTENT' => $this->load->view('right_contents/content_alumni_frontpage', array(
					'ALUMNI' => $this->alumni->get_where(array('id_user' => $this->session->userdata('USER_ID'))),
					'LIST_JURUSAN' => $this->jurusan->get_all(),
                    'LIST_PEKERJAAN' => $this->pekerjaan->get_info_by('id_user', $this->session->userdata('USER_ID'))
				), TRUE)
			);
			
			// View Master Template
			$this->load->view('view_master', $html);
		}
	}
	
	// Dropdown Check Callback
	public function dropdown_check_pekerjaan($val)
	{
		// Store Data
		$tempat = set_value('tempat');
		
		// Check jika tempat tidak kosong
		if(!empty($tempat))
		{
				if($val == '-' || $val == '--') return false;
				else return true;
		}
	}
	
	// Dropdown Check Callback
	public function dropdown_check($val)
	{
		// Store Data
		if($val == '-' || $val == '--') return false;
		else return true;
	}
	
	// Callback about Pekerjaan
	public function if_job_filled($val)
	{
		// Store Data
		$tempat = set_value('tempat');
		
		// Check!
		if(!empty($tempat))
		{
			if(empty($val)) return false;
			else return true;
		} else return true;
	}
	
	// AJAX Update Alumni
	public function AJAX_Update_Alumni()
	{
		// Form Validation
		$this->load->library('form_validation');
		$validate = $this->form_validation;
		
		// Set Rules
		$validate
		// Data Alumni
		->set_rules('id_user', NULL, 'required|trim|numeric')
		/*->set_rules('nama', NULL, 'required|trim')
		->set_rules('ttl', NULL, 'required|trim')
		->set_rules('yudisium', NULL, 'required|trim')
		->set_rules('wisuda', NULL, 'required|trim')
		->set_rules('studi', NULL, 'required|trim')
		->set_rules('ipk', NULL, 'required|trim')
		*/->set_rules('alamat', NULL, 'required|trim')
		->set_rules('email', NULL, 'required|trim|valid_email')
		->set_rules('telp', NULL, 'required|trim|numeric')
		->set_rules('ponsel', NULL, 'trim|numeric')
		// Data Orang Tua
		//->set_rules('nama_ot', NULL, 'required|trim')
		->set_rules('alamat_ot', NULL, 'required|trim')
		->set_rules('telp_ot', NULL, 'required|trim|numeric')
		->set_rules('ponsel_ot', NULL, 'trim|numeric');
		
		// Run
		if(!$validate->run()) echo FALSE;
		else
		{
			// Set Data
			$id_user = set_value('id_user');
			$data = array(
				// Data Alumni
				/*'nama' => set_value('nama'),
				'ttl' => set_value('ttl'),
				'tgl_yudisium' => set_value('yudisium'),
				'tgl_wisuda' => set_value('wisuda'),
				'lama_studi' => set_value('studi'),
				'ipk' => set_value('ipk'),
				*/'alamat' => set_value('alamat'),
				'email' => set_value('email'),
				'telepon' => set_value('telp'),
				'ponsel' => set_value('ponsel'),
				// Data Orang Tua
				//'nama_ot' => set_value('nama_ot'),
				'alamat_ot' => set_value('alamat_ot'),
				'telepon_ot' => set_value('telp_ot'),
				'ponsel_ot' => set_value('ponsel_ot')
			);
			
			// Update 
			$this->load->model('model_alumni', 'alumni');
			$this->alumni->update($id_user, $data);
			// echo TRUE
			echo TRUE;
		}
	}
    
    // AJAX Tambah Pekerjaan
    public function AJAX_Tambah_Kerja()
    {
        // Form Validation
		$this->load->library('form_validation');
		$validate = $this->form_validation;
        
        // Set Rules
        $validate
            ->set_rules('id_user', NULL, 'required|trim')
            ->set_rules('tempat_kerja', NULL, 'required|trim')
            ->set_rules('status_kerja', NULL, 'required|trim')
            ->set_rules('alamat_kerja', NULL, 'required|trim')
            ->set_rules('jabatan_kerja', NULL, 'required|trim');
        
        // Run
        if(!$validate->run()) echo FALSE;
        else
        {
            // Get Data
            $data = array(
                'id_user' => set_value('id_user'),
                'tempat' => set_value('tempat_kerja'),
                'alamat' => set_value('alamat_kerja'),
                'status' => set_value('status_kerja'),
                'jabatan' => set_value('jabatan_kerja')
            );
            
            // Load Model
            $this->load->model('model_pekerjaan', 'pekerjaan');
            $this->pekerjaan->insert($data);
            
            // Return Redirect URL
            echo site_url('alumni');
        }
    }
<<<<<<< HEAD
=======
    
    // Form & Proses Update Data Pekerjaan
    public function update_pekerjaan()
    {
        // Get ID Pekerjaan
        $id_pekerjaan = $this->input->post('id_pekerjaan');
        
        // Check ID Pekerjaan
        if(empty($id_pekerjaan)) redirect('alumni');
        
        // Load Model
        $this->load->model('model_pekerjaan', 'pekerjaan');
        
        // Load Table
        $this->load->library('table');
        $this->load->library('form_validation'); 
        
        $validate = $this->form_validation;
        $validate
        // Set Rules
        ->set_rules('id_pekerjaan', NULL, 'trim|required')
        ->set_rules('tempat_kerja', NULL, 'trim|required')
        ->set_rules('status_kerja', NULL, 'trim|required')
        ->set_rules('alamat_kerja', NULL, 'trim|required')
        ->set_rules('jabatan_kerja', NULL, 'trim|required');
        
        // Run
        if($validate->run())
        {
            // DATA
            $data = array(
                'tempat' => set_value('tempat_kerja'),
                'status' => set_value('status_kerja'),
                'alamat' => set_value('alamat_kerja'),
                'jabatan' => set_value('jabatan_kerja')
            );
            // Save Data
            $this->pekerjaan->update($id_pekerjaan, $data);
            // Redirect
            redirect('alumni');
        } else {
            // HTML Data
            $html = array('CONTENT' => $this->load->view('right_contents/content_alumni_update_pekerjaan', array(
                'DATA' => $this->pekerjaan->get_where('id_pekerjaan', $id_pekerjaan)
            ), TRUE));
            
            // View Master Template
    		$this->load->view('view_master', $html);    
        }
        
    }
>>>>>>> master
}