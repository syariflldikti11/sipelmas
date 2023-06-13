<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?php echo base_url(); ?>assets/img/logobatola.ico" rel="icon">
  <title>SIAPKADES PANTAI HAMBAWANG - Register</title>
  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/css/ruang-admin.min.css" rel="stylesheet">

</head>


<body class="bg-gradient-login" background="assets/images/kantor.jpg">

  <!-- Register Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                 <div class="text-center">
                    <img src="<?php echo base_url(); ?>assets/img/logobatola.png" style="max-height: 90px">
                    <h1 class="h4 text-gray-900 mb-4">Buat Akun SIAPKADES</h1>
                  </div>
                  <?php
                     echo form_open_multipart('register/create'); ?>
                    <div class="form-group">
                      <label>NIK</label>
                      <input type="text" name="nik" class="form-control" id="exampleInputFirstName">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputFirstName">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="email" class="form-control" id="exampleInputLastName">
                    </div>
                    <div class="form-group">
                      <label>No Telp Aktif</label>
                      <input type="number" name="telp" class="form-control" id="exampleInputLastName">
                    </div>
                    
                    <div class="form-group">
                      <input type="submit" class="btn btn-info btn-block" value="Register">
                    </div>
                    
                  
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="<?php echo base_url('login'); ?>">Sudah Punya Akun?</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Register Content -->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/ruang-admin.min.js"></script>
</body>

</html>