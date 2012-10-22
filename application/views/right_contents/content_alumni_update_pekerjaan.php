<!-- Update Data Pekerjaan Alumni -->

<div class="right-box">

    <span class="content-title">Update Data Pekerjaan: <?php echo $DATA->tempat;?></span>
    
    <div class="content">
        <p class="breadcrumb"><?php echo anchor('alumni', '[Kembali]');?> &raquo; <strong>Update Data Pekerjaan</strong></p>
        <hr />
        
        <?php
            $table = $this->table;
            $tpl = array('table_open' => '<table border="0" width="100%" cellpadding="0" cellspacing="0">');
            $table->set_template($tpl);
            
            // Form Open
            echo form_open(NULL, 'id="update-form-pekerjaan"', array('id_pekerjaan' => $DATA->id_pekerjaan));
            
            // Table
            $table->add_row(form_label('Tempat Bekerja', 'tempat_kerja'), form_input('tempat_kerja', $DATA->tempat, 'id="tempat_kerja"'));
            $status = array('' => 'Pilih Status Pekerjaan', 'Aktif' => 'Aktif Bekerja', 'Tidak Aktif' => 'Tidak Aktif Bekerja');
            $table->add_row(form_label('Status Pekerjaan', 'status_kerja'), form_dropdown('status_kerja', $status, $DATA->status, 'id="status_kerja"'));
            $table->add_row(form_label('Alamat Tempat Bekerja', 'alamat_kerja'), form_input('alamat_kerja', $DATA->alamat, 'id="alamat_kerja"'));
            $table->add_row(form_label('Jabatan Pekerjaan', 'jabatan_kerja'), form_input('jabatan_kerja', $DATA->jabatan, 'id="jabatan_kerja"'));
            $table->add_row(array('colspan' => 2, 'data' => form_submit(NULL, 'Update Data Pekerjaan')));            
            
            echo $table->generate();
            
            // Form Close
            echo form_close();
        ?>
        
    </div>

</div>