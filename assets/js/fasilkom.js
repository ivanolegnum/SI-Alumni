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
		
		// Disabled
		$(this).hide();
		
		// Show Tombol Update Data Alumni
		$('#btn-update-alumni').show();
	});
	
	// Tombol Update Data Alumni
	$('#btn-update-alumni').hide().click(function()
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
		
		// Enabled Update Informasi
		$('#uia-click').show();
		
		$(this).hide();
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
			$('#' + fieldname).replaceWith('<input type="text" name="'+ fieldname +'" value="'+ field_value +'" id="'+ fieldname +'" />');
		break;
		
		case 'textarea':
			$('#' + fieldname).replaceWith('<textarea name="'+ fieldname +'" id="'+ fieldname +'">'+ field_value +'</textarea>');
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