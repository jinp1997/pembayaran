$(document).ready(function() {
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });    
});

function show() {    
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $('#modal_form').modal('show');
    $('.modal-title').text('Tambah Komentar');
}

function add(id_laporan) {
    $('#btnSave').text('mengirim...');
    $('#btnSave').attr('disabled', true);
    
    var formData = new FormData($('#form')[0]);
    $.ajax({        
        url : url_add + id_laporan,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            if(data.status) {                
                location.reload();
                success("Komentar Berhasil Dikirim");
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

function success(text) {    
    $('.notifikasi').fadeIn().delay(3000).fadeOut('slow').html('<div class="alert alert-success role="alert"">' + text + '</div>');
}

function error(text) {
    $('.notifikasi').fadeIn().delay(3000).fadeOut('slow').html('<div class="alert alert-danger role="alert"">' + text + '</div>');
}

function warning(text) {
    $('.notifikasi').fadeIn().delay(3000).fadeOut('slow').html('<div class="alert alert-warning role="alert"">' + text + '</div>');
}