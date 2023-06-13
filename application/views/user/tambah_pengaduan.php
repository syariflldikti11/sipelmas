<div class="container-fluid" id="container-wrapper">
<div class="row">

    <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Tambah Pengaduan</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open('user/tambah_pengaduan'); ?>
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
                      <label for="exampleFormControlTextarea1">Mengadu</label>
                      <textarea  name="mengadu" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">No Telpon/Hp</label>
                      <input type="text" name="peng_telpon" class="form-control">
                    </div>

                    
                    
                 
                    <input type="submit" name="submit" class="btn btn-info" value="Tambah">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>