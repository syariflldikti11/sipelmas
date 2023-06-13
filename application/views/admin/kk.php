    <div class="container-fluid" id="container-wrapper">
         
     <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Data KK <a class="btn btn-info btn-sm" href="<?php echo base_url('admin/tambah_kk'); ?>">Tambah </a> </h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                      
                        <th>No KK</th>
                          <th>Kepala Keluarga</th>
                          <th>Alamat_Rumh</th>
                        <th>Desa</th>
                        <th>RT</th>
                        <th>Kecamatan</th>
                        <th>Kabupaten</th>
                        <th>Kode Pos</th>
                        <th>Provinsi</th>
                        <th>File KK</th>
                        <th width="100px">Opsi</th>
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_kk as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                         <td><?php echo $d['no_kk']; ?></td>
                        <td><?php echo $d['kepala_keluarga']; ?></td>
                        <td><?php echo $d['alamat_kk']; ?></td>
                        <td><?php echo $d['desa_kk']; ?></td>
                        <td><?php echo $d['rt_kk']; ?></td>
                        <td><?php echo $d['kecamatan']; ?></td>
                        <td><?php echo $d['kabupaten']; ?></td>
                        <td><?php echo $d['kode_pos']; ?></td>
                        <td><?php echo $d['provinsi']; ?></td>
                        <td><a href="<?php echo base_url(); ?>upload/file/<?php echo $d["foto_kk"] ?>"><?php echo $d["foto_kk"] ?></td>
                     
                       
                        <td><a class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus data ini')"  href="<?php echo base_url('admin/delete_kk/'.$d['id_kk']);?>"> <i class="fas fa-trash"></i> </a>  </a>  <a class="btn btn-info btn-sm"   href="<?php echo base_url('admin/edit_kk/'.$d['id_kk']);?>"> <i class="fas fa-fw fa-edit"></i> </a></td>
                        
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
