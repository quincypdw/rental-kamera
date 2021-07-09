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
    <!-- Start Checkout -->
		<section class="shop checkout section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-8 col-12">
						<div class="checkout-form">
							<h2>Checkout Pesanan Anda</h2>
							<p>Pastikan data yang Anda berikan sesuai</p>
							<!-- Form -->
							<form class="form" method="post" action="<?= base_url('frontend/cart/tambahTransaksi') ?>">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Tanggal Peminjaman<span>*</span></label>
											<input type="date" id="tanggal_pinjam"  name="tanggal_pinjam" value="<?= set_value('tanggal_pinjam'); ?>" placeholder="Masukan Tanggal Peminjaman" required/>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Durasi Peminjaman<span>*</span></label>
											<select class="form-control" id="durasi_peminjaman" name="durasi_peminjaman" required>
                                                <option selected disabled>-Pilih Durasi Peminjaman-</option>
                                                <option value="1">1 hari</option>
                                                <option value="3">3 hari</option>
                                                <option value="7">1 minggu</option>
                                                <option value="14">2 minggu</option>
                                            </select>
										</div>
									</div>
                                </div>
                        <!-- Form -->
                        </div>
                        <?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message'); } ?>
						<div class="alert alert-danger" role="alert"><b>Harga total yang tertera belum dikalikan dengan jumlah hari penyewaan.</b> Harga total akan tersedia pada invoice</div>						
					</div>
					<div class="col-lg-4 col-12">
						<div class="order-details">
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>CART  TOTALS</h2>
								<div class="content">
									<ul>
                                        <?php $this->carts->contents() ?>
										<?php if ($diskon1==0) { ?>
										<li>Sub Total<span>Rp. <?php echo number_format($this->carts->total(),0,',', '.') ?>,00</span></li>
										<li>Promo<span>Rp. 0,00</span></li>
										<li class="last"><b>Total Pembayaran<span>Rp. <?php echo number_format($this->carts->total(),0,',', '.') ?>,00</span></b></li>
										<?php } else { ?>
										<li>Sub Total<span>Rp. <?php echo number_format($this->carts->total(),0,',', '.') ?>,00</span></li>
										<li>Promo<span class="text-success">Rp. <?php echo number_format($hargadiskon,0,',', '.') ?>,00</span></li>
										<li class="last"><b>Total Pembayaran<span>Rp. <?php echo number_format($totaldiskon,0,',', '.') ?>,00</span></b></li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>Payments</h2>
								<div class="content">
									<div class="checkbox">
                                        <select class="form-control" id="pembayaran" name="pembayaran" required>
                                            <option selected disabled>-Pilih Pembayaran-</option>
                                            <option>Transfer BCA</option>
                                            <option>Transfer Mandiri</option>
                                            <option>Cash</option>
                                        </select>
									</div>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Button Widget -->
							<div class="single-widget get-button">
								<div class="content">
									<div class="button">
										<button class="btn" type="submit">Proceed to Checkout</button>
									</div>
								</div>
							</div>
						</form>
							<!--/ End Button Widget -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Checkout -->
        <!-- Start Footer Area -->
     <?php $this->load->view("frontend/template/footer.php") ?>
    <!-- /End Footer Area -->

    <!-- Jquery -->
    <?php $this->load->view("frontend/template/js.php") ?>
</body>
</html>