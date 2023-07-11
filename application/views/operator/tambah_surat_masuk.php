<div class="container-fluid" id="container-wrapper">
<div class="row">

	  <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h3 class="m-0 font-weight-bold text-info">Form Tambah Data Surat Masuk</h3>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open_multipart('operator/simpan_surat_masuk'); ?>
                   <div class="form-group">
                        <label for="exampleInputEmail1">No Surat</label>
                        <input type="text" class="form-control"  name="no_surat"  required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Pengirim</label>
                        <input type="text" class="form-control"  name="pengirim" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Perihal</label>
                        <input type="text" class="form-control"  name="perihal"  required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Tgl Surat</label>
                        <input type="date" class="form-control"  name="tgl_surat"  required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Tgl Diterima</label>
                        <input type="date" class="form-control"  name="tgl_diterima"  required >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">File Surat</label>
                        <input type="file" class="form-control"  name="file"  required >
                        
                      </div>
                    
                 
                    <input type="submit" class="btn btn-info" value="Submit">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>