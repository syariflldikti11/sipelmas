    <div class="container-fluid" id="container-wrapper">
         
     <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Data Permohonan Surat Penguasaan Fisik Bidang Tanah (Biodek) <a class="btn btn-info btn-sm" href="<?php echo base_url('admin/tambah_surat_biodek'); ?>">Tambah </a>  </h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>

                        <th>Nama Lengkap</th>
                        <th>Alamat Rmh</th>
                        <th>RT</th>
                        <th>TTL</th>
                        <th>No Penguasaan</th>
                        <th>Luas Tanah</th>
                        <th>Tanggal_Surat</th>
                        <th>Nomor_Surat</th>
                        <th>Berkas</th>
                        <th>Status</th>
                       
                        <th>Opsi/Pilihan</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_surat_biodek as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        
                        <td><?php echo $d['nama']; ?></td>

                        <td><?php echo $d['alamat']; ?></td>
                        <td><?php echo $d['rt']; ?></td>
                        <td><?php echo $d['tempat_lahir']; ?>, <?php echo $d['tanggal_lahir']; ?></td>
                        <td><?php echo $d['no_tanah']; ?></td>
                        <td><?php echo $d['luas_tanah']; ?></td>
                        <td><?php echo $d['tanggal_surat']; ?></td>
                        <td><?php echo $d['no_surat']; ?></td>
                        <td><a target="_blank" href="<?= base_url(); ?>upload/file/<?= $d['file']; ?>">File </a></td>
                        <td><?php echo $d['status']; ?></td>
                          
                         <td><a class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus data ini')"  href="<?php echo base_url('admin/delete_surat_biodek/'.$d['id_surat_biodek']);?>"> <i class="fas fa-trash"></i> </a>  </a>  <a class="btn btn-info btn-sm"   href="<?php echo base_url('admin/update_surat_biodek/'.$d['id_surat_biodek']);?>"> <i class="fas fa-fw fa-edit"></i> </a>  <a class="btn btn-success btn-sm"   href="<?php echo base_url('admin/print_surat_biodek/'.$d['id_surat_biodek']);?>"> <i class="fas fa-fw fa-print"></i> </a></td>
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
