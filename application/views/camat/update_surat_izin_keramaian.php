<div class="container-fluid" id="container-wrapper">
<div class="row">

    <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Update Surat Izin Keramaian</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open_multipart('camat/simpan_surat_izin_keramaian'); ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIK</label>
                      <input type="hidden" name="id_surat_izin_keramaian" value="<?php echo $d['id_surat_izin_keramaian']; ?>" class="form-control">
                      <select name="id_ktp" class="select2-single form-control" id="select2Single">
                    <?php 
                                       $id_ktp=$d['id_ktp'];
                                        foreach ($dt_ktp as $a): ?>
                     <option value="<?php echo $a['id_ktp']; ?>" <?php if($a['id_ktp']==$id_ktp) { echo ' selected="selected"';}   ?>><?php echo $a['nik']; ?> <?php echo $a['nama']; ?></option>
                   <?php endforeach; ?>
                     </select>
                    
                    </div>
                    
                   

                      <div class="form-group">
                      <label for="exampleInputEmail1">Dalam Rangka</label>
                      <input type="text" name="dalam_rangka" value="<?php echo $d['dalam_rangka']; ?>" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Hari </label>
                      <input type="text" name="hari" value="<?php echo $d['hari']; ?>" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal</label>
                      <input type="text" name="tanggal" value="<?php echo $d['tanggal']; ?>" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Tempat</label>
                      <input type="text" name="tempat" value="<?php echo $d['tempat']; ?>" class="form-control">
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Surat</label>
                      <input type="date" name="tanggal_surat" value="<?php echo $d['tanggal_surat']; ?>" class="form-control">
                    </div>
                      <div class="form-group">
                      <label for="exampleInputEmail1">Nomor Surat</label>
                      <input type="text" name="no_surat" value="<?php echo $d['no_surat']; ?>" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Yang Bertanda Tangan</label>
                      <select name="tanda_tangan" class="form-control">
                    <?php 
                                     $tanda_tangan=$d['tanda_tangan'];  
                                        foreach ($dt_pegawai as $b): ?>
                     <option value="<?php echo $b['id_pgw']; ?>" <?php if($b['id_pgw'] ==$tanda_tangan) { echo ' selected="selected"';}   ?>><?php echo $b['nama_peg']; ?> - <?php echo $b['jabatan']; ?></option>
                   <?php endforeach; ?>
                     </select>
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Status</label>
                      <select name="status" class="form-control" >
                  
                      <option value="Selesai" <?php if($d['status']=='Selesai') echo 'selected'; ?>>Selesai</option>
                     <option value="Ditolak" <?php if($d['status']=='Ditolak') echo 'selected'; ?>>Ditolak</option>
                     </select>
                    
                    </div>
                     
                      <input type="hidden" name="file" class="form-control" id="exampleInputPasswordRepeat"
                        >
                         <input type="hidden" name="old_image" value="<?php echo $d['file']; ?>" class="form-control">
                    
                 
                    <input type="submit" class="btn btn-info" value="Update">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>