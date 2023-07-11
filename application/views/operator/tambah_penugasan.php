<div class="container-fluid" id="container-wrapper">
<div class="row">

	  <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h3 class="m-0 font-weight-bold text-info">Form Tambah Kegiatan</h3>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open('operator/tambah_penugasan'); ?>
      <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Kegiatan</label>
                        <select class="select2-single form-control "  name="id_jenis_kegiatan" required>
                       
                          <option value="">--Pilih Jenis kegiatan--</option>
                        <?php foreach ($dt_jenis_kegiatan as $t) :?>
                          <option value="<?= $t->id_jenis_kegiatan; ?>"><?= $t->nama_jenis_kegiatan; ?></option>
                          <?php endforeach;?>
                          </select>
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">No Surat Tugas</label>
                        <input type="text" class="form-control"  name="no_surat" required  >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Tangal Surat</label>
                        <input type="date" class="form-control"  name="tgl_surat" required  >
                        
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kegiatan</label>
                        <input type="text" class="form-control"  name="nama_penugasan"  required  >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Tangal Mulai</label>
                        <input type="date" class="form-control"  name="tgl_mulai" required  >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Tangal Akhir</label>
                        <input type="date" class="form-control"  name="tgl_akhir" required  >
                        
                      </div>
 <input type="submit" name="submit" class="btn btn-info" value="Tambah">
                  </form>

</div>
              </div>


         
            </div>
</div>
</div>