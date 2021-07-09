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
                                                        <li><a href="<?= base_url() ?>welcome#kam">Kamera</a></li>
                                                        <li><a href="<?= base_url() ?>welcome#fast">Fasilitas Tambahan</a></li>
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
                                                <li class="active"><a href="<?= base_url("contact") ?>">Contact Us</a></li>
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
    <!-- Start Contact -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="form-main">
                            <div class="title">
                                <h4>Hubungi Kami</h4>
                                <h3>Kenali lebih jauh</h3>
                            </div>
                            <div class="single-head">
                                <div class="single-info">
                                    <i class="fa fa-phone"></i>
                                    <h4 class="title">Telepon/WA:</h4>
                                    <ul>
                                        <li><a href="https://wa.me/6282260887370/?text=Hai%20saya%20mau%20bertanya">+62 822 6088 7371</a></li>
                                        <li><a href="https://wa.me/6287889895119/?text=Hai%20saya%20mau%20bertanya">+62 878 8989 5119</a></li>
                                    </ul>
                                </div>
                                <div class="single-info">
                                    <i class="fa fa-envelope-open"></i>
                                    <h4 class="title">Email:</h4>
                                    <ul>
                                        <li><a href="mailto:pesonalens@gmail.com">pesonalens@gmail.com</a></li>
                                        <li><a href="mailto:qpdw@programmer.net">qpdw@programmer.net</a></li>
                                    </ul>
                                </div>
                                <div class="single-info">
                                    <i class="fa fa-location-arrow"></i>
                                    <h4 class="title">Alamat:</h4>
                                    <ul>
                                        <li>Pesona Residence blok A4 Sinduadi, Sleman, Yogyakarta</li>
                                    </ul>
                                </div>
                            </div>
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