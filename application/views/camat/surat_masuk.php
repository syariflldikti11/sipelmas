    <div class="container-fluid" id="container-wrapper">
         
     <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Data Surat Masuk <a class="btn btn-info btn-sm" href="<?php echo base_url('admin/tambah_surat_masuk'); ?>">Tambah </a> </h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                      
                      
                         <th>No</th>
                                <th>No Surat</th>
                                <th>Perihal</th>
                                <th>Pengirim</th>
                                <th>Tgl Surat</th>
                                <th>Tgl Diterima</th>
                            
                        <th>File </th>
                        <th width="100px">Opsi</th>
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_surat_masuk as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                         <td><?php echo $d['no_surat']; ?></td>
                        <td><?php echo $d['perihal']; ?></td>
                        <td><?php echo $d['pengirim']; ?></td>
                        <td><?php echo $d['tgl_surat']; ?></td>
                        <td><?php echo $d['tgl_diterima']; ?></td>
            
                        <td><a href="<?php echo base_url(); ?>upload/file/<?php echo $d["file"] ?>"><?php echo $d["file"] ?></td>
                     
                       
                        <td><a class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus data ini')"  href="<?php echo base_url('admin/delete_surat_masuk/'.$d['id_surat_masuk']);?>"> <i class="fas fa-trash"></i> </a>  </a>  <a class="btn btn-info btn-sm"   href="<?php echo base_url('admin/edit_surat_masuk/'.$d['id_surat_masuk']);?>"> <i class="fas fa-fw fa-edit"></i> </a></td>
                        
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
