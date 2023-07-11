 <div class="container-fluid" id="container-wrapper">
        

          <div class="row mb-3">
   
               <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h4 class="m-0 font-weight-bold text-black">Selamat Datang Di Pelayanan Masyarakat Kecamatan Kertak Hanyar</h4>
                </div>

           
                

            
                  <hr>
                 <div class="card-body">
                  
                 <textle style = "color : blue;">  Lengkapi data diri anda untuk melakukan pelayanan pada menu master data lalu pilih ktp</b></text>
                </div> 
             

            </div>
             
           
          </div>
          <div class="col-xl-6 col-lg-5 ">
              <div class="card">
                <div class="card-header py-4 bg-info d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-light">Informasi Pelayanan</h6>
                </div>
                <div>
                  <?php 
                                        $no=1;
                                        foreach ($dt_informasi as $d): ?>
                  <div class="customer-message align-items-center">
                    <a class="font-weight-bold" href="#">
                      <div class="text-truncate message-title"><?php echo $d['isi_informasi']; ?></div>
                      
                    </a>
                  </div>
                  <?php endforeach; ?>
                
                  <div class="card-footer text-center">
                    <a class="m-0 small text-primary card-link" href="<?php echo base_url('user/informasi');?>">Lihat Lampiran <i
                        class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-5 ">
              <div class="card">
                <div class="card-header py-4 bg-info d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-light">Pengaduan Masyarakat</h6>
                </div>
                <div>
                  <?php 
                                        $no=1;
                                        foreach ($dt_pengaduan as $d): ?>
                  <div class="customer-message align-items-center">
                    <a class="font-weight-bold" href="#">
                      <div class="text-truncate message-title"><?php echo $d['mengadu']; ?></div>
                      <div class="small text-gray-500 message-time font-weight-bold">Balasan : <?php echo $d['mengadu']; ?></div>
                    </a>
                  </div>
                  <?php endforeach; ?>
                
                  <div class="card-footer text-center">
                    <a class="m-0 small text-primary card-link" href="<?php echo base_url('user/pengaduan_masyarakat');?>">Lihat Semua <i
                        class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

       

      

        </div>
        <!---Container Fluid-->
      