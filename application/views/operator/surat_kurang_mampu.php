    <div class="container-fluid" id="container-wrapper">
         
     <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Data Permohonan Surat Kurang Mampu <a class="btn btn-info btn-sm" href="<?php echo base_url('operator/tambah_surat_kurang_mampu'); ?>">Tambah </a>  </h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                      
                        <th>Nama_Lngkap</th>
                        <th>Alamat_Rmh </th>
                        <th>RT</th>
                        <th>Peruntukan/Penggunaan </th>
                        <th>keperluan </th>
                        <th>Penghasilan </th>
                        <th>Tanggal_Surat</th>
                        <th>Nomor Surat</th>
                        <th>Status</th>
                       
                        <th>Opsi/Pilihan</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_surat_kurang_mampu as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        
                        <td><?php echo $d['nama']; ?></td>
              
                        
                      
                        <td><?php echo $d['alamat']; ?></td>
                          <td><?php echo $d['rt']; ?></td>
                        <td><?php echo $d['peruntukan']; ?></td>
                        <td><?php echo $d['keperluan']; ?></td>
                        <td><?php echo $d['penghasilan']; ?></td>
                         <td><?php echo $d['tanggal_surat']; ?></td>
                        <td><?php echo $d['no_surat']; ?></td>
                        <td><?php echo $d['status']; ?></td>
                         
                         <td><a class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus data ini')"  href="<?php echo base_url('operator/delete_surat_kurang_mampu/'.$d['id_surat_kurang_mampu']);?>"> <i class="fas fa-trash"></i> </a>  </a>  <a class="btn btn-info btn-sm"   href="<?php echo base_url('operator/update_surat_kurang_mampu/'.$d['id_surat_kurang_mampu']);?>"> <i class="fas fa-fw fa-edit"></i> </a> <a class="btn btn-success btn-sm"   href="<?php echo base_url('operator/print_surat_kurang_mampu/'.$d['id_surat_kurang_mampu']);?>"> <i class="fas fa-fw fa-print"></i> </a></td>
                       
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
