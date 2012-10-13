<!-- Pengguna Alumni Frontpage Content -->

<!-- Headline News -->
<div class="right-box">
	
	<span class="content-title">Headline News</span>
	
	<div class="content">
		<p>Selamat datang di <strong>Sistem Informasi Pengelolaan Data Alumni FASILKOM UNSRI</strong></p>
		
		<h1>Berita Terkini</h1>
		<ul>
			<li><?php echo anchor('berita/detail/', '[Tanggal] Judul Berita');?></li>
		</ul>
	</div>
	
</div>

<!-- Last Agenda and Last Gallery -->
<div class="right-box">
	
	<div class="small-col">

	
		<span class="content-title">Agenda Terakhir</span>
		
		<div class="content">
			<small><em>[Last Update: <?php echo date("d F Y");?>]</em></small>
		
			<ul>
				<li><?php echo anchor('agenda/detail', '#Agenda 1');?></li>
			</ul>
		</div>
	
	</div>
	
	<div class="med-col">
	
		<span class="content-title">Galeri Terakhir</span>
		
		<div class="content">
			<p><small>Iniadalah Colomn Medium</small></p>
			<div style="clear: both;"></div>
			
		</div>
		
	</div>
	
	<div style="clear: both;"></div>
	
</div>