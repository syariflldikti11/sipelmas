    <div class="container-fluid" id="container-wrapper">
         
     <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Data Surat Keluar <a class="btn btn-info btn-sm" href="<?php echo base_url('operator/tambah_surat_keluar'); ?>">Tambah </a> </h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                      
                      
                         <th>No</th>
                                <th>No Surat</th>
                                <th>Perihal</th>
                                <th>Tujuan</th>
                                <th>Tgl Surat</th>
                                <th>Tgl Kirim</th>
                            
                        <th>File </th>
                        <th width="100px">Opsi</th>
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_surat_keluar as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                         <td><?php echo $d['no_surat']; ?></td>
                        <td><?php echo $d['perihal']; ?></td>
                        <td><?php echo $d['tujuan']; ?></td>
                        <td><?php echo $d['tgl_surat']; ?></td>
                        <td><?php echo $d['tgl_kirim_surat']; ?></td>
            
                        <td><a href="<?php echo base_url(); ?>upload/file/<?php echo $d["file"] ?>"><?php echo $d["file"] ?></td>
                     
                       
                        <td><a class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus data ini')"  href="<?php echo base_url('operator/delete_surat_keluar/'.$d['id_surat_keluar']);?>"> <i class="fas fa-trash"></i> </a>  </a>  <a class="btn btn-info btn-sm"   href="<?php echo base_url('operator/edit_surat_keluar/'.$d['id_surat_keluar']);?>"> <i class="fas fa-fw fa-edit"></i> </a></td>
                        
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
