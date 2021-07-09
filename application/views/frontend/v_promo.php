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
                                                <li class="active"><a href="<?= base_url("frontend/promo") ?>">Promo</a></li>
                                                <li><a href="#">Product<i class="ti-angle-down"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="<?= base_url()?>welcome#kam">Kamera</a></li>
                                                        <li><a href="<?= base_url()?>welcome#fast">Fasilitas Tambahan</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Shop<i class="ti-angle-down"></i></a>
													<ul class="dropdown">
														<li><a href="<?= base_url("frontend/cart")?>">Cart</a></li>
														<li><a href="<?= base_url("frontend/cart/checkout")?>">Checkout</a></li>
													</ul>
												</li>
												<li><a href="#">Payments<i class="ti-angle-down"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="<?= base_url("frontend/payment/method") ?>">Payment Methods</a></li>
                                                        <li><a href="<?= base_url("frontend/payment/verification") ?>">Payment Verification</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="<?= base_url("contact") ?>">Contact Us</a></li>
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

    <!-- Slider Area -->
    <section class="hero-slider">
        <!-- Single Slider -->
        <div class="single-slider" style="background-image: url('https://image.freepik.com/free-vector/square-pedestal-with-ball-blue-background-product_336421-2.jpg'); background-blend-mode: multiply; box-shadow: inset 0 0 0 1000px rgba(0,0,0,.2);" >
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-lg-9 offset-lg-3 col-12">
                            <div class="text-inner">
                                <!-- <img src="https://mmc.tirto.id/image/otf/700x0/2020/04/23/istock-1145904609-copy_ratio-16x9.jpg"> -->
                                <div class="row">
                                    <div class="col-lg-7 col-12">
                                        <div class="hero-text">
                                            <h1 style="color: #2980B9;"><span style="color: #EAEAEA;">LAKUKAN TRANSAKSI PERTAMAMU </span> Dapatkan<br>Diskon 50%</h1>
                                            <p style="color: #EAEAEA;">Khusus pembelian pertama, dapatkan <br> diskon 50% setiap peminjaman kamera dan fasilitas tambahan!</p>
                                            <div class="button">
                                                <a class="btn">KODE PROMO: COBASEWA</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!--/ End Single Slider -->
    </section>
    <!--/ End Slider Area -->
    <!-- Slider Area -->
    <section class="hero-slider">
        <!-- Single Slider -->
        <div class="single-slider" style="background-image: url('https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/cute-birthday-instagram-captions-1584723902.jpg'); background-blend-mode: multiply; box-shadow: inset 0 0 0 1000px rgba(0,0,0,.2);" >
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-9 offset-lg-3 col-12">
                        <div class="text-inner">
                            <div class="row">
                                <div class="col-lg-7 col-12">
                                    <div class="hero-text">
                                        <h1><span>Special Buat Kamu </span> Diskon 50% buat kamu yang Ulang Tahun!</h1>
                                        <p>Buat kamu yang ulang tahun di hari peminjaman <br> nikmati diskon 50% setiap peminjaman kamera <br> Masukan kode promo: <b> ULANGTAHUN </b></p>
                                        <div class="button">
                                            <a class="btn">KODE PROMO: ULANGTAHUN</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Single Slider -->
    </section>
    <!--/ End Slider Area -->

    <!-- Start Footer Area -->
    <?php $this->load->view("frontend/template/footer.php") ?>
    <!-- /End Footer Area -->

    <!-- Jquery -->
    <?php $this->load->view("frontend/template/js.php") ?>
</body>

</html>