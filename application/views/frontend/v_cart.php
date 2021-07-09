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

	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>NO</th>
								<th>Nama Produk</th>
								<th class="text-center">Harga</th>
								<th class="text-center">Jumlah</th>
								<th class="text-center">Sub-Total</th>
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php if ($this->cart->contents() == null) { ?>
								<tr>
									<td align="center" colspan="6"><b><?php echo "Cart masih kosong. Ayo belanja!" ?></b></td>
								</tr>
							<?php } else { ?>
								<?php $no = 1;
								foreach ($this->carts->contents() as $items) : ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td class="id" hidden><?php echo $items['id'] ?></td>
										<td class="product-des" data-title="Description"><?php echo $items['name'] ?></td>
										<td class="price" data-title="Price"><span>Rp. <?php echo number_format($items['price'], 0, ',', '.') ?>,00</span></td>
										<td class="qty" data-title="Qty" style="text-align: center;"><?php echo $items['qty'] ?>
											<!-- Input Order -->
											<!-- <div class="input-group">
										<div class="button minus">
											<button type="button" href="<?= base_url('frontend/cart/min_qty/' . $items['rowid']) ?>"class="btn btn-primary btn-number" data-type="minus">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="text" class="input-number"  data-min="1" data-max="100" value="<?php echo $items['qty'] ?>">
										<div class="button plus">
											<a href="<?= base_url('frontend/cart/plus_qty/' . $items['rowid']) ?>" type="button" class="btn btn-primary btn-number" data-type="plus">
												<i class="ti-plus"></i>
											</a>
										</div>
									</div> -->
											<!--/ End Input Order -->
										</td>
										<td class="total-amount" data-title="Total"><span>Rp. <?php echo number_format($items['subtotal'], 0, ',', '.') ?>,00</span></td>
										<td class="action" data-title="Remove"><a href="<?= base_url('frontend/cart/deletecart/' . $items['rowid']) ?>"><i class="ti-trash remove-icon"></i></a></td>
									</tr>
								<?php endforeach; ?>
								<tr>
									<td colspan="4"></td>
									<td align="center"><b>Rp. <?php echo number_format($this->carts->total(), 0, ',', '.') ?>,00</b></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-7 col-md-5 col-12">
								<div class="left">
									<div class="coupon">
										<form action="<?= base_url('frontend/cart/hitungDiskon') ?>" method="post">
											<input name="coupon" id="coupon" type="text" placeholder="Masukan Kode Promo" class="form-control">
											<button class="btn" type="submit">Cek</button>
										</form>
									</div>
								</div>
							</div>
							<div class="col-lg-5 col-md-7 col-12">
								<div class="right">
									<ul>
										<?php $this->cart->contents() ?>
										<?php if ($diskon1 == 0) { ?>
											<li>Sub Total<span>Rp. <?php echo number_format($this->carts->total(), 0, ',', '.') ?>,00</span></li>
											<li>Promo<span>Rp. 0</span></li>
											<li class="last"><b>Total Pembayaran<span>Rp. <?php echo number_format($this->carts->total(), 0, ',', '.') ?>,00</span></b></li>
										<?php } else { ?>
											<li>Sub Total<span>Rp. <?php echo number_format($this->cart->total(), 0, ',', '.') ?>,00</span></li>
											<li>Promo<span class="text-success">Rp. <?php echo number_format($hargadiskon, 0, ',', '.') ?>,00</span></li>
											<li class="last"><b>Total Pembayaran<span>Rp. <?php echo number_format($totaldiskon, 0, ',', '.') ?>,00</span></b></li>
										<?php } ?>
									</ul>
									<div class="button5">
										<a href="<?= base_url("frontend/cart/checkout") ?>" class="btn">Checkout</a>
										<a href="<?= base_url("welcome") ?>" class="btn">Lanjutkan Mencari Barang</a>
										<a href="<?= base_url("frontend/cart/delete_cart") ?>" class="btn">Hapus Keranjang</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->
	<!-- Start Footer Area -->
	<?php $this->load->view("frontend/template/footer.php") ?>
	<!-- /End Footer Area -->

	<!-- Jquery -->
	<?php $this->load->view("frontend/template/js.php") ?>
</body>

</html>