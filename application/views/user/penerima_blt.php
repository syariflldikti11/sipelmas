    <div class="container-fluid" id="container-wrapper">
         
     <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Penerima BLT  </h6>
                </div>
                 <?php 
                                        
                                        foreach ($dt_informasi as $a): ?>
                                      <center>   <b> <?php echo $a['informasi']; ?></b></center>
                                           <?php endforeach; ?>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                       
                        <th>Status </th>
                        <th>File Data Pembagian BLT</th>
                       
                       
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_penerima_blt as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                         <td>
                          <div class="badge badge-success"><?php echo $d['status']; ?></div>
                        </td>
                        <td><a href="<?php echo base_url(); ?>upload/file/<?php echo $a['file']; ?>"><?php echo $a['file']; ?></a></td>
                      
                      
                   
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
