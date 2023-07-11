    <div class="container-fluid" id="container-wrapper">
         
     <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Penerima BLT <a class="btn btn-success btn-sm" href="<?php echo base_url('admin/cetak_penerima_blt'); ?>">Cetak Semua </a> </h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama_Lengkp</th>
                        <th>Alamat</th>
                        <th>Desa</th>
                        <th>RT</th>
                        <th>Pekerjaan</th>
                        <th>Penghasilan </th>
                        <th>Ekonomi </th>
                        <th>Tanggal</th>
                       
                       
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_penerima_blt as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                         <td><?php echo $d['nik']; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['alamat']; ?></td>
                        <td><?php echo $d['desa']; ?></td>
                        <td><?php echo $d['rt']; ?></td>
                        <td><?php echo $d['pekerjaan']; ?></td>
                        <td><?php echo $d['penghasilan']; ?></td>
                        <td><?php if($d['penghasilan']<1100000) {
                          echo "Kurang Mampu";
                        } 
                        else if ($d['penghasilan']<6000000) {
                           echo "Menengah";
                        }
                        else {
                          echo "Mampu";
                        }
                        ?></td>
                        <td><?php echo $d['tanggal']; ?></td>
                      
                   
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
