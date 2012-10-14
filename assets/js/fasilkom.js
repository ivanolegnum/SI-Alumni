/* FASILKOM UNSRI */
// File Name: fasilkom.js //
// =================================================================================== //

// Main Function
$(function()
{
    
	// Update Informasi Alumni Clicked
	$('#uia-click').click(function()
	{
		// Informasi Alumni
		EditField('alumni_nama', 'text');
		EditField('alumni_ttl', 'text');
		EditField('alumni_yudisium', 'text');
		EditField('alumni_wisuda', 'text');
		EditField('alumni_studi', 'text');
		EditField('alumni_ipk', 'text');
		EditField('alumni_alamat', 'textarea');
		EditField('alumni_email', 'text');
		EditField('alumni_telp', 'text');
		EditField('alumni_ponsel', 'text');
		// Informasi Orang Tua
		EditField('alumni_nama_ot', 'text');
		EditField('alumni_alamat_ot', 'textarea');
		EditField('alumni_telp_ot', 'text');
		EditField('alumni_ponsel_ot', 'text');
		
		// Disabled
		$(this).hide();
		
		// Show Tombol Update Data Alumni
		$('#btn-update-alumni').show();
		$('#btn-update-alumni-batal').show();
	});
	
	// Form Validation Update Alumni
	$('#update-alumni').validate({
		// Alumni Telp
		rules: {
			alumni_ipk: {
				number: true	
			},
			alumni_email: {
				email: true
			},
			alumni_ponsel: {
				required: false
			},
			alumni_ponsel_ot: {
				required: false
			}
		},
		messages: {
			// Data Alumni
			alumni_nama: "* Nama lengkap tidak boleh kosong.",
			alumni_ttl: "* Tempat/Tanggal Lahir tidak boleh kosong.",
			alumni_yudisium: "* Tanggal Yudisium tidak boleh kosong.",
			alumni_wisuda: "* Tanggal Wisuda tidak boleh kosong.",
			alumni_studi: "* Lama Studi tidak boleh kosong.",
			alumni_ipk: {
				required: "* Indeks Prestasi Kumulatif tidak boleh kosong.",
				number: "* Indeks Prestasi Kumulatif harus berupa angka."
			},
			alumni_alamat: "* Alamat lengkap tidak boleh kosong.",
			alumni_email: {
				required: "* E-Mail tidak boleh kosong.",
				email: "* E-Mail harus valid."
			},
			alumni_telp: "* Telepon tidak boleh kosong.",
			// Data Orang Tua
			alumni_nama_ot: "* Nama Orang Tua tidak boleh kosong.",
			alumni_alamat_ot: "* Alamat tidak boleh kosong.",
			alumni_telp_ot: "* Telepon tidak boleh kosong"
		},
		submitHandler: function(form) {
	    
			$.ajax({
				type: "POST",
				url: form.action,
				data: {
					// Data Alumni
					id_user: form.id_user.value,
					nama: form.alumni_nama.value,
					ttl: form.alumni_ttl.value,
					yudisium: form.alumni_yudisium.value,
					wisuda: form.alumni_wisuda.value,
					studi: form.alumni_studi.value,
					ipk: form.alumni_ipk.value,
					alamat: form.alumni_alamat.value,
					email: form.alumni_email.value,
					telp: form.alumni_telp.value,
					ponsel: form.alumni_ponsel.value,
					
					// Data Orang Tua
					nama_ot: form.alumni_nama_ot.value,
					alamat_ot: form.alumni_alamat_ot.value,
					telp_ot: form.alumni_telp_ot.value,
					ponsel_ot: form.alumni_ponsel_ot.value
				}
			}).done(function(data) {
				// Check if not error
				if(data)
				{
					SaveField('alumni_nama');
					SaveField('alumni_ttl');
					SaveField('alumni_yudisium');
					SaveField('alumni_wisuda');
					SaveField('alumni_studi');
					SaveField('alumni_ipk');
					SaveField('alumni_alamat');
					SaveField('alumni_email');
					SaveField('alumni_telp');
					SaveField('alumni_ponsel');
					// Orang Tua
					SaveField('alumni_nama_ot');
					SaveField('alumni_alamat_ot');
					SaveField('alumni_telp_ot');
					SaveField('alumni_ponsel_ot');
					
					// Enabled Update Informasi
					$('#uia-click').show();
					
					$('#btn-update-alumni').hide();
					$('#btn-update-alumni-batal').hide();
					
					// Alert
					//alert('INFORMASI::\nSelamat, data kamu berhasil diubah!\nSilahkan klik "OK".');
				} else {
				// Check if error
					alert('PERINGATAN::\nUpdate data alumni gagal.\nAda kesalahan saat melakukan update data alumni.\nSilahkan cek data Anda kembali.');
				}
			});
	   }
	});
	
	// Hide Button Update Alumni
	$('#btn-update-alumni').hide();
	$('#btn-update-alumni-batal').hide();
	
	// Ajax Loading
	$('#ajax-loading').ajaxStart(function() {
		$('#form-update-alumni').hide();
		$(this).fadeIn();
	}).ajaxStop(function() {
		$(this).hide();
		$('#form-update-alumni').fadeIn();
	});
	
	// Button Batal Clicked
	$('#btn-update-alumni-batal').click(function() {
		window.location.reload();
	});
    
});

// Fungsi untuk mengedit field
// -----------------------------------------------------------------------------------
function EditField(fieldname, type)
{
	// Get Value
	var field_value = $('#'+fieldname).text();
	switch(type)
	{
		case 'text':
			$('#' + fieldname).replaceWith('<input type="text" name="'+ fieldname +'" value="'+ field_value +'" id="'+ fieldname +'" class="required" />');
		break;
		
		case 'textarea':
			$('#' + fieldname).replaceWith('<textarea name="'+ fieldname +'" id="'+ fieldname +'" class="required">'+ field_value +'</textarea>');
		break;
	}
	
	// Effects
	$('#'+fieldname).hide().fadeIn();
	
}

// Fungsi Save Field
function SaveField(fieldname)
{
	var field_val = $('#'+fieldname).val();
	// Change Field to span
	$('#'+fieldname).replaceWith('<span id="'+fieldname+'">'+field_val+'</span>');
	
	// Effects
	$('#'+fieldname).hide().fadeIn();
}

// Fungsi Add URL JS
function AddURL(file, base_url)
{
    document.write('<script type="text/javascript" src="'+ base_url + '/ext/' + file +'.js"></script>');    
}