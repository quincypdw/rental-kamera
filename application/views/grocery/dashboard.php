<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php
	foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>

	<?php $this->load->view("admin/_partials/head.php"); ?>
</head>
<body>
	<?php $this->load->view("admin/_partials/navbar.php"); ?>

	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<?php $this->load->view("admin/_partials/sidebar.php"); ?>
		</div>
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid">
					<h1 class="mt-4">Dashboard</h1>
					<?php $this->load->view("admin/_partials/breadcrumb.php");?>
					<div class="row">


		<a href='<?php echo site_url('tokobuku/author_management')?>'>Author</a> |
		<a href='<?php echo site_url('tokobuku/book_category_management')?>'>Book Management</a> |
		<a href='<?php echo site_url('tokobuku/customer_management')?>'>Customer</a> |
		<a href='<?php echo site_url('tokobuku/supplier_management')?>'>Supplier</a> | 
		<a href='<?php echo site_url('tokobuku/level_management')?>'>Level</a> |		 
		<a href='<?php echo site_url('tokobuku/book')?>'>Book</a>
		
	</div>
	<div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
</body>
</div>
</main>
<?php $this->load->view("admin/_partials/footer.php");?>
</div>
</div>
<?php $this->load->view("admin/_partials/js.php");?>
<?php $this->load->view("admin/_partials/modals.php"); ?>
<?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
</html>
