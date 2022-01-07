function add() {
    $('#btnSave').text('menyimpan...');
    $('#btnSave').attr('disabled', true);
    
    var formData = new FormData($('#form')[0]);
    $.ajax({        
        url : url_add,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            if(data.status) {                
                $('#modal_form').modal('hide');                
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                }
            }
            $('#btnSave').text('Simpan');
            $('#btnSave').attr('disabled',false);            
        },
        error: function (jqXHR, textStatus, errorThrown) {
            error('Data gagal disimpan');
            $('#btnSave').text('Simpan');
            $('#btnSave').attr('disabled',false);            
        }
    });
}

function edit() {
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();

    $.ajax({
        url : url_edit,
        type: "GET",
        dataType: "JSON",
        success: function(data) {            
            $('[name="nama_pelapor"]').val(data.nama_pelapor);
            $('[name="email"]').val(data.email);
            $('[name="username"]').val(data.username);
            $('[name="alamat"]').val(data.alamat);
            $('[name="jenis_kelamin"]').val(data.jenis_kelamin);
            $('[name="no_ktp"]').val(data.no_ktp);
            $('[name="no_telp"]').val(data.no_telp);            

            $('#modal_form').modal('show');
            $('.modal-title').text('Edit Akun Saya');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            error('Gagal mengambil data');
        }
    });    
}

function success(text) {    
    $('.notifikasi').fadeIn().delay(3000).fadeOut('slow').html('<div class="alert alert-success role="alert"">' + text + '</div>');
}

function error(text) {
    $('.notifikasi').fadeIn().delay(3000).fadeOut('slow').html('<div class="alert alert-danger role="alert"">' + text + '</div>');
}

function warning(text) {
    $('.notifikasi').fadeIn().delay(3000).fadeOut('slow').html('<div class="alert alert-warning role="alert"">' + text + '</div>');
}