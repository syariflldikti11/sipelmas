    <div class="container-fluid" id="container-wrapper">
         
     <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Data TTD Laporan  </h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                      
                        <th>NIP</th>
                        <th>Nama</th>
                         
                          <th>Jabatan</th>
                        <th>File</th>
                        <th>Lebar</th>
                        <th width="100px">Opsi</th>
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_ttd_laporan as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                         <td><?php echo $d['nip']; ?></td>
                        <td><?php echo $d['nama_ttd']; ?></td>
                        <td><?php echo $d['jabatan']; ?></td>
                       
                        <td><a href="<?php echo base_url(); ?>upload/file/<?php echo $d["file"] ?>"><?php echo $d["file"] ?></td>
                        <td><?php echo $d['lebar']; ?></td>
                     
                       
                        <td>  <a class="btn btn-info btn-sm"   href="<?php echo base_url('admin/edit_ttd/'.$d['id_ttd']);?>"> <i class="fas fa-fw fa-edit"></i> </a></td>
                        
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
