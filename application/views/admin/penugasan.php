    <div class="container-fluid" id="container-wrapper">
         
     <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Data Kegiatan <a class="btn btn-info btn-sm" href="<?php echo base_url('admin/tambah_penugasan'); ?>">Tambah </a> </h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                    <th>No</th>
                        
                                <th>No Surat Tugas</th>
                                <th>Tanggal Surat Tugas</th>
                                <th>Jenis Kegiatan</th>
                                <th>Nama Kegiatan</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Laporan</th>
                                <th>Catatan Pimpinan</th>
                        <th>Opsi</th>
                         
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_penugasan as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                           <td><?= $d->no_surat; ?></td>
                          <td><?= $d->tgl_surat; ?></td>
                        <td><?= $d->nama_jenis_kegiatan; ?></td>
                        <td><?= $d->nama_penugasan; ?></td>
                     
                        <td><?= $d->tgl_mulai; ?> s/d <?= $d->tgl_akhir; ?></td>
                        <td><?php if($d->file==NULL): ?><span class="badge badge-pill badge-warning">Belum Upload Laporan</span><?php endif; ?> <?php if($d->file!=NULL): ?><a target="_blank" href="<?= base_url();?>upload/<?= $d->file; ?>"><i class="fa fa-file fa-sm"></i></a><?php endif; ?>
                          </td>
                             <td><?= $d->catatan_pimpinan; ?></td>
                       
                       
                        <td><a class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus data ini')"  href="<?php echo base_url('admin/delete_penugasan/'.$d->id_penugasan);?>"> <i class="fas fa-trash"></i> </a>  </a>  <a class="btn btn-info btn-sm"   href="<?php echo base_url('admin/update_penugasan/'.$d->id_penugasan);?>"> <i class="fas fa-fw fa-edit"></i> </a> <a class="btn btn-success btn-sm"   href="<?php echo base_url('admin/peserta_penugasan/'.$d->id_penugasan);?>"> <i class="fas fa-fw fa-users"></i> </a></td>
                        
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
