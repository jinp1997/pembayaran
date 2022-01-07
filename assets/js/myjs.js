$(document).ready(function() {
    /**
    * Modal confirmation untuk link.
    */
   $('a[data-confirm]').click(function () {
      var href = $(this).attr('href');
      if (!$('#dataConfirmModal').length) {
         $('body').append(
                 '<div class="modal fade" id="dataConfirmModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">' +
                 '<div class="modal-dialog">' +
                 '<div class="modal-content">' +
                 '<div class="modal-header">' +
                 '<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' +
                 '<h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>' +
                 '</div>' +
                 '<div class="modal-body"></div>' +
                 '<div class="modal-footer">' +
                 '<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>' +
                 '<a class="btn btn-primary" id="dataConfirmOK">Ya</a>' +
                 '</div>' +
                 '</div>' +
                 '</div>' +
                 '</div>'
                 );
      }
      $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
      $('#dataConfirmOK').attr('href', href);
      $('#dataConfirmModal').modal({show: true});
      return false;
   });

   /**
    * Modal confirmation untuk form submit.
    */
   $('button[data-confirm]').click(function () {
      if (!$('#dataConfirmModal').length) {
         $('body').append(
                 '<div class="modal fade" id="dataConfirmModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">' +
                 '<div class="modal-dialog">' +
                 '<div class="modal-content">' +
                 '<div class="modal-header">' +
                 '<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' +
                 '<h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>' +
                 '</div>' +
                 '<div class="modal-body"></div>' +
                 '<div class="modal-footer">' +
                 '<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>' +
                 '<button type="submit" class="btn btn-primary" id="dataConfirmOK">Ya</button>' +
                 '</div>' +
                 '</div>' +
                 '</div>' +
                 '</div>'
                 );
      }
      $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
      $('#dataConfirmModal').modal({show: true});

      // Jika tombol submit di-klik.
      $("#dataConfirmOK").click(function () {
         $("#myform").submit();
      });
      return false;
   });  

    $('div.alert').not('.alert-important').delay(2000).fadeOut(1000);

    pieChart();    
});

function pieChart() {
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Laporan Selesai", "Laporan Masuk", "Laporan Proses"],
            datasets: [{
                data: [laporan_selesai, laporan_masuk, laporan_proses],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 70,
        },
    }); 
}