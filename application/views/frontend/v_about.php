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
                                    <div class="image">
                                        <img src="<?= base_url('assets/images/logo2.png')?>" alt="#">
                                    </div>
                                    <h2 class="blog-title">Pesona Antariksa Lens</h2>
                                    <div class="blog-meta">
                                        <span class="author"><a href="#"><i class="fa fa-user"></i>by Admin</a>
                                    </div>
                                    <div class="content">
                                        <p>Pesona Antariksa Lens menyediakan penyewaan kamera dan perlengkapan fotografi lainnya dengan kualitas yang bagus.</p>
                                        <p>Website ini dibuat oleh Yonatan Abisai Yabin (181709819) bersama Thomas Quincy Padawangi (181709819) untuk mata kuliah Projek Analisis dan Desain Sistem Informasi</p>
                                        <p>Selamat atas kelulusan kak Limia Kristiani. Semoga sukes kedepannya.</p>
                                        <div class="image">
                                            <img src="https://lh3.googleusercontent.com/jlHzhAoytQnBQs_l_3SAlb7On94qNjQP22Xk37tj8nwXrOmMCgB3-h-9RNFVvpGMJix4RN97lQ=w1080-h608-p-no-v0" alt="#">
                                        </div>
                                        <br><br>
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