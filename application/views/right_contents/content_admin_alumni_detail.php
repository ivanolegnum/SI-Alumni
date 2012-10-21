<?php
	// Year
	$year = $this->uri->segment(5);
?>
<!-- Detail Alumni -->
<div class="right-box">

    <span class="content-title">Detail Alumni: <?php echo $ALUMNI->nama;?></span>
    
    <div class="content">
    
    <p class="breadcrumb"><?php echo anchor('admincp', '[Beranda]');?> &raquo; <?php echo anchor('admincp/alumni', '[Manajemen Alumni]');?> &raquo; <?php echo anchor('admincp/alumni/' . $year, '[Angkatan ' . $year . ']');?> &raquo; <?php echo anchor('admincp/alumni/'.$year.'/'.$JURUSAN->id_jurusan, '['.$JURUSAN->nama.']');?> &raquo; <strong>Detail: <?php echo $ALUMNI->nama;?></strong></p>
	<hr />
    
    <!-- Informasi Data Alumni -->
    <?php
        $tpl = array('table_open' => '<table border="0" cellpadding="0" cellspacing="0" width="100%">');
        $table = $this->table;
        $table->set_template($tpl);
        
        // Start
        $table->set_heading('Informasi Data Alumni');
        
        echo $table->generate();
    ?>
    
    <!-- Informasi Data Pekerjaan -->
    <?php
        $table->clear();
        // Start
        $table->set_heading('Informasi Data Pekerjaan');
        
        echo $table->generate();
    ?>
    
    <!-- Informasi Data Orang Tua -->
    <?php
        $table->clear();
        // Start
        $table->set_heading('Informasi Data Orang Tua');
        
        echo $table->generate();
    ?>
    
    </div>

</div>