<div class="container-fluid" id="container-wrapper">
<div class="row">

    <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Tambah Surat Usaha</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open_multipart('user/tambah_surat_usaha'); ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIK</label>
                      <select name="id_ktp" id="id_ktp" class="select2-single form-control " onchange="changeValuee(this.value)" >
                                 <option value="">-Pilih-</option>        
               <?php

                $jsArrayy = "var prdNamee = new Array();\n";
              foreach ($dt_ktp as $row) {
                
                echo '<option   value="' . $row['id_ktp'] . '">' . $row['nik'] . ' ' . $row['nama'] . '</option>';  
 $jsArrayy .= "prdNamee['" . $row['id_ktp'] . "'] = {opt_alamat:'" . addslashes($row['alamat']) . "',opt_tempat_lahir:'".addslashes($row['tempat_lahir'])."',opt_tgl_lahir:'".addslashes($row['tanggal_lahir'])."'};\n";
                
              }
              ?>
               
                            </select>
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Alamat </label>
                      <input type="text"  class="form-control" id="opt_alamat" readonly>
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Tempat Lahir </label>
                      <input type="text"  class="form-control" id="opt_tempat_lahir" readonly>          
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Lahir </label>
                      <input type="text"  class="form-control" id="opt_tgl_lahir" readonly>          
                    </div>
                    
                     <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Usaha</label>
                      <input type="text" name="jenis_usaha" class="form-control" >
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Usaha</label>
                      <input type="text" name="nama_usaha" class="form-control" >
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Alamat Usaha</label>
                      <input type="text" name="alamat_usaha" class="form-control" >
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Berkas</label>
                      <input type="file" name="file" class="form-control">
                    
                    </div>

                   
                 
                    <input type="submit" name="submit" class="btn btn-info" value="Tambah">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>
<script type="text/javascript"> 
<?php echo $jsArrayy; ?>
function changeValuee(id){
    document.getElementById('opt_alamat').value = prdNamee[id].opt_alamat;
    document.getElementById('opt_tempat_lahir').value = prdNamee[id].opt_tempat_lahir;
        document.getElementById('opt_tgl_lahir').value = prdNamee[id].opt_tgl_lahir;
};
</script>