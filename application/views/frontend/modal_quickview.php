<style type="text/css">
	.fa-times-circle-o:before {
		content: "\f05c";
		color: red
	}
</style>
<?php $x = 1;
foreach ($kamera as $k) :
	$id = $k['id'];
	$gambar = $k['gambar_kamera'];
	$nama = $k['nama_kamera'];
	$kategori = $k['tipe'];
	$stok = $k['stok'];
	$harga = $k['harga_kamera'];
	$deskripsi = $k['deskripsi'];
?>
	<!-- Modal -->
	<div class="modal fade" id="kameraModal1" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
				</div>
				<div class="modal-body">
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
									<?php } else if ($stok == 0 || $stok <= 0) { ?>
										<div class="quickview-stock">
											<span class="text-danger"><i class="fa fa-times-circle-o"></i> out of stock </span>
										</div>
									<?php } ?>
								</div>
								<h3>Rp. <?= number_format($harga, 0, ',', '.') ?>,00</h3>
								<div class="quickview-peragraph">
									<p><?= $deskripsi ?></p>
								</div>
								<br>
								<div class="quantity">
									<!-- Input Order -->
									<!-- <div class="input-group">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="text" name="quant[1]" class="input-number" data-min="1" data-max="1000" value="1">
										<div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
												<i class="ti-plus"></i>
											</button>
										</div>
									</div> -->
									<!--/ End Input Order -->
								</div>
								<?php if ($stok > 0) { ?>
									<div class="add-to-cart">
										<?= anchor('frontend/cart/add_to_cart/' . $id, '<div class="btn btn-primary"> Add to cart </div>') ?>
										<!-- <a href="#" class="btn min"><i class="ti-heart"></i></a> -->
									</div>
								<?php } else if ($stok == 0 || $stok <= 0) { ?>
									<div class="add-to-cart">
										<a class="btn disabled">Stok Habis</i></a>
									</div>
								<?php } ?>
								<!-- <div class="default-social">
									<h4 class="share-now">Share:</h4>
									<ul>
										<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
										<li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
endforeach;
?>
<!-- Modal end -->
<?php $x = 1;
foreach ($kamera as $k) :
	$id = $k['id'];
	$gambar = $k['gambar_kamera'];
	$nama = $k['nama_kamera'];
	$kategori = $k['tipe'];
	$stok = $k['stok'];
	$harga = $k['harga_kamera'];
	$deskripsi = $k['deskripsi'];
?>
	<!-- Modal -->
	<div class="modal fade" id="kameraModal<?= $id ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
				</div>
				<div class="modal-body">
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
									<?php } else if ($stok == 0 || $stok <= 0) { ?>
										<div class="quickview-stock">
											<span class="text-danger"><i class="fa fa-times-circle-o"></i> out of stock </span>
										</div>
									<?php } ?>
								</div>
								<h3>Rp. <?= number_format($harga, 0, ',', '.') ?>,00</h3>
								<div class="quickview-peragraph">
									<p><?= $deskripsi ?></p>
								</div>
								<br>
								<div class="quantity">
									<!-- Input Order -->
									<!-- <div class="input-group">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="text" name="quant[1]" class="input-number" data-min="1" data-max="1000" value="1">
										<div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
												<i class="ti-plus"></i>
											</button>
										</div>
									</div> -->
									<!--/ End Input Order -->
								</div>
								<?php if ($stok > 0) { ?>
									<div class="add-to-cart">
										<?= anchor('frontend/cart/add_to_cart/' . $id, '<div class="btn btn-primary"> Add to cart </div>') ?>
										<!-- <a href="#" class="btn min"><i class="ti-heart"></i></a> -->
									</div>
								<?php } else if ($stok == 0 || $stok <= 0) { ?>
									<div class="add-to-cart">
										<a class="btn disabled">Stok Habis</i></a>
									</div>
								<?php } ?>
								<!-- <div class="default-social">
									<h4 class="share-now">Share:</h4>
									<ul>
										<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
										<li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
endforeach;
?>
<!-- Modal end -->
<?php $x = 1;
foreach ($fastam as $f) :
	$id = $f['id'];
	$gambar = $f['gambar_fasilitas_tambahan'];
	$nama = $f['nama_produk'];
	$tipe = $f['tipe'];
	$stok = $f['stok'];
	$kategori = $f['kategori'];
	$harga = $f['harga_produk'];
	$deskripsi = $f['deskripsi']
?>
	<!-- Modal -->
	<div class="modal fade" id="produkModal<?= $id ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
				</div>
				<div class="modal-body">
					<div class="row no-gutters">
						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<!-- Product Slider -->
							<div class="product-gallery">
								<div class="quickview-slider-active">
									<div class="single-slider">
										<img src="<?= base_url("/assets/image-produk/" . $gambar) ?>" alt="<?= $nama ?>">
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
									<?php } else if ($stok == 0 || $stok <= 0) { ?>
										<div class="quickview-stock">
											<span class="text-danger"><i class="fa fa-times-circle-o"></i> out of stock </span>
										</div>
									<?php } ?>
								</div>
								<h3>Rp. <?= number_format($harga, 0, ',', '.') ?>,00</h3>
								<div class="quickview-peragraph">
									<p><?= $deskripsi ?></p>
								</div>
								<br>
								<div class="quantity">
									<!-- Input Order -->
									<!-- <div class="input-group">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="text" name="quant[1]" class="input-number" data-min="1" data-max="1000" value="1">
										<div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
												<i class="ti-plus"></i>
											</button>
										</div>
									</div> -->
									<!--/ End Input Order -->
								</div>
								<?php if ($stok > 0) { ?>
									<div class="add-to-cart">
										<?= anchor('frontend/cart/add_to_cart/' . $id, '<div class="btn btn-primary"> Add to cart </div>') ?>
										<!-- <a href="#" class="btn min"><i class="ti-heart"></i></a> -->
									</div>
								<?php } else if ($stok == 0 || $stok <= 0) { ?>
									<div class="add-to-cart">
										<a class="btn disabled">Stok Habis</i></a>
									</div>
								<?php } ?>
								<!-- <div class="default-social">
									<h4 class="share-now">Share:</h4>
									<ul>
										<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
										<li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
endforeach;
?>