    <div class="container-fluid" id="container-wrapper">
         
     <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan BLT <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/tambah_pengajuan_blt'); ?>">Tambah </a> <a class="btn btn-success btn-sm" href="<?php echo base_url('admin/cetak_pengajuan_blt'); ?>">Cetak Semua </a></h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama_Lengkp</th>
                        <th>Alamat_Rmh</th>
                        <th>Desa</th>
                        <th>RT</th>
                        <th>Pekerjaan</th>
                        <th>Penghasilan </th>
                        <th>Ekonomi </th>
                        <th>Tanggal_Pengaju</th>
                        <th>No Telpon</th>
                        <th>Status</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_pengajuan_blt as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                         <td><?php echo $d['nik']; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['alamat']; ?></td>
                        <td><?php echo $d['desa']; ?></td>
                        <td><?php echo $d['rt']; ?></td>
                        <td><?php echo $d['pekerjaann']; ?></td>
                        <td><?php echo $d['penghasilan']; ?></td>
                        <td><?php if($d['penghasilan']<1100000) {
                          echo "Kurang Mampu";
                        } 
                        else if ($d['penghasilan']<1600000) {
                           echo "Menengah";
                        }
                        else {
                          echo "Mampu";
                        }
                        ?></td>
                        <td><?php echo $d['tanggal']; ?></td>
                        <td><?php echo $d['pengaju_telpon']; ?></td>
                        <td><?php echo $d['status']; ?></td>
                     <td><a class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus data ini')"  href="<?php echo base_url('admin/delete_pengajuan_blt/'.$d['id_pengajuan']);?>"> <i class="fas fa-trash"></i> </a>  </a>  <a class="btn btn-info btn-sm"   href="<?php echo base_url('admin/update_pengajuan_blt/'.$d['id_pengajuan']);?>"> <i class="fas fa-fw fa-edit"></i> </a></td>
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
