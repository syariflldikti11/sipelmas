 <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Daftar Pengaduan Masyarakat</h4>
               
                </div>
              </div>
              <div class="card-body">
               
                 <div class="table-responsive p-3">
                  <table class="table" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th >No</th>
                        
       
                        <th >Pengaduan</th>
                        <th >Balasan</th>

                        
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_pengaduan as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>

                        <td ><?php echo $d->mengadu; ?></td> 
                        <td ><?php echo $d->balasan; ?></td>
                          
                      

                       
                        
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                
                 
                 
              </div>
            </div>
          </div>
        </div>
      </div>
    
    </div>
  </main>