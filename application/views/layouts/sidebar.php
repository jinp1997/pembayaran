<?php
    $level = $this->session->userdata('level');
?>

<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img class="img-profile" src="<?= base_url('assets/img/logo.png') ?>" width="40px" height="40px">
        </div>
        <div class="sidebar-brand-text mx-3"><b class="text-sm font-weight-bold text-white text-uppercase mb-1">VALIDASI</b> PEMBAYARAN</div>
    </a>
    
    <hr class="sidebar-divider my-0">
    
    <?php if ($level == 'admin') { ?>
        <li class="nav-item <?= ($halaman == 'dashboard') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= site_url('dashboard') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Menu Utama
        </div>    

        <li class="nav-item <?= ($halaman == 'pembayaran') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= site_url('pembayaran') ?>">
                <i class="fas fa-fw fa-list"></i>
                <span>Data Pembayaran</span>
            </a>
        </li>

        <li class="nav-item <?= ($halaman == 'cek_nim') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= site_url('cek_nim') ?>">
                <i class="fas fa-fw fa-search"></i>
                <span>Cek NIM</span>
            </a>
        </li>

        <li class="nav-item <?= ($halaman == 'kebijakan') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= site_url('kebijakan') ?>">
                <i class="fas fa-fw fa-file"></i>
                <span>Data Kebijakan UKT</span>
            </a>
        </li>

        <li class="nav-item <?= ($halaman == 'kebijakan_ipi') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= site_url('kebijakan_ipi') ?>">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Data Kebijakan IPI</span>
            </a>
        </li>

    <?php } else { ?>
        <li class="nav-item <?= ($halaman == 'dashboard') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= site_url('dashboard') ?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Menu Utama
        </div>    

        <li class="nav-item <?= ($halaman == 'pembayaran') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= site_url('pembayaran') ?>">
                <i class="fas fa-fw fa-list"></i>
                <span>Data Pembayaran</span>
            </a>
        </li>
    <?php } ?>
    
    <hr class="sidebar-divider d-none d-md-block">    
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>