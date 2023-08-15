<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <link href="<?php echo base_url(); ?>assets/img/logo.png" rel="icon">
  <title>SIPELMAS- Aplikasi Surat Menyurat dan Monitoring Fasilitas Pelayanan Masyarakat</title>
  <link href="<?php echo base_url(); ?>assetsadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assetsadmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assetsadmin/vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assetsadmin/css/ruang-admin.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assetsadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

         <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul  class="navbar-nav    sidebar sidebar-light accordion" id="accordionSidebar">
      <a style="background-color: #0099CC;" class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/index'); ?>">
        <div class="sidebar-brand-icon">
          <img src="<?php echo base_url(); ?>assets/img/logo.png">
        </div>
        <div class="sidebar-brand-text mx-3">SIPELMAS</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('admin/index'); ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
       Master Data
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url(); ?>assetsadmin/#" data-toggle="collapse" data-target="#collapseBootstrapp"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Master Data</span>
        </a>
        <div id="collapseBootstrapp" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
        
            <a class="collapse-item" href="<?php echo base_url('admin/ktp'); ?>">Data KTP</a>
            <a class="collapse-item" href="<?php echo base_url('admin/kk'); ?>">Data KK</a>
            <a class="collapse-item" href="<?php echo base_url('admin/pegawai'); ?>">Data Pegawai</a>
            <a class="collapse-item" href="<?php echo base_url('admin/user'); ?>">Data User</a>
            <a class="collapse-item" href="<?php echo base_url('admin/ttd_laporan'); ?>">TTD Laporan</a>
          </div>
        </div>
      </li>

       <hr class="sidebar-divider">
      <div class="sidebar-heading">
      Surat
      </div>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url('admin/surat_masuk'); ?>">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Surat Masuk</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url('admin/surat_keluar'); ?>">
          <i class="fas fa-fw fa-paper-plane"></i>
          <span>Surat Keluar</span></a>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
       Pelayanan
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url(); ?>assetsadmin/#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-file"></i>
          <span>Pelayanan </span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
      
            <a class="collapse-item" href="<?php echo base_url('admin/surat_domisili'); ?>">Surat Domisili</a>
            <a class="collapse-item" href="<?php echo base_url('admin/surat_usaha'); ?>">Surat Usaha</a>
            <a class="collapse-item" href="<?php echo base_url('admin/surat_kehilangan'); ?>">Surat Kehilangan</a>
            <a class="collapse-item" href="<?php echo base_url('admin/surat_kurang_mampu'); ?>">Surat Kurang Mampu</a>
            <a class="collapse-item" href="<?php echo base_url('admin/surat_kematian'); ?>">Surat Kematian</a>
            <a class="collapse-item" href="<?php echo base_url('admin/surat_belum_menikah'); ?>">Surat Belum Menikah</a>
            <a class="collapse-item" href="<?php echo base_url('admin/surat_pindah_keluar'); ?>">Surat Pindah Keluar</a>
            <a class="collapse-item" href="<?php echo base_url('admin/surat_pindah_datang'); ?>">Surat Pindah Datang</a>
            <a class="collapse-item" href="<?php echo base_url('admin/surat_izin_keramaian'); ?>">Surat Ijin Mengumpulkan <br />Orang Banyak</a>
            <a class="collapse-item" href="<?php echo base_url('admin/surat_skck'); ?>">SKCK</a>
            <a class="collapse-item" href="<?php echo base_url('admin/surat_biodek'); ?>">Surat Penguasan Fisik <br />Bidang Tanah</a>
            <a class="collapse-item" href="<?php echo base_url('admin/surat_janda'); ?>">Surat Keterangan Janda</a>
          </div>
        </div>
      </li>

   
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/proposal'); ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Pengajuan Proposal</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/pengaduan'); ?>">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Pengaduan</span>
        </a>
      </li>

     <hr class="sidebar-divider">
      <div class="sidebar-heading">
       Kegiatan
      </div>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url('admin/jenis_kegiatan'); ?>">
          <i class="fas fa-fw fa-file"></i>
          <span>Jenis Kegiatan</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url('admin/penugasan'); ?>">
          <i class="fas fa-fw fa-tasks"></i>
          <span>Kegiatan</span></a>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
       Laporan
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url(); ?>assetsadmin/#" data-toggle="collapse" data-target="#collapseBootstrappp"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Download Laporan</span>
        </a>
        <div id="collapseBootstrappp" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Laporan</h6>
           <a class="collapse-item" data-toggle="modal" data-target="#lapsuratdomisili" href="#">Surat Domisili</a>
         
           <a class="collapse-item" data-toggle="modal" data-target="#lapsuratusaha" href="#">Surat Usaha</a>
                         <a class="collapse-item" data-toggle="modal" data-target="#lapsuratkehilangan" href="#">Surat Kehilangan</a>
                          <a class="collapse-item" data-toggle="modal" data-target="#lapsuratkurangmampu" href="#">Surat Kurang Mampu</a>
                          <a class="collapse-item" data-toggle="modal" data-target="#lapsuratkematian" href="#">Surat Kematian</a>
                          <a class="collapse-item" data-toggle="modal" data-target="#lapsuratbelummenikah" href="#">Surat Belum Menikah</a>
                          <a class="collapse-item" data-toggle="modal" data-target="#lapsuratpindahkeluar" href="#">Surat Pindah Keluar</a>
                          <a class="collapse-item" data-toggle="modal" data-target="#lapsuratpindahdatang" href="#">Surat Pindah Datang</a>
                          <a class="collapse-item" data-toggle="modal" data-target="#lapsuratizinkeramaian" href="#">Surat Izin Keramaian</a>
                          <a class="collapse-item" data-toggle="modal" data-target="#lapsuratskck" href="#">Surat SKCK</a>
                          <a class="collapse-item" data-toggle="modal" data-target="#lapsuratbiodek" href="#">Surat Biodek</a>
                          <a class="collapse-item" data-toggle="modal" data-target="#lapsuratjanda" href="#">Surat Janda</a>
                          <a class="collapse-item" data-toggle="modal" data-target="#lapsuratmasuk" href="#">Surat Masuk</a>
                          <a class="collapse-item" data-toggle="modal" data-target="#lapsuratkeluar" href="#">Surat Keluar</a>
           <a class="collapse-item" data-toggle="modal" data-target="#lapkegiatan" href="#">Kegiatan</a>
           <a class="collapse-item" data-toggle="modal" data-target="#lappengaduan" href="#">Pengaduan</a>
           <a class="collapse-item" data-toggle="modal" data-target="#lapproposal" href="#">Pengajuan Proposal</a>
      
            <a class="collapse-item" href="<?php echo base_url('admin/cetak_kk'); ?>">Data KK</a>
            <a class="collapse-item" href="<?php echo base_url('admin/cetak_pegawai'); ?>">Data Pegawai</a>

            <a class="collapse-item" data-toggle="modal" data-target="#exampleModal"
                    id="#myBtn">Data KTP</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/informasi'); ?>">
          <i class="fas fa-fw fa-bullhorn"></i>
          <span>Informasi Pelayanan</span>
        </a>
      </li>
  
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top" style="background-color: #0099CC;">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
           
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
               
             <span class="ml-2 d-none d-lg-inline text-white small"> <?= $this->session->userdata('nama'); ?></span>
              </a>
             
            </li>
           
           
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>assetsadmin/#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="<?php echo base_url(); ?>assetsadmin/img/boy.png" style="max-width: 60px">
                
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
               
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
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
                  <h5 class="modal-title" id="exampleModalLabelLogout">Logout SIPELMAS</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Anda yakin ingin keluar ?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-info" data-dismiss="modal">Cancel</button>
                  <a href="<?php echo base_url('login/logout_sipelmas'); ?>" class="btn btn-info">Logout</a>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Pilih RT</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                
                <?php echo validation_errors();
                                                       
    echo form_open('admin/download_ktp'); ?>
                <div class="modal-body">
                  <div class="form-group">
                      <label>RT</label>
                      <select name="rt" class="form-control" >
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                       
                      </select>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-primary" value="Download">
                </form>
                </div>
              </div>
            </div>
          </div>

            <div class="modal fade" id="lapsurat" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Laporan Pelayanan </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/download_semua_surat'); ?>
                   <div class="form-group">
                        <label for="exampleInputEmail1">Surat</label>
                        <select class="form-control" name="jenis">
                           <option value="1">Surat Domisili</option>
            <option value="2">Surat Usaha</option>
            <option value="3">Surat Kehilangan</option>
             <option value="4">Surat Kurang Mampu</option>
            <option value="5">Surat Kematian</option>
             <option value="6">Surat Belum Menikah</option>
             <option value="7">Surat Pindah Keluar</option>
             <option value="8">Surat Pindah Datang</option>
             <option value="9">Surat Ijin Mengumpulkan Orang Banyak</option>
             <option value="10">SKCK</option>
             <option value="11">Surat Penguasan Fisik Bidang Tanah</option>
             <option value="12">Surat Keterangan Janda</option>
                        </select>
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="date" class="form-control"  name="dari" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Sampai</label>
                        <input type="date" class="form-control"  name="sampai" required >
                        
                      </div>
                
                      
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>

                    <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Download">
                  </div>
                  </form>
                </div>
              </div>
            </div>
<div class="modal fade" id="lapsuratjanda" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Laporan Surat Janda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/download_surat_janda'); ?>
                  
                      <input type="hidden" class="form-control"  name="jenis" value="12" required >
                       <div class="form-group">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="date" class="form-control"  name="dari" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Sampai</label>
                        <input type="date" class="form-control"  name="sampai" required >
                        
                      </div>
                
                      
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>

                    <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Download">
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="modal fade" id="lapsuratkeluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Laporan Surat Keluar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/download_surat_keluar'); ?>
                  
                      <input type="hidden" class="form-control"  name="jenis" value="14" required >
                       <div class="form-group">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="date" class="form-control"  name="dari" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Sampai</label>
                        <input type="date" class="form-control"  name="sampai" required >
                        
                      </div>
                
                      
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>

                    <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Download">
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="modal fade" id="lapsuratmasuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Laporan Surat Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/download_surat_masuk'); ?>
                  
                      <input type="hidden" class="form-control"  name="jenis" value="13" required >
                       <div class="form-group">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="date" class="form-control"  name="dari" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Sampai</label>
                        <input type="date" class="form-control"  name="sampai" required >
                        
                      </div>
                
                      
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>

                    <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Download">
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="modal fade" id="lapsuratbiodek" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Laporan Surat Biodek </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/download_surat_biodek'); ?>
                    <input type="hidden" class="form-control"  name="jenis" value="11" required >
                       <div class="form-group">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="date" class="form-control"  name="dari" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Sampai</label>
                        <input type="date" class="form-control"  name="sampai" required >
                        
                      </div>
                
                      
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>

                    <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Download">
                  </div>
                  </form>
                </div>
              </div>
            </div>

<div class="modal fade" id="lapsuratskck" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Laporan Surat SKCK </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/download_surat_skck'); ?>
                   <input type="hidden" class="form-control"  name="jenis" value="10" required >
                       <div class="form-group">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="date" class="form-control"  name="dari" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Sampai</label>
                        <input type="date" class="form-control"  name="sampai" required >
                        
                      </div>
                
                      
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>

                    <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Download">
                  </div>
                  </form>
                </div>
              </div>
            </div>


<div class="modal fade" id="lapsuratizinkeramaian" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Laporan Surat Izin Keramaian </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/download_surat_izin_keramaian'); ?>
                    <input type="hidden" class="form-control"  name="jenis" value="9" required >
                       <div class="form-group">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="date" class="form-control"  name="dari" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Sampai</label>
                        <input type="date" class="form-control"  name="sampai" required >
                        
                      </div>
                
                      
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>

                    <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Download">
                  </div>
                  </form>
                </div>
              </div>
            </div>


<div class="modal fade" id="lapsuratpindahdatang" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Laporan Surat Pindah Datang </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/download_surat_pindah_datang'); ?>
                   <input type="hidden" class="form-control"  name="jenis" value="8" required >
                       <div class="form-group">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="date" class="form-control"  name="dari" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Sampai</label>
                        <input type="date" class="form-control"  name="sampai" required >
                        
                      </div>
                
                      
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>

                    <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Download">
                  </div>
                  </form>
                </div>
              </div>
            </div>


<div class="modal fade" id="lapsuratpindahkeluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Laporan Surat Pindah Keluar </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/download_surat_pindah_keluar'); ?>
                   <input type="hidden" class="form-control"  name="jenis" value="7" required >
                       <div class="form-group">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="date" class="form-control"  name="dari" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Sampai</label>
                        <input type="date" class="form-control"  name="sampai" required >
                        
                      </div>
                
                      
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>

                    <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Download">
                  </div>
                  </form>
                </div>
              </div>
            </div>


<div class="modal fade" id="lapsuratbelummenikah" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Laporan Surat Belum Menikah </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/download_surat_belum_menikah'); ?>
                   <input type="hidden" class="form-control"  name="jenis" value="6" required >
                       <div class="form-group">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="date" class="form-control"  name="dari" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Sampai</label>
                        <input type="date" class="form-control"  name="sampai" required >
                        
                      </div>
                
                      
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>

                    <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Download">
                  </div>
                  </form>
                </div>
              </div>
            </div>


            <div class="modal fade" id="lapsuratkematian" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Laporan Surat Kematian </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/download_surat_kematian'); ?>
                   <input type="hidden" class="form-control"  name="jenis" value="5" required >
                       <div class="form-group">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="date" class="form-control"  name="dari" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Sampai</label>
                        <input type="date" class="form-control"  name="sampai" required >
                        
                      </div>
                
                      
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>

                    <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Download">
                  </div>
                  </form>
                </div>
              </div>
            </div>


            <div class="modal fade" id="lapsuratkurangmampu" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Laporan Surat Kurang Mampu </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/download_surat_kurang_mampu'); ?>
                   <input type="hidden" class="form-control"  name="jenis" value="4" required >
                       <div class="form-group">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="date" class="form-control"  name="dari" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Sampai</label>
                        <input type="date" class="form-control"  name="sampai" required >
                        
                      </div>
                
                      
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>

                    <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Download">
                  </div>
                  </form>
                </div>
              </div>
            </div>


            <div class="modal fade" id="lapsuratkehilangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Laporan Surat Kehilangan </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/download_surat_kehilangan'); ?>
                   <input type="hidden" class="form-control"  name="jenis" value="3" required >
                       <div class="form-group">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="date" class="form-control"  name="dari" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Sampai</label>
                        <input type="date" class="form-control"  name="sampai" required >
                        
                      </div>
                
                      
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>

                    <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Download">
                  </div>
                  </form>
                </div>
              </div>
            </div>


              <div class="modal fade" id="lapkegiatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Laporan Kegiatan </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/cetak_kegiatan'); ?>
                  
                       <div class="form-group">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="date" class="form-control"  name="dari" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Sampai</label>
                        <input type="date" class="form-control"  name="sampai" required >
                        
                      </div>
                
                      
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>

                    <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Submit">
                  </div>
                  </form>
                </div>
              </div>
            </div>

              <div class="modal fade" id="lappengaduan" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Laporan Pengaduan </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/cetak_pengaduan'); ?>
                  
                       <div class="form-group">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="date" class="form-control"  name="dari" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Sampai</label>
                        <input type="date" class="form-control"  name="sampai" required >
                        
                      </div>
                
                      
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>

                    <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Submit">
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="modal fade" id="lapproposal" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Laporan Proposal </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/cetak_proposal'); ?>
                  
                       <div class="form-group">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="date" class="form-control"  name="dari" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Sampai</label>
                        <input type="date" class="form-control"  name="sampai" required >
                        
                      </div>
                
                      
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>

                    <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Submit">
                  </div>
                  </form>
                </div>
              </div>
            </div>

 <div class="modal fade" id="lapsuratdomisili" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Laporan Surat Domisili </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/download_surat_domisili'); ?>
                   <input type="hidden" class="form-control"  name="jenis" value="1" required >
                       <div class="form-group">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="date" class="form-control"  name="dari" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Sampai</label>
                        <input type="date" class="form-control"  name="sampai" required >
                        
                      </div>
                
                      
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>

                    <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Download">
                  </div>
                  </form>
                </div>
              </div>
            </div>


<div class="modal fade" id="lapsuratusaha" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Laporan Surat Usaha </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/download_surat_usaha'); ?>
                    <input type="hidden" class="form-control"  name="jenis" value="2" required >
                       <div class="form-group">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="date" class="form-control"  name="dari" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Sampai</label>
                        <input type="date" class="form-control"  name="sampai" required >
                        
                      </div>
                
                      
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>

                    <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Download">
                  </div>
                  </form>
                </div>
              </div>
            </div>



                <?= $contents ?>


               
       
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="<?php echo base_url(); ?>assetsadmin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assetsadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assetsadmin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url(); ?>assetsadmin/vendor/select2/dist/js/select2.min.js"></script>
  <script src="<?php echo base_url(); ?>assetsadmin/js/ruang-admin.min.js"></script>
  <script src="<?php echo base_url(); ?>assetsadmin/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assetsadmin/js/demo/chart-area-demo.js"></script>  
   <script src="<?php echo base_url(); ?>assetsadmin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assetsadmin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>
      <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script type="text/javascript">


    <?php if ($this->session->flashdata('success')) { ?>
      toastr.success("<?php echo $this->session->flashdata('success'); ?>");
    <?php } else if ($this->session->flashdata('delete')) { ?>
        toastr.error("<?php echo $this->session->flashdata('delete'); ?>");
    <?php } else if ($this->session->flashdata('update')) { ?>
          toastr.info("<?php echo $this->session->flashdata('update'); ?>");
    <?php } ?>


  </script>
  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('.select2-single').select2();
      $('.select2-singlee').select2();
      $('.select2-singleee').select2();
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
  <script type="text/javascript">
jQuery(function(){
 new Highcharts.Chart({
  chart: {
   renderTo: 'chart',
   type: 'column',
  },
  title: {
   text: '',
   x: -20
  },
  subtitle: {
   text: '',
   x: -20
  },
  xAxis: {
   categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                    'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des']
  },
  yAxis: {
   title: {
    text: 'Pengaduan'
   }
  },
  series: [{
   name: 'Pengaduan',
   data: <?php echo json_encode($grafik_pengaduan); ?>,
   color: '#FF530D'
 
  },
  { name: 'Respon',

       data: <?php echo json_encode($grafik_respon); ?>,
        color: '#5cb85c'
  }
  ]
 });
}); 
</script>
</body>

</html>