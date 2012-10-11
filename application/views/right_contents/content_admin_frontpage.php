<?php
	
	// Store Account Data
	$account = $this->user->get_where(array('id' => $this->session->userdata('USER_ID')));
	
?>
<!-- Administration Page -->

<!-- Statistics -->
<div class="right-box">

	<span class="content-title">Statistik Sistem Informasi Alumni FASILKOM UNSRI</span>
	
	<div class="content">
	
		<p>Selamat datang, <strong><?php echo $account->userid;?></strong> dihalaman Administrator!</p>
		<p>Pada halaman ini, Anda dapat melihat laporan informasi alumni dan pengguna alumni.<br />
		Anda juga dapat mengubah(edit) ataupun menghapus data alumni maupun pengguna alumni pada halaman ini.</p>
		<h1>Administration Menu</h1>
		<ul>
			<li><?php echo anchor('admincp/alumni', 'Manajemen Alumni');?></li>
			<li><?php echo anchor('admincp/pengguna', 'Manajemen Pengguna Alumni');?></li>
		</ul>
	
	</div>

</div>