    <div class="container-fluid" id="container-wrapper">
         
     <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Data Pengaduan </h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        
                        <th>Nama</th>
                          <th>Alamat</th>
                          <th>RT</th>
                          <th>waktu pengaduan</th>
                        <th>Mengadu</th>
                        <th>Balasan</th>
                        <th>No Telpon</th>
                      
                      
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_pengaduan as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                         
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['alamat']; ?></td>
                        <td><?php echo $d['rt']; ?></td>
                        <td><?php echo $d['tgl_pengaduan']; ?></td>
                        <td><?php echo $d['mengadu']; ?></td> 
                        <td><?php echo $d['balasan']; ?></td>
                          <td><?php echo $d['peng_telpon']; ?></td>
                          
                      

                        
                        
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
