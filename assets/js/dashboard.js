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
    $('.modal-title').text('Pengisian Laporan Pengaduan');
}

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

function like(id_laporan) {
    $.ajax({
        url : url_like + id_laporan,
        type: "POST",
        dataType: "JSON",
        success: function(data) {
            if (data.status) {
                konten();
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            error("Terjadi kesalahan! silahkan dicoba beberapa saat lagi.");
        }
    });
}

function unlike(id_laporan) {
    $.ajax({
        url : url_unlike + id_laporan,
        type: "POST",
        dataType: "JSON",
        success: function(data) {
            if (data.status) {
                konten();
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            error("Terjadi kesalahan! silahkan dicoba beberapa saat lagi.");
        }
    });
}

function detail(id_laporan) {
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
            $('#modal_detail').modal('show');            
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $('#notifications').fadeIn().delay(3000).fadeOut('slow').html('<div class="alert alert-danger">Error!</div> ');
        }
    });
}

function konten() {
    $('div#konten').load(url_konten + ' div#konten');
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