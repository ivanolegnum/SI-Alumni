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
		// Informasi Orang Tua
		
		// Disabled
		$(this).replaceWith('<strong>[Update Informasi Alumni]</strong>');
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
			$('#' + fieldname).html('<input type="text" name="'+ fieldname +'" value="'+ field_value +'" id="'+ fieldname +'" />');
		break;
		
		case 'textarea':
			alert('textarea');
		break;
	}
	
}