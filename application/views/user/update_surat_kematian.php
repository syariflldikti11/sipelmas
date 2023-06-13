<div class="container-fluid" id="container-wrapper">
<div class="row">

    <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Update Surat Kematian</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open('user/update_surat_kematian'); ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIK</label>
                      <input type="hidden" name="id_surat_kematian" value="<?php echo $d['id_surat_kematian']; ?>" class="form-control">
                      <select name="id_ktp" class="select2-single form-control" id="select2Single">
                    <?php 
                                       $id_ktp=$d['id_ktp'];
                                        foreach ($dt_ktp as $a): ?>
                     <option value="<?php echo $a['id_ktp']; ?>" <?php if($a['id_ktp']==$id_ktp) { echo ' selected="selected"';}   ?>><?php echo $a['nik']; ?> <?php echo $a['nama']; ?></option>
                   <?php endforeach; ?>
                     </select>
                    
                    </div>
                    
                    
                     <div class="form-group">
                      <label for="exampleInputEmail1">Hari</label>
                      <input type="text" name="hari" value="<?php echo $d['hari']; ?>" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Pukul</label>
                      <input type="text" name="pukul" value="<?php echo $d['pukul']; ?>" class="form-control">
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Bertempat</label>
                      <input type="text" name="bertempat" value="<?php echo $d['bertempat']; ?>" class="form-control">
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Dimakamkan</label>
                      <input type="text" name="dimakamkan" value="<?php echo $d['dimakamkan']; ?>" class="form-control">
                    
                    </div>

                    
                    <input type="submit" name="submit" class="btn btn-info" value="Update">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>