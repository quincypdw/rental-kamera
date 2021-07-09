<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-headphone-alt"></i> +62 822 6088 7371</li>
								<li><i class="ti-email"></i> pesonalens@gmail.com</li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
							<ul class="list-main">
								<li><i class="ti-location-pin"></i><a href="https://goo.gl/maps/aEEWR5qQDQgLzqHP6">Pesona Residence blok A4, Yogyakarta</a></li>
								<li><i class="ti-alarm-clock"></i> 08:00 - 20:00 </li>
								<?php 
								if ($this->session->userdata('customer_id') != null){ ?>
								<li><i class="ti-user"></i><a href="<?= base_url('frontend/account') ?>"><?php echo $_SESSION['username'] ?></a></li>
								<li><i class="ti-power-off"></i><a href="<?= base_url('frontend/auth/logout') ?>"> Logout</a>
								</li>
								<?php } else { ?>
								<li><i class="ti-user"></i><a href="<?= base_url('frontend/account') ?>"><?php echo " My Account" ?></a></li>
								<li><i class="ti-power-off"></i><a href="<?= base_url('frontend/auth') ?>"> Login</a>
								</li>
								<?php } ?>
							</ul>
						</div>
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="<?= base_url('welcome')?>"><img src="<?= base_url("assets/") ?>images/logo2.png" alt="logo"></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
								<form>
									<input name="search" placeholder="Search Products Here....." type="search">
									<button class="btnn"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<div class="sinlge-bar">
								<a href="<?= base_url('frontend/account') ?>" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
							</div>
							<div class="sinlge-bar shopping">
								<a href="<?= base_url("frontend/cart")?>" class="single-icon"><i class="ti-bag"></i> <span class="total-count"><?php echo $this->cart->total_items()?></span></a>
								<!-- Shopping Item -->
								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span><?php echo $this->cart->total_items() . ' items' ?></span>
										<a href="<?= base_url("frontend/cart")?>">View Cart</a>
									</div>
								</div>
								<!--/ End Shopping Item -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		