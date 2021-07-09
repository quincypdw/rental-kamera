<!DOCTYPE html>
<html lang="zxx">

<head>
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
        <?php $this->load->view("frontend/template/topbar.php") ?>
        <!-- Header Inner -->
        <div class="header-inner">
            <div class="container">
                <div class="cat-nav-head">
                    <div class="row">
                        <div class="col-lg-9 col-12">
                            <div class="menu-area">
                                <!-- Main Menu -->
                                <nav class="navbar navbar-expand-lg">
                                    <div class="navbar-collapse">
                                        <div class="nav-inner">
                                            <ul class="nav main-menu menu navbar-nav">
												<li><a href="<?= base_url("welcome") ?>">Home</a></li>
												<li><a href="<?= base_url("frontend/promo") ?>">Promo</a></li>
												<li><a href="#">Product<i class="ti-angle-down"></i></a>
													<ul class="dropdown">
                                                        <li><a href="<?= base_url()?>welcome#kam">Kamera</a></li>
                                                        <li><a href="<?= base_url()?>welcome#fast">Fasilitas Tambahan</a></li>
                                                    </ul>
												</li>
												<li><a href="#">Shop<i class="ti-angle-down"></i></a>
													<ul class="dropdown">
														<li><a href="<?= base_url("frontend/cart") ?>">Cart</a></li>
														<li><a href="<?= base_url("frontend/cart/checkout") ?>">Checkout</a></li>
													</ul>
												</li>
												<li><a href="#">Payments<i class="ti-angle-down"></i></a>
													<ul class="dropdown">
														<li><a href="#">Payment Methods</a></li>
														<li><a href="<?= base_url("frontend/payment/verification") ?>">Payment Verification</a></li>
													</ul>
												</li>
												<li><a href="contact.html">Contact Us</a></li>
											</ul>
                                        </div>
                                    </div>
                                </nav>
                                <!--/ End Main Menu -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view("frontend/template/breadcrumbs.php") ?>
        <!--/ End Header Inner -->
    </header>
    <!--/ End Header -->

    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="form-main">
                            <div class="title">
                                <h4>Akun</h4>
                                <h3>Edit Akun</h3>
                            </div>
                            <form class="form" action="<?php echo base_url('frontend/account/edit/' . $_SESSION['customer_id']); ?>" method="post">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input name="nama" id="nama" type="text" value="<?= $customer['nama']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input name="nik" id="nik" type="text" value="<?= $customer['nik']; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <div class="form-group">
                                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $customer['jenis_kelamin']; ?>">
                                                    <option selected disabled>-Pilih Jenis Kelamin-</option>
                                                    <option value="Laki-laki" <?php if ($customer['jenis_kelamin'] == "Laki-laki") echo 'selected="selected"'; ?>>Laki-laki</option>
                                                    <option value="Perempuan" <?php if ($customer['jenis_kelamin'] == "Perempuan") echo 'selected="selected"'; ?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" id="email" type="email" value="<?= $customer['email']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input name="username" id="username" type="text" value="<?= $customer['username']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Nomor Handphone</label>
                                            <input name="no_hp" id="no_hp" type="text" value="<?= $customer['no_hp']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input name="tanggal_lahir" id="tanggal_lahir" type="text" value="<?= $customer['tanggal_lahir']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input name="alamat" id="alamat" type="text" value="<?= $customer['alamat']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input name="password1" id="password1" type="password">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input name="password2" id="password2" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="ti-save"></i> Save </button>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger btn-block" onclick="javascript:window.location='<?= base_url('frontend/account') ?>';"><i class="ti-close"></i>Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact -->

    <!-- Start Footer Area -->
    <?php $this->load->view("frontend/template/footer.php") ?>

    <!-- /End Footer Area -->

    <!-- Jquery -->
    <?php $this->load->view("frontend/template/js.php") ?>
</body>

</html>