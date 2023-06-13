<div class="container-fluid" id="container-wrapper">
<div class="row">

    <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Update Surat Permohonan SKCK</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open_multipart('user/update_surat_skck'); ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIK</label>
                      <input type="hidden" name="id_surat_skck" value="<?php echo $d['id_surat_skck']; ?>" class="form-control">
                      <select name="id_ktp" class="select2-single form-control" id="select2Single">
                    <?php 
                                       $id_ktp=$d['id_ktp'];
                                        foreach ($dt_ktp as $a): ?>
                     <option value="<?php echo $a['id_ktp']; ?>" <?php if($a['id_ktp']==$id_ktp) { echo ' selected="selected"';}   ?>><?php echo $a['nik']; ?> <?php echo $a['nama']; ?></option>
                   <?php endforeach; ?>
                     </select>
                    
                    </div>
                    
                   

                      <div class="form-group">
                      <label for="exampleInputEmail1">Keperluan</label>
                      <input type="text" name="keperluan" value="<?php echo $d['keperluan']; ?>" class="form-control">
                    
                    </div>
                    
                    <input type="submit" class="btn btn-info" value="Update">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>