    <div class="container-fluid" id="container-wrapper">
         
     <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Data KTP Saya
  <?php 
                                        $no=1;
                                        foreach ($dt_ktp as $d): ?>
                                          <?php  $no++; ?>
                                             <?php endforeach; ?>
                   <?php if($no==1) :?> <a class="btn btn-info btn-sm" href="<?php echo base_url('user/tambah_ktp'); ?>">Tambah </a> <?php endif; ?>
                    </h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                      
                        <th>NIK</th>
                        <th>Nama</th>
                         
                          <th>Alamat</th>
                        <th>Desa</th>
                        <th>RT</th>
                        <th>Agama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>JK</th>
                        <th>Kewarganegaraan</th>
                        <th>Pekerjaan</th>
                        <th>Status Nikah</th>
                        <th>File KTP</th>
                          <th width="100px">Opsi</th>
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_ktp as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                         <td><?php echo $d['nik']; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['alamat']; ?></td>
                        <td><?php echo $d['desa']; ?></td>
                        <td><?php echo $d['rt']; ?></td>
                        <td><?php echo $d['agama']; ?></td>
                        <td><?php echo $d['tempat_lahir']; ?></td>
                        <td><?php echo $d['tanggal_lahir']; ?></td>
                        <td><?php echo $d['jkelamin']; ?></td>
                        <td><?php echo $d['wnegara']; ?></td>
                        <td><?php echo $d['pekerjaan']; ?></td>
                        <td><?php echo $d['snikah']; ?></td>
                        <td><a href="<?php echo base_url(); ?>upload/file/<?php echo $d["ftoktp"] ?>"><?php echo $d["ftoktp"] ?></td>
                            <td> <a class="btn btn-info btn-sm"   href="<?php echo base_url('user/edit_ktp/'.$d['id_ktp']);?>"> <i class="fas fa-fw fa-edit"></i> </a></td>
                     
                       
                       
                        
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
