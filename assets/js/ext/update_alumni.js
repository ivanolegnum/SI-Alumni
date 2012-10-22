/* FASILKOM UNSRI */
// File Name: update_alumni.js //
// =================================================================================== //

// BEGIN
$(function() {
   
   // Update Pekerjaan
   // =================================================================================
   
   // Hiding Form Tambah Pekerjaan
   $('#form-tambah-pekerjaan').hide();
   
   // Button Tambah Pekerjaan Clicked
   $('#btn-tambah-pekerjaan').click(function() {
        $('#form-tambah-pekerjaan').fadeIn();
        window.location.href = "#form-tambah-pekerjaan";
   });
   
   // Tambah Pekerjaan Validation
   $('#tambah-pekerjaan').validate({
        // Rules
        rules: {
            in_tempat_kerja: { required: true },
            in_status_kerja: { required: true },
            in_alamat_kerja: { required: true },
            in_jabatan_kerja: { required: true }
        },
        
        // Message
        messages: {
            in_tempat_kerja: "* Tempat kerja harus diisi!",
            in_status_kerja: "* Status kerja harus diisi!",
            in_alamat_kerja: "* Alamat kerja harus diisi!",
            in_jabatan_kerja: "* Jabatan kerja harus diisi!"
        },
        
        // Handler
        submitHandler: function(form) {
            $.ajax({
               type: "POST",
               url: form.action,
               data: {
                    id_user: form.id_user.value,
                    tempat_kerja: form.in_tempat_kerja.value,
                    status_kerja: form.in_status_kerja.value,
                    alamat_kerja: form.in_alamat_kerja.value,
                    jabatan_kerja: form.in_jabatan_kerja.value
               } 
            }).done(function(data) {
                if(data)
                {
                    // Redirect
                    window.location.href = data;
                } else {
                    // Check if error
					alert('PERINGATAN::\nTambah pekerjaan gagal.\nAda kesalahan saat melakukan penambahan data pekerjaan.\nSilahkan cek data Anda kembali.');
                }
            });
        }
   });

    // Tambah Pekerjaan Validation
   $('#update-form-pekerjaan').validate({
        // Rules
        rules: {
            tempat_kerja: { required: true },
            status_kerja: { required: true },
            alamat_kerja: { required: true },
            jabatan_kerja: { required: true }
        },
        
        // Message
        messages: {
            tempat_kerja: "* Tempat kerja harus diisi!",
            status_kerja: "* Status kerja harus diisi!",
            alamat_kerja: "* Alamat kerja harus diisi!",
            jabatan_kerja: "* Jabatan kerja harus diisi!"
        }
   });   
});