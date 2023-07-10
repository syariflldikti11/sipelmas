    <div class="container-fluid" id="container-wrapper">
         
     <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Data Permohonan Surat Usaha <a class="btn btn-info btn-sm" href="<?php echo base_url('camat/tambah_surat_pengadilan'); ?>">Tambah </a> </h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        
                        <th>Tempt.Tgl.Lahir</th>
                        <th>JK</th>
                        
                        <th>Pendidikan</th>
                        <th>Pekerjaan</th>
                        <th>Alamat</th>
                       <th>Tanggal.Surat</th>
                        <th>Nomor.Surat</th>
                        <th>Status</th>
                       
                        <th>Opsi/Pilihan  </th>
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_surat_pengadilan as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                         <td><?php echo $d['nik']; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        
                        <td><?php echo $d['tempat_lahir']; ?>, <?php echo $d['tanggal_lahir']; ?></td>
                        <td><?php echo $d['jkelamin']; ?></td>
                        <td><?php echo $d['pendidikan']; ?></td>
                        <td><?php echo $d['pekerjaan']; ?></td>
                        <td><?php echo $d['alamat']; ?></td>
                        
                        <td><?php echo $d['tanggal_surat']; ?></td>
                        <td><?php echo $d['no_surat']; ?></td>
                        <td><?php echo $d['status']; ?></td>
                       
                         <td><a class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus data ini')"  href="<?php echo base_url('camat/delete_surat_pengadilan/'.$d['id_surat_pengadilan']);?>"> <i class="fas fa-trash"></i> </a>  </a>  <a class="btn btn-info btn-sm"   href="<?php echo base_url('camat/update_surat_pengadilan/'.$d['id_surat_pengadilan']);?>"> <i class="fas fa-fw fa-edit"></i> </a><a class="btn btn-success btn-sm"   href="<?php echo base_url('camat/print_surat_pengadilan/'.$d['id_surat_pengadilan']);?>"> <i class="fas fa-fw fa-print"></i> </a></td>
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
