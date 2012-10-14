<!-- Alumni Registration Form -->
<h1>Form Registrasi Data Alumni</h1>
<p>
	Sepertinya ini merupakan kunjungan pertama kamu mengakses "<strong>Sistem Informasi Alumni FASILKOM UNSRI</strong>". Oleh karenanya,
	silahkan melengkapi data-data informasi alumni dibawah ini terlebih dahulu:
</p>
<hr />

<?php
		
// Form Open
echo form_open(NULL, 'class="register-alumni"');
		
$tpl = array('table_open' => '<table border="0" cellpadding="0" cellspacing="0" width="100%">');
$table = $this->table;
$table->set_template($tpl);
		
// Body

// Data Alumni
// --- Data Jurusan
$data_jurusan = array('-' => 'Pilih Jurusan', '--' => '---------------');
foreach($jurusan as $list)
{
	$data_jurusan[$list->id_jurusan] = $list->nama . ' (' . $list->prodi . ')';
}

// Data Form
$table->set_heading(array('colspan' => 2, 'data' => 'Informasi Data Alumni'));
$table->add_row(array('width' => '30%'), array('width' => '70%'));
$table->add_row(form_label('Nomor Induk Mahasiswa'), '<strong>' . $account->username . '</strong>');
$table->add_row(form_label('Jurusan', 'jurusan'), form_dropdown('jurusan', $data_jurusan, set_value('jurusan', '-'), 'id="jurusan"') . br() . form_error('jurusan'));
$table->add_row(form_label('Nama Lengkap', 'nama'), form_input('nama', set_value('nama'), 'id="nama" maxlength="255"') . br() . form_error('nama'));
$table->add_row(form_label('Tempat/Tanggal Lahir', 'ttl'), form_input('ttl', set_value('ttl', 'Tempat, dd/mm/YYYY'), 'id="ttl" maxlength="255"') . br() . form_error('ttl'));
$table->add_row(form_label('Tanggal Yudisium', 'yudisium'), form_input('yudisium', set_value('yudisium', 'YYYY-mm-dd'), 'id="yudisium" maxlength="10"') . br() . form_error('yudisium'));
$table->add_row(form_label('Tanggal Wisuda', 'wisuda'), form_input('wisuda', set_value('wisuda', 'YYYY-mm-dd'), 'id="wisuda" maxlength="10"') . br() . form_error('wisuda'));
$table->add_row(form_label('Lama Studi', 'studi'), form_input('studi', set_value('studi'), 'id="studi" maxlength="20"') . br() . form_error('studi'));
$table->add_row(form_label('Indeks Prestasi Kumulatif', 'ipk'), form_input('ipk', set_value('ipk', '0'), 'id="ipk" maxlength="5"') . br() . form_error('ipk'));
$table->add_row(form_label('Alamat Lengkap', 'alamat'), form_textarea('alamat', set_value('alamat'), 'id="alamat"') . br() . form_error('alamat'));
$table->add_row(form_label('Email', 'email'), form_input('email', set_value('email', 'xxx@yyy.zzz'), 'id="email" maxlength="255"') . br() . form_error('email'));
$table->add_row(form_label('No. Telepon', 'telp'), form_input('telp', set_value('telp', '+62711'), 'id="telp" maxlength="20"') . br() . form_error('telp'));
$table->add_row(form_label('Ponsel/Handphone', 'ponsel'), form_input('ponsel', set_value('ponsel'), 'id="ponsel" maxlength="20"') . br() . form_error('ponsel'));	
// Generate
echo $table->generate();
	
// Data Pekerjaan
$table->clear();
$table->set_heading(array('colspan' => 2, 'data' => 'Informasi Pekerjaan [Opsional]'));
$table->add_row(array('width' => '30%'), array('width' => '70%'));
$table->add_row(form_label('Tempat Bekerja', 'tempat'), form_input('tempat', set_value('tempat'), 'id="tempat" maxlength="255"') . br() . form_error('tempat'));
// -- Status Pekerjaan
$status = array('-' => 'Pilih Status Pekerjaan', '--' => '-----------------------', 'Aktif' => 'Aktif Bekerja', 'Tidak Aktif' => 'Tidak Aktif Bekerja');
$table->add_row(form_label('Status Pekerjaan', 'status'), form_dropdown('status', $status, set_value('status', '-'), 'id="status"') . br() . form_error('status'));
// --------------------------------------------
$table->add_row(form_label('Alamat Tempat Bekerja', 'alamat_kerja'), form_textarea('alamat_kerja', set_value('alamat_kerja'), 'id="alamat_kerja"') . br() . form_error('alamat_kerja'));
$table->add_row(form_label('Jabatan', 'jabatan'), form_input('jabatan', set_value('jabatan'), 'id="jabatan" maxlength="255"') . br() . form_error('jabatan'));
$table->add_row(array('colspan' => 2, 'data' => '<small><strong class="pekerjaan">Catatan: Tinggalkan informasi ini jika kamu belum bekerja.</strong></small>'));

// Generate
echo $table->generate();

// Data Orang Tua Alumni
$table->clear();
$table->set_heading(array('colspan' => 2, 'data' => 'Informasi Data Orang Tua'));
$table->add_row(array('width' => '30%'), array('width' => '70%'));
$table->add_row(form_label('Nama Orang Tua', 'nama_ot'), form_input('nama_ot', set_value('nama_ot'), 'id="nama_ot" maxlength="255"') . br() . form_error('nama_ot'));
$table->add_row(form_label('Alamat Orang Tua', 'alamat_ot'), form_textarea('alamat_ot', set_value('alamat_ot'), 'id="alamat_ot"') . br() . form_error('alamat_ot'));
$table->add_row(form_label('Telepon', 'telp_ot'), form_input('telp_ot', set_value('telp_ot', '+62'), 'id="telp_ot" maxlength="20"') . br() . form_error('telp_ot'));
$table->add_row(form_label('Ponsel', 'ponsel_ot'), form_input('ponsel_ot', set_value('ponsel_ot'), 'id="ponsel_ot" maxlength="20"') . br() . form_error('ponsel_ot'));
// Generate
echo $table->generate();

// HR
echo '<hr />';

// Submit & Reset Button
echo form_submit(NULL, 'Update Informasi Alumni') . form_reset(NULL, 'Reset Form');

// Form Close
echo form_close();
	
?>