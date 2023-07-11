<div class="container-fluid" id="container-wrapper">
<div class="row">

    <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Update Pengajuan BLT</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open('operator/simpan_pengajuan_blt'); ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIK</label>
                       <input type="hidden" name="id_pengajuan" value="<?php echo $d['id_pengajuan']; ?>" class="form-control">
                      <select name="id_ktp" class="select2-single form-control" id="select2Single">
                    <?php 
                                       $id_ktp=$d['id_ktp'];
                                        foreach ($dt_ktp as $a): ?>
                     <option value="<?php echo $a['id_ktp']; ?>" <?php if($a['id_ktp']==$id_ktp) { echo ' selected="selected"';}   ?>><?php echo $a['nik']; ?> <?php echo $a['nama']; ?></option>
                   <?php endforeach; ?>
                     </select>
                    
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Pekerjaan</label>
                      <input type="text" name="pekerjaann" value="<?php echo $d['pekerjaann']; ?>" class="form-control">
                    </div>
                    
                     <div class="form-group">
                      <label for="exampleInputEmail1">Penghasilan</label>
                      <input type="number" name="penghasilan" value="<?php echo $d['penghasilan']; ?>" class="form-control">
                    </div>

                   
                    <!----------------------------------------------------------------------------------------------------------
                     <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Pengajuan</label>
                      <input type="date" name="tanggal" value="<?php echo $d['tanggal']; ?>" class="form-control">
                    </div>
                    ---------------------------------------------------------------------------------------------------------------------->
                     <div class="form-group">
                      <label for="exampleInputEmail1">Status</label>
                      <select name="status" class="form-control" >
                  
                     <option value="Proses" <?php if($d['status']=='Proses') echo 'selected'; ?>>Proses</option>
                     <option value="Ditolak" <?php if($d['status']=='Ditolak') echo 'selected'; ?>>Ditolak</option>
                     <option value="Diterima" <?php if($d['status']=='Diterima') echo 'selected'; ?>>Diterima</option>
                
                     </select>
                    
                    </div>
                     
                 
                    <input type="submit" class="btn btn-info" value="Update">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>