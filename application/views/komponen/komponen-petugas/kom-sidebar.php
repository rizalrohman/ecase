  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-cogs"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ECASE</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('petugas') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Pengaduan
      </div>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('petugas/tanggapan') ?>">
          <i class="fas fa-fw fa-reply"></i>
          <span>Tanggapi Pengaduan</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('petugas/verifikasi') ?>">
          <i class="fas fa-fw fa-check-square"></i>
          <span>Verifikasi dan Validasi</span></a>
      </li>      

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-database"></i>
          <span>Data Pengaduan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('petugas/data_pengaduan/0') ?>">Belum Diproses</a>
            <a class="collapse-item" href="<?php echo base_url('petugas/data_pengaduan/1') ?>">Diproses</a>
            <a class="collapse-item" href="<?php echo base_url('petugas/data_pengaduan/2') ?>">Selesai</a>
            <a class="collapse-item" href="<?php echo base_url('petugas/data_pengaduan/3') ?>">Ditolak</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
