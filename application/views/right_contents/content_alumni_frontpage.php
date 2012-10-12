<?php 
	
	// Store Account Data
	$account = $this->user->get_where(array('id' => $this->session->userdata('USER_ID')));
	
	// Jurusan
	if(!empty($ALUMNI))
	{
		$JURUSAN = $this->jurusan->get_where(array('id' => $ALUMNI->id_jurusan));
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
		echo form_open('alumni/e/update', 'id="update-alumni" class="register-alumni"');
		
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
		$table->add_row(array('colspan' => '2', 'align' => 'center', 'data' => form_submit(NULL, 'Update Data Alumni', 'id="btn-update-alumni" class="submit"')));
		echo $table->generate();
		
		// Informasi Pekerjaan
		$table->clear();
		$table->set_heading(array('width' => '40%', 'data' => 'Informasi Data Pekerjaan'), array('align' => 'right', 'width' => '60%', 'data' => '<a href="javascript: void(0);" id="udp-click">[Update Data Pekerjaan]</a>'));
		echo $table->generate();
		
		// Hidden Form
		echo form_hidden('id_user', $this->session->userdata('USER_ID'));
		
		// Form Close
		echo form_close();
		
		?>
		<!-- Table End -->
		</div>
		
		<?php }	?>
	
	</div>

</div>