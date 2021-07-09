<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Administrator Login</title>
  <link href="<?= base_url('assets/img/LOGO-02.png') ?>" rel="icon">
  <link href="<?= base_url('assets/RuangAdmin-master/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/RuangAdmin-master/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/RuangAdmin-master/') ?>css/ruang-admin.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/plugins/sweetalert/sweetalert.css') ?>" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Admin</h1>
                  </div>
                  <?php echo $this->session->flashdata('message'); ?>
                  <form class="user" onsubmit="ajax_login(); return false;">
                    <div class="form-group">
                      <input type="text" class="form-control" id="username" aria-describedby="emailHelp"
                        placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="password" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary btn-block">Login</a>
                    </div>
                    <hr>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="<?= base_url('assets/RuangAdmin-master/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/RuangAdmin-master/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/RuangAdmin-master/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url('assets/RuangAdmin-master/') ?>js/ruang-admin.min.js"></script>
  <script src="<?= base_url('assets/plugins/sweetalert/sweetalert.min.js') ?>"></script>
  <script src="<?= base_url('assets/plugins/sweetalert/sweetshow.js') ?>"></script>
  <script type="text/javascript">
  function ajax_login()
  {
      var user_name = $('#username').val();
      var pwd = $('#password').val();

      if(user_name.length > 0 && pwd.length > 0)
      {
        $.ajax({
            url: "<?= base_url('authuser/login') ?>",
            type: "post",
            data: {
                username: user_name,
                password: pwd
            },
            success: function(result)
            {
                var hasil = JSON.parse(result);
                swal_show(hasil);

                if(hasil['status_code'] == 200)
                {
                    setTimeout("window.open(self.location, '_self');", 1500);
                }
                else
                {
                    setTimeout("window.open(self.location, '_self');", 1500);
                }

            }
        });
      }
  }
  </script>
</body>

</html>