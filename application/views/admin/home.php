 
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

          

              <div class="col-xl-4 col-lg-7">

               <!-- Area Chart -->
               <div class="card shadow mb-4">
                   <div class="card-header py-3 bg-gradient-light">
                       <h6 class="m-0 font-weight-bold text-info">Statistik Pelayanan</h6>
                   </div>
                   <div class="card-body">
                       
  <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                      
                        <th>Layanan</th>
                        <th>Selesai</th>
                        <th>Belum Selesai</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Surat Domisili</td>
                        <td><?= $surat_domisili; ?> </td>
                        <td>
                        <?php if($psurat_domisili<>0) :?><span class="badge badge-danger"><?php endif; ?>
                         <?php if($psurat_domisili==0) :?><span class="badge badge-success"><?php endif; ?><?= $psurat_domisili; ?> </span></td>
                      </tr>
                       <tr>
                        <td>Surat Belum Menikah</td>
                        <td><?= $surat_belum_menikah; ?></td>
                         <td><?php if($psurat_belum_menikah<>0) :?><span class="badge badge-danger"><?php endif; ?>
                         <?php if($psurat_belum_menikah==0) :?><span class="badge badge-success"><?php endif; ?><?= $psurat_belum_menikah; ?> </span></td>
                        
                      </tr>
                       <tr>
                        <td>Surat biodek</td>
                        <td><?= $surat_biodek; ?>  </td>
                         <td><?php if($psurat_biodek<>0) :?><span class="badge badge-danger"><?php endif; ?>
                         <?php if($psurat_biodek==0) :?><span class="badge badge-success"><?php endif; ?><?= $psurat_biodek; ?>  </span></td>
                        
                      </tr>
                       <tr>
                        <td>Surat Izin Keramaian</td>
                        <td><?= $surat_izin_keramaian; ?> </td>
                         <td><?php if($psurat_izin_keramaian<>0) :?><span class="badge badge-danger"><?php endif; ?>
                         <?php if($psurat_izin_keramaian==0) :?><span class="badge badge-success"><?php endif; ?><?= $psurat_izin_keramaian; ?> </span></td>
                        
                      </tr>
                       <tr>
                        <td>Surat Janda</td>
                        <td><?= $surat_janda; ?>  </td>
                        <td><?php if($psurat_janda<>0) :?><span class="badge badge-danger"><?php endif; ?>
                         <?php if($psurat_janda==0) :?><span class="badge badge-success"><?php endif; ?><?= $psurat_janda; ?> </span></td>
                        
                      </tr>
                       <tr>
                        <td>Surat Kehilangan</td>
                        <td><?= $surat_kehilangan; ?>  </td>
                         <td><?php if($psurat_kehilangan<>0) :?><span class="badge badge-danger"><?php endif; ?>
                         <?php if($psurat_kehilangan==0) :?><span class="badge badge-success"><?php endif; ?><?= $psurat_kehilangan; ?>  </span></td>
                        
                      </tr>
                       <tr>
                        <td>Surat Kematian</td>
                        <td><?= $surat_kematian; ?> </td>
                        <td><?php if($psurat_kematian<>0) :?><span class="badge badge-danger"><?php endif; ?>
                         <?php if($psurat_kematian==0) :?><span class="badge badge-success"><?php endif; ?><?= $psurat_kematian; ?> </span></td>
                        
                      </tr>
                       <tr>
                        <td>Surat Kurang Mampu</td>
                        <td><?= $surat_kurang_mampu; ?></td>
                         <td><?php if($psurat_kurang_mampu<>0) :?><span class="badge badge-danger"><?php endif; ?>
                         <?php if($psurat_kurang_mampu==0) :?><span class="badge badge-success"><?php endif; ?><?= $psurat_kurang_mampu; ?></span></td>
                        
                      </tr>
                       <tr>
                        <td>Surat Pindah Datang</td>
                        <td><?= $surat_pindah_datang; ?>  </td>
                        <td><?php if($psurat_pindah_datang<>0) :?><span class="badge badge-danger"><?php endif; ?>
                         <?php if($psurat_pindah_datang==0) :?><span class="badge badge-success"><?php endif; ?><?= $psurat_pindah_datang; ?>  </span></td>
                        
                      </tr>
                       <tr>
                        <td>Surat Pindah Keluar</td>
                        <td><?= $surat_pindah_keluar; ?>  </td>
                        <td><?php if($psurat_pindah_keluar<>0) :?><span class="badge badge-danger"><?php endif; ?>
                         <?php if($psurat_pindah_keluar==0) :?><span class="badge badge-success"><?php endif; ?><?= $psurat_pindah_keluar; ?> </span></td>
                        
                      </tr>
                       <tr>
                        <td>Surat SKCK</td>
                        <td><?= $surat_skck; ?>  </td>
                         <td><?php if($psurat_skck<>0) :?><span class="badge badge-danger"><?php endif; ?>
                         <?php if($psurat_skck==0) :?><span class="badge badge-success"><?php endif; ?><?= $psurat_skck; ?>  </span></td>
                        
                      </tr>
                       <tr>
                        <td>Surat Usaha</td>
                        <td><?= $surat_usaha; ?>  </td>
                                                <td><?php if($psurat_usaha<>0) :?><span class="badge badge-danger"><?php endif; ?>
                         <?php if($psurat_usaha==0) :?><span class="badge badge-success"><?php endif; ?><?= $psurat_usaha; ?> </span></td>
                        
                      </tr>

                    </tbody>
                  </table>
                </div>
                   </div>
               </div>
           </div>
          
 <div class="col-xl-4 col-lg-7">

               <!-- Area Chart -->
               <div class="card shadow mb-4">

                   <div class="card-header py-3 bg-gradient-light">
                       <h6 class="m-0 font-weight-bold text-info">Statistik Kegiatan</h6>
                   </div>
                   <div class="card-body">

                       <div id="kegiatan"></div>
                   </div>
               </div>
           </div>
            <div class="col-xl-4 col-lg-7">

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

       </div>
           



    <!-- Main content -->
   

         
                
              </div>
            
       



          <!-- Modal Logout -->
         

        </div>
        <!---Container Fluid-->
      <script type="text/javascript">
jQuery(function(){
 new Highcharts.Chart({
  chart: {
   renderTo: 'kegiatan',
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
   categories: ['Kegiatan'],
   
  },
  yAxis: {
   title: {
    text: 'Jumlah Kegiatan'
   }
  },
  series: [
  <?php $jenis_kegiatan = $this->db->query("Select * from jenis_kegiatan");
                         foreach ($jenis_kegiatan->result() as $rowjenis_kegiatan) {
                           $jenis_kegiatan=$rowjenis_kegiatan->nama_jenis_kegiatan;
                           $id_jenis_kegiatan=$rowjenis_kegiatan->id_jenis_kegiatan;

                      $kegiatan = $this->db->query("Select count(id_jenis_kegiatan) as jumlah from penugasan where id_jenis_kegiatan='$id_jenis_kegiatan'");
                         foreach ($kegiatan->result() as $rowkegiatan) {
                           $jumlah=$rowkegiatan->jumlah;
                      
                          }  ?>
                          {
                      name: '<?php echo $jenis_kegiatan; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                          <?php } ?>
  ]
 });
}); 
</script>