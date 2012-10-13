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
        $TITLE = 'Menu';
    
        $CONTENT = "Isi Menu Setelah Login";
    }
    
?>

<!-- Menu Widgets -->
<div id="widget-menu" class="left-box">
	
	<span class="widget-title"><?php echo $TITLE; ?></span>
	
	<div class="widget-content">
		<?php echo $CONTENT;?>
	</div>
	
</div>