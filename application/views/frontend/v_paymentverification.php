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
														<li><a href="<?= base_url("frontend/payment/method") ?>">Payment Methods</a></li>
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
                                <h4>Payment</h4>
                                <h3>Payment Verification</h3>
                            </div>
                            <?php echo form_open_multipart('frontend/payment/add'); ?>
                            <?php echo $this->session->flashdata('message'); ?>
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                                <label>Kode Transaksi</label>
                                                <input name="order" id="order" type="text" placeholder="IN000000001" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Nama Pengirim</label>
                                            <input name="nama" id="nama" type="text" placeholder="Hugo Stefent" class="form-control">
                                        </div>
                                    </div>

                                   
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Jumlah Pembayaran</label>
                                             <input name="jumlah" id="jumlah" type="number" placeholder="30000" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Tanggal Pembayaran</label>
                                             <input name="tglbyr" id="tglbyr" type="date" placeholder="dd/mm/yyyy" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Bukti Transfer</label>
                                            <input  type="file" name="buktitrf" id="buktitrf" accept=".png, .jpg, .jpeg" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="ti-save"></i> Sumbit </button>

                                    </div>
                                </div>
                            <?= form_close(); ?>
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