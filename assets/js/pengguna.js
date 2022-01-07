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

function lock(id_pelapor) {
    if(confirm('Anda yakin ingin menonaktifkan pengguna ini?')) {
        $.ajax({
            url : url_lock + id_pelapor,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                if (data.status) {
                    success('Pengguna berhasil di non-aktifkan');
                    reload_table();
                }                
            },
            error: function (jqXHR, textStatus, errorThrown) {
                error('Pengguna gagal di aktifkan');
            }
        });
    }
}

function unlock(id_pelapor) {
    if(confirm('Anda yakin ingin mengaktifkan pengguna ini?')) {
        $.ajax({
            url : url_unlock + id_pelapor,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                if (data.status) {
                    success('Pengguna berhasil aktifkan');
                    reload_table();
                }                
            },
            error: function (jqXHR, textStatus, errorThrown) {
                error('Pengguna gagal di non-aktifkan');
            }
        });
    }
}

function detail(id_pelapor) {    
    $.ajax({
        url : url_detail + id_pelapor,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('div#nama_pelapor').html(data.nama_pelapor);
            $('div#email').html(data.email);
            $('div#username').html(data.username);
            $('div#alamat').html(data.alamat);
            $('div#jenis_kelamin').html(data.jenis_kelamin);
            $('div#no_ktp').html(data.no_ktp);
            $('div#tgl_daftar').html(data.tgl_daftar);

            $('#modal_detail').modal('show');
            $('.modal-title').text('Detail Pengguna');
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