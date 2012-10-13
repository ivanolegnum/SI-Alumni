<?php
	/*
		| Login Widgets Version: 0.1 |
		| Author: Nurimansyah Rifwan |
		| Filename: widget_login.php |
	*/
	
	// Check AUTH Session
	if(!$this->session->userdata('AUTH'))
	{
		$TITLE = 'Log Me In';
		// Content
		$CONTENT = form_open(base_url());
			$CONTENT .= form_label('NIM', 'userid').form_input('userid', set_value('userid'), 'maxlength="32" id="userid"');
			$CONTENT .= '<div style="clear: both;">'.form_error('userid').'</div>';
			$CONTENT .= form_label('Password', 'password').form_password('password', set_value('password'), 'maxlength="32" id="password"');
			$CONTENT .= '<div style="clear: both;">'.form_error('password').'</div>';
			$CONTENT .= form_submit(NULL, 'Log Me In');
			$CONTENT .= '<div style="clear: both;"></div>';
		$CONTENT .= form_close();
	} else {
		// Get LEVEL and USER_ID
		$LEVEL = $this->session->userdata('LEVEL');
		$USER_ID = $this->session->userdata('USER_ID');
		
		
		
		// Get User data
		$USER_DATA = $this->user->get_where(array('id' => $USER_ID, 'level' => $LEVEL));
		
        $TITLE = 'Panel Anggota';
        
		// Content
		$CONTENT = '<span class="intro">Selamat datang,<br /><strong>'.$USER_DATA->username.'</strong></span>';
		$CONTENT .= '<ul>';
			$CONTENT .= '<li>'.anchor('profile', 'Profil Saya').'</li>';
			
			// Switch Level
			switch($LEVEL)
			{
				// Level Alumni
				case 'alumni':
					$CONTENT .= '<li>'.anchor('alumni', 'Management Alumni').'</li>';
				break;
				
				// Level Admin
				case 'admin':
					$CONTENT .= '<li>'.anchor('admincp', 'Halaman Administrator').'</li>';
				break;

                // Level Pengguna Alumni
				case 'pengguna':
					$CONTENT .= '<li>'.anchor('pa', 'Halaman Pengguna Alumni').'</li>';
				break;                
                
			}
			
			$CONTENT .= '<li>'.anchor('logmeout', 'Log Me Out').'</li>';
		$CONTENT .= '</ul>';
	}
?>

<!-- Login Widgets -->
<div id="widget-login" class="left-box">
	
	<span class="widget-title"><?php echo $TITLE;?></span>
	
	<div class="widget-content">
		<?php echo $CONTENT;?>
	</div>
	
</div>