    <div class="container-fluid" id="container-wrapper">
         
     <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Data Peserta Kegiatan <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#add" href="#">Tambah </a> </h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                    <th>No</th>
                        
                               
                                <th>Pegawai</th>
                        <th>Opsi</th>
                         
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_peserta as $d): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                           <td><?= $d->nama_peg; ?></td>
                         
                       
                        <td><a class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus data ini')"  href="<?php echo base_url('admin/delete_peserta_penugasan/'.$d->id_peserta_penugasan.'/'.$id);?>"> <i class="fas fa-trash"></i> </a> </td>
                        
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>

<div class="modal fade" id="add" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Tambah Peserta Penugasan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/tambah_peserta_penugasan'); ?>
                   <div class="form-group">
                     <input type="hidden" name="id_penugasan" class="form-control" value="<?= $id; ?>"  required  >
                        <label for="exampleInputEmail1">Pegawai</label>
                        <select class="form-control select2" style="width: 100%;"  name="id_pegawai" required>
                       
                          <option value="">--Pilih Pegawai--</option>
                        <?php foreach ($dt_pegawai as $t) :?>
                          <option value="<?= $t->id_pgw; ?>"> <?= $t->nama_peg; ?></option>
                          <?php endforeach;?>
                          </select>
                        
                      </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit"  class="btn btn-primary btn-pill" value="Tambah">
                  </div>
                  </form>
                </div>
              </div>
            </div>