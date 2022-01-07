<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="SMK KRISTEN KAWANGKOAN">
        <meta name="author" content="SMK KRISTEN KAWANGKOAN">
        <title>VALIDASI PEMBAYARAN</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo.png">
        
        <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url('assets/css/font_nunito.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/mystyle.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">

        <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>   
    </head>
    <body id="page-top">
        <div id="wrapper">            
            <?php $this->load->view('layouts/sidebar'); ?>
            <div id="content-wrapper" class="d-flex flex-column">                
                <div id="content">
                    <?php $this->load->view('layouts/topbar'); ?>
                    <?php $this->load->view($main); ?>
                </div>

                <?php $this->load->view('layouts/footer'); ?>
            </div>
        </div>
        <div class="notifikasi"></div>
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>        
    
        <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>        
        <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

        <script src="<?= base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>

        <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/myjs.js') ?>"></script>        
    </body>
</html>