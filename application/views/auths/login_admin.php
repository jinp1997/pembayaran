<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="UNIMA">
        <meta name="author" content="UNIMA">
        <title>VALIDASI PEMBAYARAN | LOGIN</title>
        
        <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url('assets/css/font_nunito.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    </head>
    <body class="bg-gradient-danger">
        <div class="container" style="margin-top: -10px">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">                                            
                                            <img width="30%" src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo">
                                            <h1 class="h4 text-gray-900 mb-4" style="margin-top: 10px">
                                                <b>APLIKASI<br>VALIDASI PEMBAYARAN</b><br>
                                                <div style="font-size: 14pt">UNIVERSITAS NEGERI MANADO</div>
                                            </h1>
                                        </div>
                                        <form action="<?= site_url('login_admin') ?>" method="POST" class="user" style="margin-bottom: 20px">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" name="username" id="username" aria-describedby="username" placeholder="Username" autofocus>
                                                <?php if (form_error('username')) { ?>
                                                    <label id="username" class="error text-danger" for="username" style="font-size: 10pt; font-weight: bold;">
                                                        <?= form_error('username'); ?>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                                                <?php if (form_error('password')) { ?>
                                                    <label id="password" class="error text-danger" for="password" style="font-size: 10pt; font-weight: bold;">
                                                        <?= form_error('password'); ?>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                            <button type="submit" class="btn btn-outline-primary btn-user btn-block">
                                                LOGIN
                                            </button>
                                        </form>                                                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container my-auto">
                <div class="copyright text-center my-auto" style="color: #fff; font-size: 8pt">
                    <span>Copyright &copy; APLIKASI VALIDASI PEMBAYARAN UNIVERSITAS NEGERI MANADO | Design By : <b>J-1997</b></span>
                </div>
            </div>
        </footer>
        <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/myjs.js') ?>"></script>
    </body>
</html>