<div class="container-fluid" id="container-wrapper">
<div class="row">

	  <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h3 class="m-0 font-weight-bold text-info">Form Update Data Surat Masuk</h3>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open_multipart('operator/update_surat_masuk'); ?>
                   <input type="hidden" class="form-control" id="id"  name="id_surat_masuk" value="<?= $d->id_surat_masuk; ?>" required>
                      <div class="form-group">
                        <label for="exampleInputEmail1">No Surat</label>
                        <input type="text" class="form-control"  name="no_surat" value="<?= $d->no_surat; ?>" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Pengirim</label>
                        <input type="text" class="form-control"  name="pengirim" value="<?= $d->pengirim; ?>" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Perihal</label>
                        <input type="text" class="form-control"  name="perihal" value="<?= $d->perihal; ?>" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Tgl Surat</label>
                        <input type="date" class="form-control"  name="tgl_surat" id="tgl_surat" value="<?= $d->tgl_surat; ?>" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Tgl Diterima</label>
                        <input type="date" class="form-control" value="<?= $d->tgl_diterima; ?>"  name="tgl_diterima" id="tgl_diterima" required >
                        
                      </div>
                        <div class="form-group">
                    <label for="exampleInputEmail1">File Surat</label>
                    <input type="file" class="form-control" name="file">

                  </div>
                  <input type="hidden" class="form-control" name="old_file" value="<?= $d->file; ?>" required>
                    
                 
                    <input type="submit" class="btn btn-info" value="Update">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>