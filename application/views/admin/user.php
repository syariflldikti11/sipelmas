    <div class="container-fluid" id="container-wrapper">
         
     <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Data User <a class="btn btn-info btn-sm" href="<?php echo base_url('admin/tambah_user'); ?>">Tambah </a> </h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
               
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama Pegawai</th>
                                <th>Role</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_user as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                         <td><?php echo $d['nik']; ?></td>
                        <td><?php echo $d['nama_peg']; ?></td>
                        <td><?php if($d['role']==3) {echo 'Pegawai';} ?> <?php if($d['role']==2) {echo 'Admin';} ?></td>
                     
                       
                        <td><a class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus data ini')"  href="<?php echo base_url('admin/delete_user/'.$d['id_pengguna']);?>"> <i class="fas fa-trash"></i> </a></td>
                        
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
