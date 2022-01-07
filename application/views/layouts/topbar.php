<?php
    $level = $this->session->userdata('level');
    $username = $this->session->userdata('username');

    if ($level !== "operator") {
        $nama = $this->session->userdata('nama_admin');
    } else {
        $nama = $this->session->userdata('nama_user');
    }
?>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">    
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <div class="h5 d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        Selamat Datang <strong><?= $nama ?></strong>
    </div>
        
    <ul class="navbar-nav ml-auto">
        
        <li class="nav-item dropdown no-arrow" style="margin-top: 25px; margin-right: 0px">
            <b class="text-primary" style="font-family: sans-serif;">APLIKASI VALIDASI PEMBAYARAN</b><b style="font-family: sans-serif;"> UNIVERSITAS NEGERI MANADO</b>
        </li>
        <li class="nav-item dropdown no-arrow" style="margin-top: 14px">
            
        </li>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/avatar.png') ?>" width="70px" height="70px">
            </a>            
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php if ($level == 'tes') { ?>
                    <a class="dropdown-item" href="<?= site_url('profil') ?>">
                        <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Akun Saya
                    </a>
                <?php } ?>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Konfirmasi
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda ingin keluar?</div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Tidak</button>
                <?php if ($level !== 'operator') { ?>
                    <a class="btn btn-primary" href="<?= site_url('login_admin/logout') ?>">Ya</a>
                <?php } else { ?>
                    <a class="btn btn-primary" href="<?= site_url('login/logout') ?>">Ya</a>
                <?php } ?>                
            </div>
        </div>
    </div>
</div>