    <div class="container-fluid" id="container-wrapper">
         
     <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Data Permohonan Surat Kematian <a class="btn btn-info btn-sm" href="<?php echo base_url('user/tambah_surat_kematian'); ?>">Tambah </a></h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                      
                        <th>Nama_Lengkap</th>
                       
                        <th>Tmpt_Tgl_Lahir</th>
                       
                        <th>Alamat_Rmh </th>
                        <th>RT</th>
                        <th>Hari </th>
                        <th>Pukul </th>
                        <th>Bertempat </th>
                        <th>Dimakamkan </th>
                        
                        <th>Status</th>
                      
                        <th>Opsi</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_surat_kematian as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        
                        <td><?php echo $d['nama']; ?></td>

                        <td><?php echo $d['tempat_lahir']; ?>, <?php echo $d['tanggal_lahir']; ?></td>
                        
                        <td><?php echo $d['alamat']; ?></td>
                        <td><?php echo $d['rt']; ?></td>
                        <td><?php echo $d['hari']; ?></td>
                        <td><?php echo $d['pukul']; ?></td>
                        <td><?php echo $d['bertempat']; ?></td>
                        <td><?php echo $d['dimakamkan']; ?></td>
                       
                        <td><?php echo $d['status']; ?></td>
                         <td>
                            <?php if($d['status']=='Selesai'):?>
 <a class="btn btn-success btn-sm"   href="<?php echo base_url('admin/print_surat_kematian/'.$d['id_surat_kematian']);?>"> <i class="fas fa-fw fa-print"></i> </a>
<?php endif; ?>

<?php if($d['status']!='Selesai'):?>
  <a class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus data ini')"  href="<?php echo base_url('user/delete_surat_kematian/'.$d['id_surat_kematian']);?>"> <i class="fas fa-trash"></i> </a>  </a>  <a class="btn btn-info btn-sm"   href="<?php echo base_url('user/update_surat_kematian/'.$d['id_surat_kematian']);?>"> <i class="fas fa-fw fa-edit"></i> </a>
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
