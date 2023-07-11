<div class="container-fluid" id="container-wrapper">
<div class="row">

    <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Tambah Surat Pengadilan</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open('operator/tambah_surat_pengadilan'); ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIK</label>
                      <select name="id_ktp" class="select2-single form-control" id="select2Single">
                    <?php 
                                      
                                        foreach ($dt_ktp as $d): ?>
                     <option value="<?php echo $d['id_ktp']; ?>"><?php echo $d['nik']; ?> <?php echo $d['nama']; ?></option>
                   <?php endforeach; ?>
                     </select>
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pendidikan</label>
                      <input type="text" name="pendidikan" class="form-control">
                    </div>

                    <!-----------------------------------------------------------------------------------------
                     
                     <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Surat</label>
                      <input type="date" name="tanggal_surat" class="form-control">
                    </div>
                    ----------------------------------------------------------------------------------------->
                     

                      <div class="form-group">
                      <label for="exampleInputEmail1">Nomor Surat</label>
                      <input type="text" name="no_surat" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Yang Bertanda Tangan</label>
                      <select name="tanda_tangan" class="form-control">
                    <?php 
                                      
                                        foreach ($dt_pegawai as $d): ?>
                     <option value="<?php echo $d['id_pgw']; ?>"><?php echo $d['nama_peg']; ?> - <?php echo $d['jabatan']; ?></option>
                   <?php endforeach; ?>
                     </select>
                    
                    </div>
                 
                    <input type="submit" name="submit" class="btn btn-info" value="Tambah">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>