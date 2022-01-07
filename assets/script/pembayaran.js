var save_method;
var table;

function reload_table() {
    table.ajax.reload(null,false);
}

function tambah() {
    save_method = 'add';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $('#modal_form').modal('show');
    $('.modal-title').text('Tambah Data');
}

function simpan() {
    $('#btnSave').text('menyimpan...');
    $('#btnSave').attr('disabled',true);    
    var url;

    if(save_method == 'add') {
        url = ajax_add;        
    } else {
        url = ajax_update;        
    }
    
    var formData = new FormData($('#form')[0]);
    $.ajax({        
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            if(data.status) {
                $('.progress').hide();
                $('#modal_form').modal('hide');
                success("Data Berhasil Disimpan");
                reload_table();
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
            error('Data Gagal Disimpan');
            $('#btnSave').text('Simpan');
            $('#btnSave').attr('disabled',false);            
        }
    });
}

function edit(id_pembayaran) {
    save_method = 'update';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();

    $.ajax({
        url : ajax_edit + id_pembayaran,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="id_pembayaran"]').val(data.id_pembayaran);
            $('[name="nip"]').val(data.nip);
            $('[name="nama_pembayaran"]').val(data.nama_pembayaran);
            $('[name="jk"]').val(data.jk);

            $('#modal_form').modal('show');
            $('.modal-title').text('Ubah Data');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $('#notifications').fadeIn().delay(3000).fadeOut('slow').html('<div class="alert alert-danger">Error!</div> ');
        }
    });    
}

function hapus(id_pembayaran) {
    if(confirm('Anda yakin ingin menghapus data ini?')) {        
        $.ajax({
            url : ajax_delete + id_pembayaran,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                success("Data Berhasil Dihapus");
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                error('Data Gagal Dihapus');
            }
        });
    }
}

function success(text) {    
    $('.notifikasi').fadeIn().delay(3000).fadeOut('slow').html('<div class="alert alert-success role="alert"">' + text + '</div>');
}

function error(text) {
    $('.notifikasi').fadeIn().delay(3000).fadeOut('slow').html('<div class="alert alert-danger role="alert"">' + text + '</div>');
}