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
                                                <li class="active"><a href="#">Payments<i class="ti-angle-down"></i></a>
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
    <!-- Start Blog Single -->
    <section class="blog-single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="blog-single-main">
                        <div class="row">
                            <div class="col-12">
                                <div class="blog-detail">
                                    <h2 class="blog-title">Cara Pembayaran di Pesona Antariksa Lens</h2>
                                    <div class="blog-meta">
                                        <span class="author"><a href="#"><i class="fa fa-user"></i>by Admin</a>
                                    </div>
                                    <div class="image">
                                        <img src="https://www.chichanyc.com/wp-content/uploads/2019/06/Inilah-Payment-Gateway-Terbaik-dan-Populer-Di-Indonesia.png">
                                    </div>
                                    <div class="content">
                                        <p>Cara pembayaran di Pesona Antariksa Lens cukup mudah. Setelah melakukan pemesanan, kemudian para pelanggan dapat melakukan pembayaran melalui transfer ke Bank BCA dan Bank Mandiri sesuai pilihan yang telah dipilih. Berikut ini rekening untuk pembayaran :</p>
                                        <blockquote> <i class="fa fa-quote-left"></i> Transfer Bank BCA : <br>600835513<br> a/n Yonatan Abisai Yabin </blockquote>
                                        <blockquote> <i class="fa fa-quote-left"></i> Transfer Bank Mandiri : <br>1330014470256<br> a/n Thomas Quincy Padawangi </blockquote>
                                        <p>Setelah melakukan pembayaran, para pelanggan diharapkan untuk melakukan verifikasi pembayaran dengan menunggah bukti pembayaran melalui halalaman berikut ini :</p>
                                        <center><button class="btn" onclick="document.location='../payment/verification'">Payment Verification</button></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Blog Single -->
    <!-- Start Footer Area -->
    <?php $this->load->view("frontend/template/footer.php") ?>
    <!-- /End Footer Area -->

    <!-- Jquery -->
    <?php $this->load->view("frontend/template/js.php") ?>
</body>

</html>