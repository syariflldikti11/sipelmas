<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url(); ?>/asetlogin/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url(); ?>/asetlogin/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/asetlogin/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/asetlogin/css/style.css">

    <title>SIAPKADES Pantai Hambawang</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('<?= base_url(); ?>/assets/images/kantor.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <center><img src="<?php echo base_url(); ?>assets/img/logobatola.png" style="max-height: 90px"> </center><br />
            <h4>Login SIAPKADES Pantai Hambawang</h4>
             <?php
                     echo form_open('login/auth'); ?>
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" name="nik" class="form-control"  id="username">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" >
              </div>
               <div class="form-group last mb-3">
                     <select class="form-control" name="akses_login"> 
                     <option>Pilih Akses Login</option> 
                     <option value="pengunjung">Penduduk</option> 
                     <option value="admin">Admin</option> 

                     </select>
                    </div>
              
              <div class="d-flex mb-5 align-items-center">
               
                <span class="ml-auto"><a href="<?php echo base_url('register'); ?>" class="forgot-pass">Buat Akun</a></span> 
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-info">

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
   <div id="modal" class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout"> SIAPKADES Pantai Hambawang</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                Selamat datang di Aplikasi SIAPKADES PANTAI HAMBAWANG <br/ >
                Pantai Hambawang adalah salah satu desa yang terletak di Kecamatan Mandastana, Kabupaten Barito Kuala, Provinsi Kalimantan Selatan.
                </div>
              
              </div>
            </div>
          </div>

    

    <script src="<?= base_url(); ?>asetlogin/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url(); ?>asetlogin/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>asetlogin/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>asetlogin/js/main.js"></script>
     <script>
  $('#modal').modal('show');
</script>
    
  </body>
</html>