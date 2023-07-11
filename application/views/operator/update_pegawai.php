<div class="container-fluid" id="container-wrapper">
<div class="row">

	  <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Update Data Pegawai</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open('admin/update_pegawai'); ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                         <input type="hidden" value="<?php echo $d['id_pgw'];?>"  name="id_pgw" class="form-control">
                      <input type="text" name="nama_peg" value="<?php echo $d['nama_peg'];?>" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">NIK</label>
                      <input type="text" name="nik" value="<?php echo $d['nik'];?>" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Jabatan</label>
                      <select class="form-control" name="jabatan">
                        <option value="Camat" <?php if($d['jabatan']=='Camat') echo 'selected'; ?>>Camat</option>
                      <option value="Sekretaris Camat" <?php if($d['jabatan']=='Sekretaris Camat') echo 'selected'; ?>>Sekretaris Camat</option>
                        <option value="Staff" <?php if($d['jabatan']=='Staff') echo 'selected'; ?>>Staff</option>
                       
                      </select>
                    
                    </div>

                     <div class="form-group">
                      <label for="exampleInputEmail1">Alamat</label>
                      <input type="text" name="alamat_peg" value="<?php echo $d['alamat_peg'];?>" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">No HP</label>
                      <input type="number" name="telp_peg" value="<?php echo $d['telp_peg'];?>" class="form-control">
                    </div>


                    <!------------------------------------------------------------------------------------------------------->
                    
                     <div class="form-group">
                      <label for="exampleInputEmail1">No WA</label>
                      <input type="number" name="wa_peg" value="<?php echo $d['wa_peg'];?>" class="form-control">
                    </div>
                    <!------------------------------------------------------------------------------------------------------->

                    <input type="submit" name="submit" class="btn btn-info" value="Update">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>