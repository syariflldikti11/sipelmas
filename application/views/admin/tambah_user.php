<div class="container-fluid" id="container-wrapper">
<div class="row">

	  <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h3 class="m-0 font-weight-bold text-info">Form Tambah User</h3>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open('admin/simpan_user'); ?>
      <div class="form-group">
                        <label for="exampleInputEmail1">Pegawai</label>
                        <select class="select2-single form-control "  name="id_pegawai">
                       
                          <option>--Pilih Pegawai--</option>
                        <?php foreach ($dt_pegawai as $t) :?>
                          <option value="<?= $t['id_pgw']; ?>"><?= $t['nama_peg']; ?></option>
                          <?php endforeach;?>
                          </select>
                        
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                       <input type="text" class="form-control" name="password" value="12345">
                        
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Akses</label>
                        <select class="form-control"  name="role">
                       
                          <option value='3'>Pegawai</option>
                          <option value='2'>Admin</option>
                          <option value='4'>Pimpinan</option>
                        </select>
                      </div>
 <input type="submit" name="submit" class="btn btn-info" value="Tambah">
                  </form>

</div>
              </div>


         
            </div>
</div>
</div>