    <div class="container-fluid" id="container-wrapper">
         
     <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Data Pengajuan Proposal <a class="btn btn-info btn-sm" href="<?php echo base_url('user/tambah_proposal'); ?>">Tambah </a></h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                    
                        <th>Nama_Lengkp</th>
                          <th>Alamat</th>
                          <th>RT</th>
                        <th>Tanggal_Pengajuan</th>
                        <th>Mengajukan_Tentang</th>
                        <th>File</th>
                        <th>No Telpon</th>
                        <th>Status</th>
                          <th>Opsi</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_proposal as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                    
                        <td><?php echo $d['nama']; ?></td>
                        
                        <td><?php echo $d['alamat']; ?></td>
                        <td><?php echo $d['rt']; ?></td>
                        <td><?php echo $d['tgl_proposal']; ?></td>
                       
                        <td><?php echo $d['mengajukan']; ?></td>
                        <td><a href="<?php echo base_url(); ?>upload/file/<?php echo $d["proposal"] ?>"><?php echo $d["proposal"] ?></td>
                        <td><?php echo $d['telp']; ?></td>
                        <td><?php echo $d['status']; ?></td>
                         <td>
                           <?php if($d['status']=='Selesai'):?>

<?php endif; ?>

<?php if($d['status']!='Selesai'):?>
  <a class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus data ini')"  href="<?php echo base_url('user/delete_proposal/'.$d['id_proposal']);?>"> <i class="fas fa-trash"></i> </a>  </a>  <a class="btn btn-info btn-sm"   href="<?php echo base_url('user/edit_proposal/'.$d['id_proposal']);?>"> <i class="fas fa-fw fa-edit"></i> </a>
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
