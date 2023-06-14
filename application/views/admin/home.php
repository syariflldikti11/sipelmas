 
<?php
$total_pelayanan=0;
$total_pelayanan=$surat_biodek+$surat_belum_menikah+$surat_izin_keramaian+$surat_janda+$surat_kehilangan+$surat_kematian+$surat_kurang_mampu+$surat_pindah_datang+$surat_pindah_keluar+$surat_skck+$surat_usaha+$surat_domisili;

?>
  

  

 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Halaman Admin</h1>
            
          </div>

          <div class="row mb-3">
           
        <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body border-bottom-primary">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Surat Masuk</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_masuk; ?></div>
                     
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-envelope fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body border-bottom-success ">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Surat Keluar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_keluar; ?></div>
                    
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-paper-plane fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body border-bottom-info">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Kegiatan</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $penugasan; ?></div>
                      
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tasks fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body border-bottom-warning">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Pelayanan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pelayanan; ?></div>
                      
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
           
          </div>
          <!--Row-->

      
<div class="row">

           <div class="col-xl-6 col-lg-7">

               <!-- Area Chart -->
               <div class="card shadow mb-4">

                   <div class="card-header py-3 bg-gradient-light">
                       <h6 class="m-0 font-weight-bold text-info">Statistik Pengaduan</h6>
                   </div>
                   <div class="card-body">

                       <div id="chart"></div>
                   </div>
               </div>
           </div>
           <div class="col-xl-6 col-lg-7">

               <!-- Area Chart -->
               <div class="card shadow mb-4">
                   <div class="card-header py-3 bg-gradient-light">
                       <h6 class="m-0 font-weight-bold text-info">Layanan Belum Selesai</h6>
                   </div>
                   <div class="card-body">
                       
  <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                      
                        <th>Layanan</th>
                        <th>Ket</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Surat Domisili</td>
                        <td><span class="badge badge-warning"><?= $surat_domisili; ?> dari <?= $psurat_domisili; ?> </span></td>
                        <td><a href="#" class="btn btn-sm btn-info">Lihat</a></td>
                      </tr>
                       <tr>
                        <td>Surat Belum Menikah</td>
                        <td><span class="badge badge-success"><?= $surat_belum_menikah; ?> dari <?= $psurat_belum_menikah; ?> </span></td>
                        <td><a href="#" class="btn btn-sm btn-info">Lihat</a></td>
                      </tr>
                       <tr>
                        <td>Surat biodek</td>
                        <td><span class="badge badge-warning"><?= $surat_biodek; ?> dari <?= $psurat_biodek; ?> </span></td>
                        <td><a href="#" class="btn btn-sm btn-info">Lihat</a></td>
                      </tr>
                       <tr>
                        <td>Surat Izin Keramaian</td>
                        <td><span class="badge badge-success"><?= $surat_izin_keramaian; ?> dari <?= $psurat_izin_keramaian; ?> </span></td>
                        <td><a href="#" class="btn btn-sm btn-info">Lihat</a></td>
                      </tr>
                       <tr>
                        <td>Surat Janda</td>
                        <td><span class="badge badge-warning"><?= $surat_janda; ?> dari <?= $psurat_janda; ?> </span></td>
                        <td><a href="#" class="btn btn-sm btn-info">Lihat</a></td>
                      </tr>
                       <tr>
                        <td>Surat Kehilangan</td>
                        <td><span class="badge badge-success"><?= $surat_kehilangan; ?> dari <?= $psurat_kehilangan; ?> </span></td>
                        <td><a href="#" class="btn btn-sm btn-info">Lihat</a></td>
                      </tr>
                       <tr>
                        <td>Surat Kematian</td>
                        <td><span class="badge badge-warning"><?= $surat_kematian; ?> dari <?= $psurat_kematian; ?> </span></td>
                        <td><a href="#" class="btn btn-sm btn-info">Lihat</a></td>
                      </tr>
                       <tr>
                        <td>Surat Kurang Mampu</td>
                        <td><span class="badge badge-success"><?= $surat_kurang_mampu; ?> dari <?= $psurat_kurang_mampu; ?> </span></td>
                        <td><a href="#" class="btn btn-sm btn-info">Lihat</a></td>
                      </tr>
                       <tr>
                        <td>Surat Pindah Datang</td>
                        <td><span class="badge badge-warning"><?= $surat_pindah_datang; ?> dari <?= $psurat_pindah_datang; ?> </span></td>
                        <td><a href="#" class="btn btn-sm btn-info">Lihat</a></td>
                      </tr>
                       <tr>
                        <td>Surat Pindah Keluar</td>
                        <td><span class="badge badge-success"><?= $surat_pindah_keluar; ?> dari <?= $psurat_pindah_keluar; ?> </span></td>
                        <td><a href="#" class="btn btn-sm btn-info">Lihat</a></td>
                      </tr>
                       <tr>
                        <td>Surat SKCK</td>
                        <td><span class="badge badge-warning"><?= $surat_skck; ?> dari <?= $psurat_skck; ?> </span></td>
                        <td><a href="#" class="btn btn-sm btn-info">Lihat</a></td>
                      </tr>
                       <tr>
                        <td>Surat Usaha</td>
                        <td><span class="badge badge-success"><?= $surat_usaha; ?> dari <?= $psurat_usaha; ?> </span></td>
                        <td><a href="#" class="btn btn-sm btn-info">Lihat</a></td>
                      </tr>

                    </tbody>
                  </table>
                </div>
                   </div>
               </div>
           </div>

       </div>
           



    <!-- Main content -->
   

         
                
              </div>
            
       



          <!-- Modal Logout -->
         

        </div>
        <!---Container Fluid-->
      