<!DOCTYPE html>
<html>
<head>

	<title>Sistem Informasi Alumni FASILKOM UNSRI</title>
	
	<!-- Meta Tag -->
	<meta name="generator" content="Notepad++ 6.1.8" />
	<meta name="author" content="Fasilkom, UNSRI" />
	<meta name="description" content="Sistem Informasi Alumni FASILKOM UNSRI" />
	<meta name="keywords" content="sistem, informasi, alumni, fasilkom, unsri" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	
	<!-- Style -->
	<style type="text/css" media="all">
		/* Master CSS */
		@import url('<?php echo base_url('assets/styles/master.css');?>');
	</style>
	
	<!-- Script -->
	<script type="text/css" src="<?php echo base_url('assets/js/jquery-1.8.2.min.js');?>"></script>
	<script type="text/css" src="<?php echo base_url('assets/js/fasilkom.js');?>"></script>
	
</head>

<body>

	<!-- Container -->
	<div class="container">
		
		<!-- Top -->
		<div class="top">
		
			<!-- Header -->
			<div class="header">
			Sistem Informasi Alumni Fakultas Ilmu Komputer Universitas Sriwijaya
			</div>
			
			<!-- Logo -->
			<div class="logo">
				<?php echo anchor(base_url(), img('assets/styles/images/logo.jpg'));?>
			</div>
		
		</div>
		
		<!-- Content -->
		<div class="content">
			
			<!-- Main Menu -->
			<div class="main-menu">
				<ul>
					<li><?php echo anchor(base_url(), 'Home');?></li>
					<li><?php echo anchor('agenda', 'Agenda');?></li>
					<li><?php echo anchor('galeri', 'Galeri');?></li>
					<li><?php echo anchor('berita', 'Berita');?></li>
					<li><?php echo anchor('bantuan', 'Bantuan');?></li>
				</ul>
			</div>
			
			<!-- Konten Kiri -->
			<div class="left-content">
				<?php
					// Load Left Content View
					$this->load->view('view_left_content');
				?>
			</div>
			
			<!-- Konten Kanan -->
			<div class="right-content">
				<?php
					// Load Right Content
					echo $CONTENT;
				?>
			</div>
			
			<div style="clear: both;"></div>
			
		</div>
		
		<!-- Bottom -->
		<div class="bottom">
			Copyright &copy; Fakultas Ilmu Komputer Universitas Sriwijaya. 2012. Allright Reserved. Version A.0.5.
		</div>
		
	</div>

</body>
</html>