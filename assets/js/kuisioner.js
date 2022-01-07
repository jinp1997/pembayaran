$(document).ready(function() {
    table = $('#mytable').DataTable({      
        "bAutoWidth" : false,
        "pageLength" : 10,
        "bProcessing": true,
        "order": [],
        "ajax": {
            "url": url_list,
            "type": "GET"
        },        
        "columnDefs": [
            { 
                "targets": [ 0 ],
                "orderable": false,
            },
            { 
                "targets": [ -1 ],
                "orderable": false,
            },
        ]
    });

    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
});

function reload_table() {
    table.ajax.reload(null,false);
}

function show() {
    save_method = 'add';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $('#modal_form').modal('show');
    $('.modal-title').text('Tambah Kuisioner');
}

function add() {
    $('#btnSave').text('menyimpan...');
    $('#btnSave').attr('disabled',true);    
    var url;

    if(save_method == 'add') {
        url = url_add;
    } else {
        url = url_update;
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
                $('#modal_form').modal('hide');
                success();                
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
            error('Data gagal disimpan');
            $('#btnSave').text('Simpan');
            $('#btnSave').attr('disabled',false);            
        }
    });
}

function edit(id_kuisioner) {
    save_method = 'update';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();

    $.ajax({
        url : url_edit + id_kuisioner,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="id_kuisioner"]').val(data.id_kuisioner);
            $('[name="kuisioner"]').val(data.kuisioner);

            $('#modal_form').modal('show');
            $('.modal-title').text('Edit Kuisioner');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            error('Gagal mengambil data');
        }
    });    
}

function hapus(id_kuisioner) {
    if(confirm('Anda yakin ingin menghapus data ini?')) {
        $.ajax({
            url : url_delete + id_kuisioner,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                success('Data berhasil dihapus');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                error('Data gagal dihapus');
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

function warning(text) {
    $('.notifikasi').fadeIn().delay(3000).fadeOut('slow').html('<div class="alert alert-warning role="alert"">' + text + '</div>');
}