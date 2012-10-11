<?php
	// Store Year
	$year = $this->uri->segment(3);
?>
<!-- Alumni: List Jurusan -->

<div class="right-box">

	<span class="content-title">List Jurusan Alumni Angkatan: <?php echo $year;?></span>

	<div class="content">
	
		<p class="breadcrumb"><?php echo anchor('admincp', '[Beranda]');?> &raquo; <?php echo anchor('admincp/alumni', '[Manajemen Alumni]');?> &raquo; <strong>Angkatan <?php echo $year;?></strong></p>
		<hr />
		
		<p>Silahkan pilih Jurusan:</p>
		
		<ul>
			<?php
				// Check Data
				if(!empty($LIST_JURUSAN))
				{
					foreach($LIST_JURUSAN as $row)
					{
			?><li><?php echo anchor('admincp/alumni/'.$year.'/'.$row->id, $row->nama);?></li><?php
					}
				} else echo '<li>Belum ada data jurusan.</li>';
			?>
		</ul>
	
	</div>

</div>