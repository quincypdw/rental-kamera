<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head.php-->
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
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Create Account</h3>
                        </div>
                        <div class="card-body">
                            <form class="user" method="post" action="<?php echo base_url('frontend/auth/registration'); ?>">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputNama">Nama</label>
                                    <input class="form-control py-4" id="nama" type="text" name="nama" value="<?= set_value('nama'); ?>" placeholder="Masukan Nama Lengkap" />
                                    <?= form_error('nama', ' <small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="inputNIK">NIK</label>
                                    <input class="form-control py-4" id="nik" type="text" name="nik" value="<?= set_value('nik'); ?>" placeholder="Masukan NIK sesuai KTP" />
                                    <?= form_error('nik', ' <small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="inputEmail">Email</label>
                                    <input class="form-control py-4" id="email" type="email" name="email" value="<?= set_value('email'); ?>" placeholder="Masukan Email Address" />
                                    <?= form_error('email', ' <small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputJeniskelamin">Jenis Kelamin</label>
                                            <div class=col-md-6>
                                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                                    <option selected disabled>-Pilih Jenis Kelamin-</option>
                                                    <option>Laki-laki</option>
                                                    <option>Perempuan</option>
                                                </select>
                                                <?= form_error('jeniskelamin', ' <small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputTgllahir">Tanggal Lahir</label>
                                            <input class="form-control py-4" id="tanggal_lahir" type="date" name="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>" placeholder="Masukan Tanggal Lahir" />
                                            <?= form_error('tanggal_lahir', ' <small class="text-danger">', '</small>') ?>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="inputAlamat">Alamat</label>
                                    <input class="form-control py-4" id="alamat" type="text" name="alamat" value="<?= set_value('alamat'); ?>" placeholder="Masukan Alamat" />
                                    <?= form_error('address', ' <small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="inputUsername">Username</label>
                                    <input class="form-control py-4" id="username" type="text" name="username" value="<?= set_value('username'); ?>" placeholder="Masukan Username" required />
                                    <?= form_error('username', ' <small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="inputNohp">Nomor HP</label>
                                    <input class="form-control py-4" id="no_hp" type="text" name="no_hp" value="<?= set_value('no_hp'); ?>" placeholder="Masukan Nomor HP (ex: 081211223344)" />
                                    <?= form_error('no_hp', ' <small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4" id="password1" type="password" name="password1" placeholder="Enter password" required />
                                            <?= form_error('password1', ' <small class="text-danger">', '</small>') ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                            <input class="form-control py-4" id="password2" type="password" name="password2" placeholder="Confirm Password" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small"><a href="<?= base_url('frontend/auth'); ?>">Udah punya akun? Login yuk</a></div>
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