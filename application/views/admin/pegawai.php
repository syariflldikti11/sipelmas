    <div class="container-fluid" id="container-wrapper">
         
     <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Data Pegawai <a class="btn btn-info btn-sm" href="<?php echo base_url('admin/tambah_pegawai'); ?>">Tambah </a> <a class="btn btn-success btn-sm" href="<?php echo base_url('admin/cetak_pegawai'); ?>">Cetak Semua </a></h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                      
                        <th>Nama</th>
                          <th>Jabataan</th>
                          <th>Alamat</th>
                        <th>No HP</th>
                        <th>No WA</th>
                        <th>Opsi</th>
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_pegawai as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                         <td><?php echo $d['nama_peg']; ?></td>
                        <td><?php echo $d['jabatan']; ?></td>
                        <td><?php echo $d['alamat_peg']; ?></td>
                        <td><?php echo $d['telp_peg']; ?></td>

                        <td><?php echo $d['wa_peg']; ?></td>
                     
                       
                        <td><a class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus data ini')"  href="<?php echo base_url('admin/delete_pegawai/'.$d['id_pgw']);?>"> <i class="fas fa-trash"></i> </a>  </a>  <a class="btn btn-info btn-sm"   href="<?php echo base_url('admin/update_pegawai/'.$d['id_pgw']);?>"> <i class="fas fa-fw fa-edit"></i> </a></td>
                        
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
