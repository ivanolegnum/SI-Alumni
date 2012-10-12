<?php 
	
	// Store Account Data
	$account = $this->user->get_where(array('id' => $this->session->userdata('USER_ID')));
	
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
		<h1>Informasi Data Alumni</h1>
		
		<!-- Table Start -->
		<?php
		$tpl = array('table_open' => '<table border="0" width="100%" cellpadding="0" cellspacing="0">');
		$table = $this->table;
		$table->set_template($tpl);
		
		// Form Open
		echo form_open(NULL, 'id="register-alumni"');
		
		$table->set_heading(array('width' => '40%'), array('align' => 'right', 'width' => '60%', 'data' => '<a href="javascript: void(0);" id="uia-click">[Update Informasi Alumni]</a>'));
		// Informasi Data Alumni
		$table->add_row('Nomor Induk Mahasiswa (NIM)', '<strong>$NIM</strong>');
		$table->add_row(form_label('Nama Lengkap', 'nama'), '<span id="alumni_nama">$NAMA</span>');
		$table->add_row(form_label('Jurusan', 'nama'), '<strong>$JURUSAN</strong>');
		$table->add_row(form_label('Tempat/Tanggal Lahir', 'ttl'), '<span id="alumni_ttl">$TEMPAT TANGGAL LAHIR</span>');
		$table->add_row(form_label('Tanggal Yudisium', 'yudisium'), '<span id="alumni_yudisium">$YUDISIUM</span>');
		$table->add_row(form_label('Tanggal Wisuda', 'wisuda'), '<span id="alumni_wisuda">$WISUDA</span>');
		$table->add_row(form_label('Lama Studi', 'studi'), '<span id="alumni_studi">$STUDI</span>');
		
		echo $table->generate();
		
		// Form Close
		echo form_close();
		
		?>
		<!-- Table End -->
		
		<?php }	?>
	
	</div>

</div>