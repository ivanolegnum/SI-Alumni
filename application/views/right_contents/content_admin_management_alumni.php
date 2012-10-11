<!-- Management Alumni -->

<!-- Main Page -->
<div class="right-box">

	<span class="content-title">Manajemen Alumni</span>
	
	<div class="content">
		<p class="breadcrumb"><?php echo anchor('admincp', '[Beranda]');?> &raquo; <strong>Manajemen Alumni</strong></p>
		<hr />
		
		<p>Silahkan pilih angkatan terlebih dahulu:</p>

		<ul>
			<?php
				$old = 2003;
				$new = date("Y") - 4;
				
				for($old; $old <= $new; $old++)
				{
				?><li><?php echo anchor('admincp/alumni/'.$old, 'Angkatan '.$old);?></li><?php
				}
			?>
		</ul>
	</div>

</div>