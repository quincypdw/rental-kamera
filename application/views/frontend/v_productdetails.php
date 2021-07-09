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
    <style type="text/css">
        .fa-times-circle-o:before {
            content: "\f05c";
            color: red
        }
    </style>


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
        <!--/ End Header Inner -->
    </header>
    <!--/ End Header -->
    <?php $x = 1;
    foreach ($kameraid as $k) :
        $id = $k['id'];
        $gambar = $k['gambar_kamera'];
        $nama = $k['nama_kamera'];
        $kategori = $k['tipe'];
        $megapixel = $k['megapixel'];
        $stok = $k['stok'];
        $harga = $k['harga_kamera'];
        $deskripsi = $k['deskripsi'];
    ?>
        <div class="row no-gutters">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <!-- Product Slider -->
                <div class="product-gallery">
                    <div class="quickview-slider-active">
                        <div class="single-slider">
                            <img src="<?= base_url("/assets/image-kamera/" . $gambar) ?>" alt="<?= $nama ?>">
                        </div>
                        <!-- <div class="single-slider">
                            <img src="https://via.placeholder.com/569x528" alt="#">
                        </div>
                        <div class="single-slider">
                            <img src="https://via.placeholder.com/569x528" alt="#">
                        </div>
                        <div class="single-slider">
                            <img src="https://via.placeholder.com/569x528" alt="#">
                        </div> -->
                    </div>
                </div>
                <div class="product-gallery">
                    <div class="quickview-slider-active">
                        <div class="single-slider">
                            <img src="<?= base_url("/assets/image-kamera/" . $gambar) ?>" alt="<?= $nama ?>">
                        </div>
                        <!-- <div class="single-slider">
                            <img src="https://via.placeholder.com/569x528" alt="#">
                        </div>
                        <div class="single-slider">
                            <img src="https://via.placeholder.com/569x528" alt="#">
                        </div>
                        <div class="single-slider">
                            <img src="https://via.placeholder.com/569x528" alt="#">
                        </div> -->
                    </div>
                </div>
                <!-- End Product slider -->
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="quickview-content">
                    <h2><?= $nama ?></h2>
                    <div class="quickview-ratting-review">
                        <div class="quickview-stock">
                            <span><?= $kategori ?></span>
                        </div>
                        <?php if ($stok > 0) { ?>
                            <div class="quickview-stock">
                                <span class="text-success"><i class="fa fa-check-circle-o"></i> in stock</span>
                            </div>
                        <?php } else if ($stok == 0|| $stok<=0) { ?>
                            <div class="quickview-stock">
                                <span class="text-danger"><i class="fa fa-times-circle-o"></i> out of stock </span>
                            </div>
                        <?php } ?>
                    </div>
                    <h3>Rp. <?= number_format($harga, 0, ',', '.') ?>,00</h3>
                    <div class="quickview-peragraph">
                        <p><?= $deskripsi ?></p>
                        <br>
                        <p>Megapixel : <b><?= $megapixel ?></b> MP</p>
                        <?php if ($stok >= 1 && $stok <= 3) { ?>
                            <p>Stok : <span class="text-danger"><b><?= $stok ?></b></span></p>
                            <p class="text-danger">Segera habis!</p>
                        <?php } else if ($stok == 0 || $stok<=0) { ?>
                            <p class="text-danger">Stok habis!</p>
                        <?php } else {  ?>
                            <p>Stok : <b><?= $stok ?></b></p>
                        <?php } ?>
                    </div>
                    <br>
                    <!-- <div class="quantity">
                        Input Order -->
                        <!-- <div class="input-group">
                            <div class="button minus">
                                <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                    <i class="ti-minus"></i>
                                </button>
                            </div>
                            <input type="number" name="quant[1]" id="quant[1]" class="input-number" data-min="1" data-max="1000" value="1">
                            <div class="button plus">
                                <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                    <i class="ti-plus"></i>
                                </button>
                            </div>
                        </div> -->
                        <!--/ End Input Order
                    </div> -->
                    <?php if ($stok > 0) { ?>
                        <div class="add-to-cart">
                            <?= anchor('frontend/cart/add_to_cart/' . $id, '<div class="btn btn-primary"> Add to cart </div>') ?>
                            <!-- <a href="#" class="btn min"><i class="ti-heart"></i></a> -->
                        </div>
                    <?php } else if ($stok == 0|| $stok<=0) { ?>
                        <div class="add-to-cart">
                            <a class="btn disabled">Stok Habis</i></a>
                        </div>
                    <?php } ?>
                    <div class="default-social">
                        <h4 class="share-now">Share:</h4>
                        <ul>
                        <li><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo current_url() ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="twitter" href="https://twitter.com/intent/tweet/?text=Hai%20aku%20nemu%20perlengkapan%20fotografi%20murah%20nih%20di&hashtags=pesonalens&url=<?php echo current_url() ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="youtube" href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a class="dribbble" href="https://api.whatsapp.com/send?text=Hai%20aku%20nemu%20perlengkapan%20fotografi%20murah%20nih%20di%20<?php echo current_url() ?>" target="_blank"><i class="fa fa-whatsapp"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- Start Footer Area -->
    <?php $this->load->view("frontend/template/footer.php") ?>
    <!-- /End Footer Area -->

    <!-- Jquery -->
    <?php $this->load->view("frontend/template/js.php") ?>
</body>

</html>