 <div class="container-fluid" id="container-wrapper">
        

          <div class="row mb-3">
   
               <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h4 class="m-0 font-weight-bold text-black">Selamat Datang Di Pelayanan Administrasi Kantor Desa Pantai Hambawang</h4>
                </div>

           
                

            
                  <hr>
                 <div class="card-body">
                  
                 <textle style = "color : red;">  #Catatan - Apabila tidak bisa melakukan PELAYANAN, <b>silahkan KLIK IKON di pojok atas kanan web lalu KLIK DATA SAYA lalu TAMBAH AKUN</b></text>
                </div> 
             

            </div>
             
           
          </div>
            <div class="col-xl-12 col-lg-5 ">
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
      