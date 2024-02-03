    <div class="container-fluid" id="container-wrapper">
         
     <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Data Permohonan Surat Usaha <a class="btn btn-info btn-sm" href="<?php echo base_url('user/tambah_surat_usaha'); ?>">Tambah </a></h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                    
                        <th>Nama_Lengkap</th>
                        
                    
                        <th>Alamat</th>
                        <th>RT</th>
                        <th>Jenis Usaha</th>
                        <th>Nama Usaha</th>
                        <th>Alamat Usaha</th>
                        <th>Berkas</th>
                      
                        <th>Status</th>
               
                        <th>Opsi</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_surat_usaha as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                         
                        <td><?php echo $d['nama']; ?></td>
                        
                        <td><?php echo $d['alamat']; ?></td>
                        <td><?php echo $d['rt']; ?></td>
                        <td><?php echo $d['jenis_usaha']; ?></td>
                        <td><?php echo $d['nama_usaha']; ?></td>
                        <td><?php echo $d['alamat_usaha']; ?></td>
                            <td><a target="_blank" href="<?= base_url(); ?>upload/file/<?= $d['file']; ?>">File </a></td>
                        <td><?php echo $d['status']; ?></td>
                         <td>
<?php if($d['status']=='Selesai'):?>
 <a class="btn btn-success btn-sm"   href="<?php echo base_url('admin/print_surat_usaha/'.$d['id_surat_usaha']);?>"> <i class="fas fa-fw fa-print"></i> </a>
<?php endif; ?>

<?php if($d['status']!='Selesai'):?> 
                          <a class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus data ini')"  href="<?php echo base_url('user/delete_surat_usaha/'.$d['id_surat_usaha']);?>"> <i class="fas fa-trash"></i> </a>  </a>  <a class="btn btn-info btn-sm"   href="<?php echo base_url('user/update_surat_usaha/'.$d['id_surat_usaha']);?>"> <i class="fas fa-fw fa-edit"></i> </a>
                        <?php endif; ?></td>
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
