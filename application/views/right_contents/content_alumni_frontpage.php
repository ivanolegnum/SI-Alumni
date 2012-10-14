<?php
	
	// Store Account Data
	$account = $this->user->get_where(array('id_user' => $this->session->userdata('USER_ID')));
	
	// Jurusan
	if(!empty($ALUMNI))
	{
		$JURUSAN = $this->jurusan->get_where(array('id_jurusan' => $ALUMNI->id_jurusan));
	}
	
?>
<!-- Administration Page -->

<!-- Statistics -->
<div class="right-box">

	<span class="content-title">Manajemen Alumni</span>
	
	<div class="content">
	
		<p>Selamat datang, <strong><?php echo $account->username;?></strong> dihalaman Manajemen Alumni!</p>
		<p>Pada halaman ini, kamu dapat mengubah informasi mengenai data alumni kamu.</p>
		<hr />
		
		<?php 
			
			// Check the status
			if(empty($ALUMNI)) $this->load->view('right_contents/content_form_alumni_register', array('jurusan' => $LIST_JURUSAN, 'account' => $account));
			else
			{
		?>
		
		<div id="ajax-loading"><?php echo img('assets/styles/images/loading.gif');?> Silahkan tunggu...</div>
		<div id="form-update-alumni">
		<!-- Table Start -->
		<?php
		$tpl = array('table_open' => '<table border="0" width="100%" cellpadding="0" cellspacing="0">');
		$table = $this->table;
		$table->set_template($tpl);
		
		// Form Open
		echo form_open('alumni/e/update_alumni', 'id="update-alumni" ');
		
		$table->set_heading(array('width' => '40%', 'data' => 'Informasi Data Alumni'), array('align' => 'right', 'width' => '60%', 'data' => '<a href="javascript: void(0);" id="uia-click">[Update Informasi Alumni]</a>'));
		// Informasi Data Alumni
		$table->add_row(array('width' => '50%', 'data' => 'Nomor Induk Mahasiswa (NIM)'), array('width' => '50%', 'data' => '<strong>'.$ALUMNI->nim.'</strong>'));
		$table->add_row(form_label('Nama Lengkap', 'alumni_nama'), '<span id="alumni_nama">'.$ALUMNI->nama.'</span>');
		$table->add_row(form_label('Jurusan', 'nama'), '<strong>'.$JURUSAN->nama.'</strong>');
		$table->add_row(form_label('Tempat/Tanggal Lahir', 'alumni_ttl'), '<span id="alumni_ttl">'.$ALUMNI->ttl.'</span>');
		$table->add_row(form_label('Tanggal Yudisium', 'alumni_yudisium'), '<span id="alumni_yudisium">'.$ALUMNI->tgl_yudisium.'</span>');
		$table->add_row(form_label('Tanggal Wisuda', 'alumni_wisuda'), '<span id="alumni_wisuda">'.$ALUMNI->tgl_wisuda.'</span>');
		$table->add_row(form_label('Lama Studi', 'alumni_studi'), '<span id="alumni_studi">'.$ALUMNI->lama_studi.'</span>');
		$table->add_row(form_label('Indeks Prestasi Kumulatif', 'alumni_ipk'), '<span id="alumni_ipk">'.$ALUMNI->ipk.'</span>');
		$table->add_row(form_label('Alamat Lengkap', 'alumni_alamat'), '<span id="alumni_alamat">'.$ALUMNI->alamat.'</span>');
		$table->add_row(form_label('E-Mail', 'alumni_email'), '<span id="alumni_email">'.$ALUMNI->email.'</span>');
		$table->add_row(form_label('Telepon', 'alumni_telp'), '<span id="alumni_telp">'.$ALUMNI->telepon.'</span>');
		$ponsel = $ALUMNI->ponsel && $ALUMNI->ponsel != '+62' ? $ALUMNI->ponsel : '+62';
		$table->add_row(form_label('Ponsel', 'alumni_ponsel'), '<span id="alumni_ponsel">'.$ponsel.'</span>');
		echo $table->generate();
		// Informasi Data Orang Tua
		$table->clear();
		$table->set_heading(array('data' => 'Informasi Data Orang Tua', 'width' => '40%'), array('width' => '60%', 'data' => '&nbsp;'));
		$table->add_row(array('width' => '50%', 'data' => form_label('Nama Orang Tua', 'alumni_nama_ot')), array('width' => '50%', 'data' => '<span id="alumni_nama_ot">'.$ALUMNI->nama_ot.'</span>'));
		$table->add_row(form_label('Alamat Orang Tua', 'alumni_alamat_ot'), '<span id="alumni_alamat_ot">'.$ALUMNI->alamat_ot.'</span>');
		$table->add_row(form_label('Telepon', 'alumni_telp_ot'), '<span id="alumni_telp_ot">'.$ALUMNI->telepon_ot.'</span>');
		$ponsel = $ALUMNI->ponsel_ot && $ALUMNI->ponsel_ot != '+62' ? $ALUMNI->ponsel_ot : '+62';
		$table->add_row(form_label('Ponsel', 'alumni_ponsel_ot'), '<span id="alumni_ponsel_ot">'.$ponsel.'</span>');
		$table->add_row(array('colspan' => '2', 'align' => 'center', 'data' => form_submit(NULL, 'Update Data Alumni', 'id="btn-update-alumni" class="submit"').form_button(NULL, 'Batal', 'id="btn-update-alumni-batal"')));
		echo $table->generate();
		
		
		// Hidden Form
		echo form_hidden('id_user', $this->session->userdata('USER_ID'));
		
		// Form Close
		echo form_close();
        
		// Informasi Pekerjaan
		$table->clear();
		$table->set_heading(array('width' => '40%', 'data' => 'Informasi Data Pekerjaan'), array('align' => 'right', 'width' => '60%', 'data' => '&nbsp;'));
        
        // Script for empty jobs
        if(empty($LIST_PEKERJAAN))
        {
            $table->add_row(array('id' => 'update-pekerjaan', 'colspan' => 2, 'align' => 'center', 'data' => 'Belum mempunyai pekerjaan.'))
        ?>
        <script type="text/javascript">
            $(function() {
               $('#btn-tambah-pekerjaan').show(); 
            });
        </script>
        <?php
        } else {
            foreach($LIST_PEKERJAAN as $list)
            {
                // Form Open
                $table->add_row(array('colspan' => 2, 'data' => form_open('alumni/update/pekerjaan', NULL, array('id_pekerjaan' => $list->id_pekerjaan))));
        		$table->add_row(array('width' => '50%', 'data' => form_label('Tempat Bekerja', 'tempat_kerja')), array('width' => '50%', 'data' => '<span>'.$list->tempat.'</span>'));
        		$table->add_row(form_label('Status Pekerjaan', 'status_kerja'), '<span>'.$list->status.' Bekerja</span>');
        		$table->add_row(form_label('Alamat Tempat Bekerja', 'alamat_kerja'), '<span>' . $list->alamat . '</span>');
        		$table->add_row(form_label('Jabatan Bekerja', 'jabatan_kerja'), '<span>'.$list->jabatan.'</span>');
        		$table->add_row(array('colspan' => 2, 'data' => '<hr />'));
                $table->add_row(array('colspan' => 2, 'data' => form_submit(NULL, 'Update Informasi Pekerjaan')));
                $table->add_row(array('colspan' => 2, 'data' => '<hr />'));
                // Form Close
                $table->add_row(array('colspan' => 2, 'data' => form_close()));
            }   
        }
        
        // Buttons
		$table->add_row(array('align' => 'right', 'data' => form_button(NULL, '[+] Tambah Pekerjaan', 'id="btn-tambah-pekerjaan"')));
		echo $table->generate();
		
        // Form Open For Tambah Pekerjaan
        echo '<div id="form-tambah-pekerjaan">';
        echo form_open('alumni/e/tambah_kerja', 'id="tambah-pekerjaan" ');
        $table->clear();
        $table->set_heading(array('data' => 'Form Tambah Pekerjaan', 'colspan' => 2));
        $table->add_row(array('width' => '50%', 'data' => form_label('Tempat Bekerja', 'in_tempat_kerja')), array('width' => '50%', 'data' => form_input('in_tempat_kerja', NULL, 'id="in_tempat_kerja"')));
        $status = array('' => 'Pilih Status Pekerjaan', 'Aktif' => 'Aktif Bekerja', 'Tidak Aktif' => 'Tidak Aktif Bekerja');
        $table->add_row(form_label('Status Pekerjaan', 'in_status_kerja'), form_dropdown('in_status_kerja', $status, '', 'id="in_status_kerja"'));
        $table->add_row(form_label('Alamat Tempat Bekerja', 'in_alamat_kerja'), form_textarea('in_alamat_kerja', NULL, 'id="in_alamat_kerja"'));
        $table->add_row(form_label('Jabatan Bekerja', 'in_jabatan_kerja'), form_input('in_jabatan_kerja', NULL, 'id="in_jabatan_kerja"'));
        $table->add_row(array('data' => form_submit(NULL, 'Tambah Data Pekerjaan'), 'colspan' => 2, 'align' => 'center'));
        echo $table->generate();
        echo form_hidden('id_user', $this->session->userdata('USER_ID'));
        echo form_close();
        echo '</div>';
        
		?>
		<!-- Table End -->
		</div>
		
		<?php }	?>
	
	</div>

</div>