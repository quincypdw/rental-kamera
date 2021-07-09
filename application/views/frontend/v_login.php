<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php $this->load->view("frontend/template/auth_header.php") ?>
    <?php $this->load->view("frontend/template/head.php") ?>
</head>

<body class="js">

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- End Preloader -->


    <!-- Header -->
    <header class="header shop">
        <!-- Top bar -->
        <?php $this->load->view("frontend/template/topbar_login.php") ?>
    </header>
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Login</h3>
                        </div>
                        
                        <div class="card-body">
                            <form class="user" method="post" action="<?= base_url('frontend/auth') ?>">
                                <?php echo $this->session->flashdata('message'); ?>
                                <div class="form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                                    <input class="form-control py-4" id="inputEmailAddress" type="email" name="email" value="<?= set_value('email'); ?>" placeholder="Masukan email" />
                                    <?= form_error('email', ' <small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="inputPassword">Password</label>
                                    <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Masukan password" />
                                    <?= form_error('password', ' <small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                        <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <a class="small" href="password.html">Forgot Password?</a>
                                    <button class="btn btn-primary" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small"><a href="<?= base_url('frontend/auth/registration'); ?>">Belum terdaftar? Yuk daftar dulu disini!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <br>
    <br>
    <!-- Start Footer Area -->
    <?php $this->load->view("frontend/template/footer.php") ?>
    <!-- /End Footer Area -->

    <!-- Jquery -->
    <?php $this->load->view("frontend/template/auth_footer.php") ?>
    <?php $this->load->view("frontend/template/js.php") ?>
</body>

</html>