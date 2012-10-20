<?php
	/*
		| Menu Widgets Version: 0.1  |
		| Author: Nurimansyah Rifwan |
		| Filename: widget_menu.php  |
	*/
    if (!$this->session->userdata('AUTH'))
    {
        $TITLE = 'Menu';
    
        $CONTENT = "Isi Menu Belum Login";    
    }
    else
    {
        if ($this->session->userdata('LEVEL') == 'alumni')
        {
            $TITLE = 'Menu';
    
            $CONTENT = "Isi Menu Alumni Setelah Login";
        }
        else
        if ($this->session->userdata('LEVEL') == 'pengguna')
        {
            $TITLE = 'Menu';
    
            $CONTENT = "Isi Menu Mitra Alumni Setelah Login";
            $CONTENT = '<a>'. anchor('loker', 'Masukkan Lowongan Kerja')  .'</a>';
        }
        else if ($this->session->userdata('LEVEL') == 'admin')
        {
            $TITLE = 'Menu';
    
            $CONTENT = "Isi Menu ADMIN Setelah Login";
        }
    }
    
?>

<!-- Menu Widgets -->
<div id="widget-menu" class="left-box">
	
	<span class="widget-title"><?php echo $TITLE; ?></span>
	
	<div class="widget-content">
		<?php echo $CONTENT;?>
	</div>
	
</div>