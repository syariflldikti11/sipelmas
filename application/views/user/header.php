<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?php echo base_url(); ?>assets/img/logobatola.ico" rel="icon">
  <title>SIAPKADES- Sistem Informasi Administrasi Pelayanan Kantor Desa Pantai Hambawang</title>
  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"><link href="<?php echo base_url(); ?>assets/vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/css/ruang-admin.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar"  >
      <a style="background-color: #0099CC;"class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>assets/index.html">
        <div class="sidebar-brand-icon" >
          <img src="<?php echo base_url(); ?>assets/img/logobatola.png">
        </div>
        <div class="sidebar-brand-text mx-3">SIAPKADES</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('user/index'); ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Halaman Utama</span></a>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
       Pelayanan
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url(); ?>assets/#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Surat-surat</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Surat-surat</h6>
            <a class="collapse-item" href="<?php echo base_url('user/surat_domisili'); ?>">Surat Domisili</a>
            <a class="collapse-item" href="<?php echo base_url('user/surat_usaha'); ?>">Surat Ijin Usaha</a>
            <a class="collapse-item" href="<?php echo base_url('user/surat_kehilangan'); ?>">Surat Kehilangan</a>
            <a class="collapse-item" href="<?php echo base_url('user/surat_kurang_mampu'); ?>">Surat Kurang Mampu</a>
            <a class="collapse-item" href="<?php echo base_url('user/surat_kematian'); ?>">Surat Kematian</a>
            <a class="collapse-item" href="<?php echo base_url('user/surat_belum_menikah'); ?>">Surat Belum Menikah</a> 
              <a class="collapse-item" href="<?php echo base_url('user/surat_pindah_keluar'); ?>">Pindah Keluar</a>
            <a class="collapse-item" href="<?php echo base_url('user/surat_pindah_datang'); ?>">Pindah Datang</a>
            <a class="collapse-item" href="<?php echo base_url('user/surat_izin_keramaian'); ?>">Surat Ijin Mengumpulkan <br />Orang Banyak</a>
            <a class="collapse-item" href="<?php echo base_url('user/surat_skck'); ?>">SKCK</a>
            <a class="collapse-item" href="<?php echo base_url('user/surat_biodek'); ?>">Surat Penguasan Fisik <br />Bidang Tanah</a>
             <a class="collapse-item" href="<?php echo base_url('user/surat_janda'); ?>">Surat Keterangan Janda</a>
          </div>
        </div>
      </li>

    
  <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('user/proposal'); ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Pengajuan Proposal</span>
        </a>
      </li>

      
   
     
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
       Pengaduan
      </div>
     
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('user/pengaduan'); ?>">
          <i class="fas fa-fw fa-exclamation-triangle"></i>
          <span>Pengaduan</span>
        </a>
      </li>

     
    </ul>
    
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content" >
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top" style="background-color: #0099CC;" >
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
         
          
            <div class="topbar-divider d-none d-sm-block" ></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>assets/#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="<?php echo base_url(); ?>assets/img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $this->session->userdata('ses_name');  ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url('user/ktp'); ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Data Saya
                </a>
               
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url(); ?>assets/javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>

            <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Logout SIAPKADES Pantai Hambawang</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Anda yakin ingin keluar ?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-info" data-dismiss="modal">Cancel</button>
                  <a href="<?php echo base_url('login/logout'); ?>" class="btn btn-info">Logout</a>
                </div>
              </div>
            </div>
          </div>