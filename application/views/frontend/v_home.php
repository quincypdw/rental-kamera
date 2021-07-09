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
												<li class="active"><a href="<?= base_url("welcome") ?>">Home</a></li>
												<li><a href="<?= base_url("frontend/promo") ?>">Promo</a></li>
												<li><a href="#">Product<i class="ti-angle-down"></i></a>
													<ul class="dropdown">
														<li><a href="#kam">Kamera</a></li>
														<li><a href="#fast">Fasilitas Tambahan</a></li>
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

	<!-- Slider Area -->
	<section class="hero-slider">
		<!-- Single Slider -->
		<div class="single-slider" style="background-image: url('https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1534396130/wbhx8zcawpdev96xmzra.jpg'); background-blend-mode: multiply; box-shadow: inset 0 0 0 1000px rgba(0,0,0,.2);">
			<div class="layer">
				<div class="container">
					<div class="row no-gutters">
						<div class="col-lg-9 offset-lg-3 col-12">
							<div class="text-inner">
								<div class="row">
									<div class="col-lg-7 col-12">
										<div class="hero-text">
											<h1 style="color: #d44648;"><span>PROMO KEMERDEKAAN </span> Rayakan Kemerdekaan dengan <br> Diskon 20%</h1>
											<p>Bebaskan dirimu dari tugas PADSI <br> diskon 20% setiap peminjaman kamera</p>
											<div class="button">
												<a class="btn">KODE PROMO: MERDEKATUGAS</a>
											</div>
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

		<!-- Start Product Area -->
		<div class="product-area section">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title" id="kam">
							<h2>Kamera</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="nav-main">
								<!-- Tab Nav -->
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#kamera" role="tab">Semua</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#dslr" role="tab">DSLR</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#mirrorless" role="tab">Mirrorless</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#actioncam" role="tab">Action Cam</a></li>
								</ul>
								<!--/ End Tab Nav -->
							</div>
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="kamera" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<?php
											$x = 1;
											foreach ($kamera as $k) :
												$id = $k['id'];
												$gambar = $k['gambar_kamera'];
												$nama = $k['nama_kamera'];
												$harga = $k['harga_kamera'];
											?>
												<div class="col-xl-3 col-lg-4 col-md-4 col-12">
													<div class="single-product">
														<div class="product-img">
															<a href="<?= base_url("frontend/product/kameradetails/" . $id); ?>">
																<img class="default-img" src="<?= base_url("/assets/image-kamera/" . $gambar) ?>" alt="#">
																<img class="hover-img" src="<?= base_url("/assets/image-kamera/" . $gambar) ?>" alt="#">
															</a>
															<div class="button-head">
																<div class="product-action">
																	<a data-toggle="modal" data-target="#kameraModal<?= $id ?>" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																</div>
																<div class="product-action-2">
																	<?= anchor('frontend/cart/add_to_cart/' . $id, 'Add to cart') ?>
																</div>
															</div>
														</div>
														<div class="product-content">
															<h3><a href="<?= base_url("frontend/product/kameradetails/" . $id); ?>"><?= $nama ?></a></h3>
															<div class="product-price">
																<span>Rp. <?= number_format($harga, 0, ',', '.') ?>,00</span>
															</div>
														</div>
													</div>
												</div>
											<?php
												$x++;
											endforeach; ?>
										</div>
									</div>
								</div>
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="dslr" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<?php
											$x = 1;
											foreach ($dslr as $k) :
												$id = $k['id'];
												$gambar = $k['gambar_kamera'];
												$nama = $k['nama_kamera'];
												$harga = $k['harga_kamera'];
											?>
												<div class="col-xl-3 col-lg-4 col-md-4 col-12">
													<div class="single-product">
														<div class="product-img">
															<a href="<?= base_url("frontend/product/kameradetails/" . $id); ?>">
																<img class="default-img" src="<?= base_url("/assets/image-kamera/" . $gambar) ?>" alt="#">
																<img class="hover-img" src="<?= base_url("/assets/image-kamera/" . $gambar) ?>" alt="#">
															</a>
															<div class="button-head">
																<div class="product-action">
																	<a data-toggle="modal" data-target="#kameraModal<?= $id ?>" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																</div>
																<div class="product-action-2">
																	<?= anchor('frontend/cart/add_to_cart/' . $id, 'Add to cart') ?>
																</div>
															</div>
														</div>
														<div class="product-content">
															<h3><a href="<?= base_url("frontend/product/kameradetails/" . $id); ?>"><?= $nama ?></a></h3>
															<div class="product-price">
																<span>Rp. <?= number_format($harga, 0, ',', '.') ?>,00</span>
															</div>
														</div>
													</div>
												</div>
											<?php
												$x++;
											endforeach; ?>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="mirrorless" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<?php $x = 1;
											foreach ($mirrorless as $k) :
												$id = $k['id'];
												$gambar = $k['gambar_kamera'];
												$nama = $k['nama_kamera'];
												$kategori = $k['tipe'];
												$harga = $k['harga_kamera'];
											?>
												<div class="col-xl-3 col-lg-4 col-md-4 col-12">
													<div class="single-product">
														<div class="product-img">
															<a href="<?= base_url("frontend/product/kameradetails/" . $id); ?>">
																<img class="default-img" src="<?= base_url("/assets/image-kamera/" . $gambar) ?>" alt="#">
																<img class="hover-img" src="<?= base_url("/assets/image-kamera/" . $gambar) ?>" alt="#">
															</a>
															<div class="button-head">
																<div class="product-action">
																	<a data-toggle="modal" data-target="#kameraModal<?= $id ?>" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																</div>
																<div class="product-action-2">
																	<?= anchor('frontend/cart/add_to_cart/' . $id, 'Add to cart') ?>
																</div>
															</div>
														</div>
														<div class="product-content">
															<h3><a href="<?= base_url("frontend/product/kameradetails/" . $id); ?>"><?= $nama ?></a></h3>
															<div class="product-price">
																<span>Rp. <?= number_format($harga, 0, ',', '.') ?>,00</span>
															</div>
														</div>
													</div>
												</div>
											<?php
												$x++;
											endforeach; ?>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="actioncam" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<?php $x = 1;
											foreach ($actioncam as $k) :
												$id = $k['id'];
												$gambar = $k['gambar_kamera'];
												$nama = $k['nama_kamera'];
												$kategori = $k['tipe'];
												$harga = $k['harga_kamera'];
											?>
												<div class="col-xl-3 col-lg-4 col-md-4 col-12">
													<div class="single-product">
														<div class="product-img">
															<a href="<?= base_url("frontend/product/kameradetails/" . $id); ?>">
																<img class="default-img" src="<?= base_url("/assets/image-kamera/" . $gambar) ?>" alt="#">
																<img class="hover-img" src="<?= base_url("/assets/image-kamera/" . $gambar) ?>" alt="#">
															</a>
															<div class="button-head">
																<div class="product-action">
																	<a data-toggle="modal" data-target="#kameraModal<?= $id ?>" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																</div>
																<div class="product-action-2">
																	<?= anchor('frontend/cart/add_to_cart/' . $id, 'Add to cart') ?>
																</div>
															</div>
														</div>
														<div class="product-content">
															<h3><a href="<?= base_url("frontend/product/kameradetails/" . $id); ?>"><?= $nama ?></a></h3>
															<div class="product-price">
																<span>Rp. <?= number_format($harga, 0, ',', '.') ?>,00</span>
															</div>
														</div>
													</div>
												</div>
											<?php
												$x++;
											endforeach; ?>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Product Area -->
		<!-- Start Product Area -->
		<div class="product-area section">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title" id="fast">
							<h2>Perlengkapan Fotografi</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="nav-main">
								<!-- Tab Nav -->
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#fastam" role="tab">Semua</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#lensa" role="tab">Lensa</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#flash" role="tab">Flash Eksternal</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tripod" role="tab">Tripod</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#memori" role="tab">Kartu Memori</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#baterai" role="tab">Baterai Kamera</a></li>
								</ul>
								<!--/ End Tab Nav -->
							</div>
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="fastam" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<?php $x = 1;
											foreach ($fastam as $f) :
												$id = $f['id'];
												$gambar = $f['gambar_fasilitas_tambahan'];
												$nama = $f['nama_produk'];
												$tipe = $f['tipe'];
												$kategori = $f['kategori'];
												$harga = $f['harga_produk'];
											?>
												<div class="col-xl-3 col-lg-4 col-md-4 col-12">
													<div class="single-product">
														<div class="product-img">
															<a href="<?= base_url("frontend/product/productdetails/" . $id); ?>">
																<img class="default-img" src="<?= base_url("/assets/image-produk/" . $gambar) ?>" alt="#">
																<img class="hover-img" src="<?= base_url("/assets/image-produk/" . $gambar) ?>" alt="#">
															</a>
															<div class="button-head">
																<div class="product-action">
																	<a data-toggle="modal" data-target="#produkModal<?= $id ?>" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																</div>
																<div class="product-action-2">
																	<?= anchor('frontend/cart/add_to_carts/' . $id, 'Add to cart') ?>
																</div>
															</div>
														</div>
														<div class="product-content">
															<h3><a href="<?= base_url("frontend/product/productdetails/" . $id); ?>"><?= $nama ?></a></h3>
															<div class="product-price">
																<span>Rp. <?= number_format($harga, 0, ',', '.') ?>,00</span>
															</div>
														</div>
													</div>
												</div>
											<?php
												$x++;
											endforeach; ?>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="lensa" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<?php $x = 1;
											foreach ($lensa as $f) :
												$id = $f['id'];
												$gambar = $f['gambar_fasilitas_tambahan'];
												$nama = $f['nama_produk'];
												$tipe = $f['tipe'];
												$kategori = $f['kategori'];
												$harga = $f['harga_produk'];
											?>
												<div class="col-xl-3 col-lg-4 col-md-4 col-12">
													<div class="single-product">
														<div class="product-img">
															<a href="<?= base_url("frontend/product/productdetails/" . $id); ?>">
																<img class="default-img" src="<?= base_url("/assets/image-produk/" . $gambar) ?>" alt="#">
																<img class="hover-img" src="<?= base_url("/assets/image-produk/" . $gambar) ?>" alt="#">
															</a>
															<div class="button-head">
																<div class="product-action">
																	<a data-toggle="modal" data-target="#produkModal<?= $id ?>" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																</div>
																<div class="product-action-2">
																	<?= anchor('frontend/cart/add_to_carts/' . $id, 'Add to cart') ?>
																</div>
															</div>
														</div>
														<div class="product-content">
															<h3><a href="<?= base_url("frontend/product/productdetails/" . $id); ?>"><?= $nama ?></a></h3>
															<div class="product-price">
																<span>Rp. <?= number_format($harga, 0, ',', '.') ?>,00</span>
															</div>
														</div>
													</div>
												</div>
											<?php
												$x++;
											endforeach; ?>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="flash" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<?php $x = 1;
											foreach ($flash as $f) :
												$id = $f['id'];
												$gambar = $f['gambar_fasilitas_tambahan'];
												$nama = $f['nama_produk'];
												$tipe = $f['tipe'];
												$kategori = $f['kategori'];
												$harga = $f['harga_produk'];
											?>
												<div class="col-xl-3 col-lg-4 col-md-4 col-12">
													<div class="single-product">
														<div class="product-img">
															<a href="<?= base_url("frontend/product/productdetails/" . $id); ?>">
																<img class="default-img" src="<?= base_url("/assets/image-produk/" . $gambar) ?>" alt="#">
																<img class="hover-img" src="<?= base_url("/assets/image-produk/" . $gambar) ?>" alt="#">
															</a>
															<div class="button-head">
																<div class="product-action">
																	<a data-toggle="modal" data-target="#produkModal<?= $id ?>" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																</div>
																<div class="product-action-2">
																	<?= anchor('frontend/cart/add_to_carts/' . $id, 'Add to cart') ?>
																</div>
															</div>
														</div>
														<div class="product-content">
															<h3><a href="<?= base_url("frontend/product/productdetails/" . $id); ?>"><?= $nama ?></a></h3>
															<div class="product-price">
																<span>Rp. <?= number_format($harga, 0, ',', '.') ?>,00</span>
															</div>
														</div>
													</div>
												</div>
											<?php
												$x++;
											endforeach; ?>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="tripod" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<?php $x = 1;
											foreach ($tripod as $f) :
												$id = $f['id'];
												$gambar = $f['gambar_fasilitas_tambahan'];
												$nama = $f['nama_produk'];
												$tipe = $f['tipe'];
												$kategori = $f['kategori'];
												$harga = $f['harga_produk'];
											?>
												<div class="col-xl-3 col-lg-4 col-md-4 col-12">
													<div class="single-product">
														<div class="product-img">
															<a href="<?= base_url("frontend/product/productdetails/" . $id); ?>">
																<img class="default-img" src="<?= base_url("/assets/image-produk/" . $gambar) ?>" alt="#">
																<img class="hover-img" src="<?= base_url("/assets/image-produk/" . $gambar) ?>" alt="#">
															</a>
															<div class="button-head">
																<div class="product-action">
																	<a data-toggle="modal" data-target="#produkModal<?= $id ?>" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																</div>
																<div class="product-action-2">
																	<?= anchor('frontend/cart/add_to_carts/' . $id, 'Add to cart') ?>
																</div>
															</div>
														</div>
														<div class="product-content">
															<h3><a href="<?= base_url("frontend/product/productdetails/" . $id); ?>"><?= $nama ?></a></h3>
															<div class="product-price">
																<span>Rp. <?= number_format($harga, 0, ',', '.') ?>,00</span>
															</div>
														</div>
													</div>
												</div>
											<?php
												$x++;
											endforeach; ?>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="memori" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<?php $x = 1;
											foreach ($memori as $f) :
												$id = $f['id'];
												$gambar = $f['gambar_fasilitas_tambahan'];
												$nama = $f['nama_produk'];
												$tipe = $f['tipe'];
												$kategori = $f['kategori'];
												$harga = $f['harga_produk'];
											?>
												<div class="col-xl-3 col-lg-4 col-md-4 col-12">
													<div class="single-product">
														<div class="product-img">
															<a href="<?= base_url("frontend/product/productdetails/" . $id); ?>">
																<img class="default-img" src="<?= base_url("/assets/image-produk/" . $gambar) ?>" alt="#">
																<img class="hover-img" src="<?= base_url("/assets/image-produk/" . $gambar) ?>" alt="#">
															</a>
															<div class="button-head">
																<div class="product-action">
																	<a data-toggle="modal" data-target="#produkModal<?= $id ?>" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																</div>
																<div class="product-action-2">
																	<?= anchor('frontend/cart/add_to_carts/' . $id, 'Add to cart') ?>
																</div>
															</div>
														</div>
														<div class="product-content">
															<h3><a href="<?= base_url("frontend/product/productdetails/" . $id); ?>"><?= $nama ?></a></h3>
															<div class="product-price">
																<span>Rp. <?= number_format($harga, 0, ',', '.') ?>,00</span>
															</div>
														</div>
													</div>
												</div>
											<?php
												$x++;
											endforeach; ?>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="baterai" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<?php $x = 1;
											foreach ($baterai as $f) :
												$id = $f['id'];
												$gambar = $f['gambar_fasilitas_tambahan'];
												$nama = $f['nama_produk'];
												$tipe = $f['tipe'];
												$kategori = $f['kategori'];
												$harga = $f['harga_produk'];
											?>
												<div class="col-xl-3 col-lg-4 col-md-4 col-12">
													<div class="single-product">
														<div class="product-img">
															<a href="<?= base_url("frontend/product/productdetails/" . $id); ?>">
																<img class="default-img" src="<?= base_url("/assets/image-produk/" . $gambar) ?>" alt="#">
																<img class="hover-img" src="<?= base_url("/assets/image-produk/" . $gambar) ?>" alt="#">
															</a>
															<div class="button-head">
																<div class="product-action">
																	<a data-toggle="modal" data-target="#produkModal<?= $id ?>" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																</div>
																<div class="product-action-2">
																	<?= anchor('frontend/cart/add_to_carts/' . $id, 'Add to cart') ?>
																</div>
															</div>
														</div>
														<div class="product-content">
															<h3><a href="<?= base_url("frontend/product/productdetails/" . $id); ?>"><?= $nama ?></a></h3>
															<div class="product-price">
																<span>Rp. <?= number_format($harga, 0, ',', '.') ?>,00</span>
															</div>
														</div>
													</div>
												</div>
											<?php
												$x++;
											endforeach; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Product Area -->
		<?php $this->load->view("frontend/modal_quickview") ?>

		<!-- Start Footer Area -->
		<?php $this->load->view("frontend/template/footer.php") ?>
		<!-- /End Footer Area -->


		<!-- Jquery -->
		<?php $this->load->view("frontend/template/js.php") ?>

</body>

</html>