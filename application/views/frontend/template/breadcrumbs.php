<?php $page = $_SERVER['PHP_SELF'];
$currentpage = ucwords(str_replace("-"," ",(basename($page,".php"))));
$currentdir = ucwords(basename(dirname($page)));
$topdir = basename(dirname(dirname($page)));
?>

<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="<?= base_url("welcome") ?>">Home </a><i class="ti-arrow-right"></i></li>
						<li><a href="#"><?php echo $currentpage; ?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->