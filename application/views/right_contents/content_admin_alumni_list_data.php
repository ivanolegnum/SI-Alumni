<?php
	// Year
	$year = $this->uri->segment(3);
    $id_jurusan = $this->uri->segment(4);
?>
<!-- Admin: List Data Alumni -->

<div class="right-box">

	<span class="content-title">List Data Alumni Jurusan: <?php echo $JURUSAN;?>, Angkatan: <?php echo $year;?></span>
	
	<div class="content">
	
	<p class="breadcrumb"><?php echo anchor('admincp', '[Beranda]');?> &raquo; <?php echo anchor('admincp/alumni', '[Manajemen Alumni]');?> &raquo; <?php echo anchor('admincp/alumni/' . $year, '[Angkatan ' . $year . ']');?> &raquo; <strong><?php echo $JURUSAN;?></strong></p>
	<hr />
	
	<!-- Table List -->
	<?php
		// Table Template
		$tpl = array('table_open' => '<table border="0" id="list-alumni" cellpadding="0" cellspacing="0">');
	
		$table = $this->table;
		$table->set_template($tpl);
		// Header
		$table->set_heading('NIM', 'Nama Lengkap', 'Opsi Admin');
		// Body
		
		// Check data
		if(empty($LIST_ALUMNI)) $table->add_row(array('colspan' => 3, 'data' => 'Belum ada data alumni.'));
		else
		{
			foreach($LIST_ALUMNI as $list)
            {
                // Show All Data
                $table->add_row(anchor('admincp/alumni/detail/'.$list->id_alumni.'/'.$year.'/'.$id_jurusan, $list->nim), $list->nama, anchor('admincp/alumni/update/'.$list->id_alumni, '[Edit]'));
            }
		}
		
		// Generate
		echo $table->generate();
	?>
	
	</div>

</div>