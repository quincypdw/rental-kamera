<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('backend/overview') ?>">
        <div class="sidebar-brand-icon">
          <img src="<?= base_url('assets/img/LOGO-02.png') ?>">
        </div>
        <div class="sidebar-brand-text mx-3" style="text-align: left">Pesona Antariksa Lens</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('backend/overview'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Main Menu</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Menu
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Transaksi Data</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Transaksi Penyewaan</h6>
            <a class="collapse-item" href="<?= base_url('backend/admin/transaksi_pembayaran') ?>">Transaksi</a>
            <a class="collapse-item" href="<?= base_url('backend/admin/transaksi') ?>">Data Transaksi</a>
            <a class="collapse-item" href="<?= base_url('backend/admin/pembayaran') ?>">Data Pembayaran</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Customer Data</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Customer Data</h6>
            <a class="collapse-item" href="<?= base_url('frontend/auth/registration') ?>">Register Customer</a>
            <a class="collapse-item" href="<?= base_url('backend/admin/customer') ?>">Data Customer</a>
          </div>
        </div>
      </li>
      <?php if($kedudukan = $this->session->userdata('masuk')[0]->level_id==2) { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Admin Data</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Admin Data</h6>
            <a class="collapse-item" href="<?= base_url('authuser/registration') ?>">Register Admin</a>
            <a class="collapse-item" href="<?= base_url('backend/admin/admindata') ?>">Data Admin</a>
          </div>
        </div>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('backend/admin/kamera') ?>">
          <i class="fas fa-fw fa-palette"></i>
          <span>Kamera Data</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('backend/admin/fasilitas_tambahan') ?>">
          <i class="fas fa-fw fa-palette"></i>
          <span>Fasilitas Tambahan Data</span>
        </a>
      </li>
      <!-- <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Examples
      </div> -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('backend/admin/diskon') ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Diskon</span>
        </a>
      </li>
      <?php if($kedudukan = $this->session->userdata('masuk')[0]->level_id==2) { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>Laporan</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Laporan</h6>
            <a class="collapse-item" href="<?= base_url('backend/admin/laporan_customer')?>">Data Laporan Customer</a>
            <a class="collapse-item" href="<?= base_url('backend/admin/laporan_produk')?>">Data Laporan Produk</a>
            <a class="collapse-item" href="<?= base_url('backend/admin/laporan_pendapatan')?>">Data Laporan Pendapatan</a>
          </div>
        </div>
      </li>
      <?php } ?>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>