<div class="container-fluid" id="container-wrapper">
<div class="row">

	  <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Tambah Informasi</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open('admin/tambah_informasi'); ?>
                   
                    
                     <div class="form-group">
                      <label for="exampleFormControlTextarea1">Isi Informasi 1</label>
                      <textarea class="form-control" name="isi_informasi" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Isi Informasi 2</label>
                      <textarea class="form-control" name="informasi" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    
                 
                    <input type="submit" name="submit" class="btn btn-info" value="Submit">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>