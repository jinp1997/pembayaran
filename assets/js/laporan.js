var table_masuk;
var table_proses;
var table_selesai;

$(document).ready(function() {
    table_masuk = $('#masuk').DataTable({
        "bAutoWidth" : false,
        "pageLength" : 10,
        "bProcessing": true,
        "order": [],
        "ajax": {
            "url": url_list_masuk,
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
});

$(document).ready(function() {
    table_proses = $('#proses').DataTable({
        "bAutoWidth" : false,
        "pageLength" : 10,
        "bProcessing": true,
        "order": [],
        "ajax": {
            "url": url_list_proses,
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
});

$(document).ready(function() {
    table_selesai = $('#selesai').DataTable({
        "bAutoWidth" : false,
        "pageLength" : 10,
        "bProcessing": true,
        "order": [],
        "ajax": {
            "url": url_list_selesai,
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
});

function reload_masuk() {
    table_masuk.ajax.reload(null,false);    
}

function reload_proses() {
    table_proses.ajax.reload(null,false);
}

function reload_selesai() {
    table_selesai.ajax.reload(null,false);
}

function detail(id_laporan) {    
    $.ajax({
        url : url_detail + id_laporan,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('div#nama_pelapor').html(data.nama_pelapor);
            $('div#sumber').html(data.sumber);
            $('div#lokasi').html(data.lokasi);
            $('div#waktu').html(data.waktu);
            $('div#isi_laporan').html(data.isi_laporan);
            $('div#penyelesaian').html(data.penyelesaian);

            $('div#foto_sebelum').html('<img src="'+ url_foto + data.foto_sebelum +'" alt="'+ data.foto_sebelum +'" width="100%">');            

            $('#modal_detail').modal('show');
            $('.modal-title').text('Rincian Laporan');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            error('Gagal mengambil data');
        }
    });    
}

function detail_selesai(id_laporan) {    
    $.ajax({
        url : url_detail + id_laporan,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('div#nama_pelapor').html(data.nama_pelapor);
            $('div#sumber').html(data.sumber);
            $('div#lokasi').html(data.lokasi);
            $('div#waktu').html(data.waktu);
            $('div#isi_laporan').html(data.isi_laporan);
            $('div#penyelesaian').html(data.penyelesaian);

            $('div#foto_sebelum').html('<img src="'+ url_foto + data.foto_sebelum +'" alt="'+ data.foto_sebelum +'" width="100%">');
            $('div#foto_sesudah').html('<img src="'+ url_foto + data.foto_sesudah +'" alt="'+ data.foto_sesudah +'" width="100%">');            

            $('#modal_detail').modal('show');
            $('.modal-title').text('Rincian Laporan');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            error('Gagal mengambil data');
        }
    });    
}

function verifikasi(id_laporan) {
    if(confirm('Verifikasi laporan ini?')) {
        $.ajax({
            url : url_verifikasi + id_laporan,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                success("Laporan telah di verifikasi untuk di proses lebih lanjut");
                reload_masuk();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                error('Gagal verifikasi laporan');
            }
        });
    }   
}

function proses(id_laporan) {
    $.ajax({
        url : url_detail + id_laporan,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="id_laporan"]').val(data.id_laporan);

            $('#modal_proses').modal('show');
            $('.modal-title').text('Penyelesaian Laporan');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            error('Gagal mengambil data');
        }
    });    
}

function proses_laporan() {
    $('#btnSave').text('mengirim...');
    $('#btnSave').attr('disabled',true);        
    
    var formData = new FormData($('#form')[0]);
    $.ajax({        
        url : url_proses_laporan,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            if(data.status) {                
                $('#modal_proses').modal('hide');
                success("Laporan telah diselesaikan.");                
                reload_proses();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                }
            }
            $('#btnSave').text('Kirim');
            $('#btnSave').attr('disabled',false);            
        },
        error: function (jqXHR, textStatus, errorThrown) {
            error('Laporan gagal dikiriim');
            $('#btnSave').text('Kirim');
            $('#btnSave').attr('disabled',false);            
        }
    });
}

function lihat_map(id_laporan) {
    $.ajax({
        url : url_detail + id_laporan,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            var myLatLng = new google.maps.LatLng(data.lat, data.lng);
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: myLatLng,
                apTypeId: google.maps.MapTypeId.ROADMAP,
                disableDoubleClickZoom: true,
                zoomControl: false,
                gestureHandling: 'none',
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hello World!'
            });

            google.maps.event.addListener(marker, 'click', function(event) {                
                map.setZoom(15);
            });
            $('#modal_map').modal('show');            
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $('#notifications').fadeIn().delay(3000).fadeOut('slow').html('<div class="alert alert-danger">Error!</div> ');
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