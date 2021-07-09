<script src="<?= base_url('assets/RuangAdmin-master/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/RuangAdmin-master/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/RuangAdmin-master/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/RuangAdmin-master/') ?>js/ruang-admin.min.js"></script>
<script src="<?= base_url('assets/plugins/sweetalert/sweetalert.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/sweetalert/sweetshow.js') ?>"></script>
<script src="<?= base_url('assets/RuangAdmin-master/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/RuangAdmin-master/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script>
	$(document).ready(function() {
		$('#dataTable').DataTable(); // ID From dataTable 
		$('#dataTableHover').DataTable(); // ID From dataTable with Hover
	});
</script>


<!-- Tombol Process Payment -->
<script type="text/javascript">
	$(document).ready(function() {
		$('.process_payment').click(function() {
			var kode_transaksi = $(this).data("id_transaksi");
			var customer = document.getElementById('id_customer').value;
			var peminjaman = document.getElementById('peminjaman').value;
			var durasi = document.getElementById('durasi').value;
			var diskon = document.getElementById('diskon').value;
			$.ajax({
				url: "<?= base_url('backend/admin/transaksi_pembayaran/add_penyewaan'); ?>",
				method: "POST",
				data: {
					kode_transaksi: kode_transaksi,
					customer: customer,
					peminjaman: peminjaman,
					durasi: durasi,
					diskon: diskon
				},
				success: function(data) {
					window.location.replace('transaksi_pembayaran/print_invoice');
					setTimeout("window.open(self.location, '_self');", 1500);

				}
			});
		});
	});
</script>

<!-- JS Klik Search Customer -->
<script type="text/javascript">
	$(document).ready(function() {
		var table_member = $('#dataTableHover').DataTable();
		$('#dataTableHover tbody').on('click', 'tr', function() {
			var data_customer = table_member.row(this).data();
			$('#id_customer').val(data_customer[0]);
			$('#nama_customer').val(data_customer[1]);
			$('#searchCustomer').modal('hide');
		});
	});
</script>

<!-- JS Klik Search Kamera -->
<script type="text/javascript">
	$(document).ready(function() {
		var table_member2 = $('#dataTableHover2').DataTable();
		$('#dataTableHover2 tbody').on('click', 'tr', function() {
			var data_kamera = table_member2.row(this).data();
			$('#nama_kamera').val(data_kamera[0]);
			$('#searchKamera').modal('hide');
		});
	});
</script>

<!-- JS Klik Search Fasilitas Tambahan -->
<script type="text/javascript">
	$(document).ready(function() {
		var table_member3 = $('#dataTableHover3').DataTable();
		$('#dataTableHover3 tbody').on('click', 'tr', function() {
			var data_produk = table_member3.row(this).data();
			$('#nama_produk').val(data_produk[0]);
			$('#searchProduk').modal('hide');
		});
	});
</script>

<!-- JS Add to Cart -->
<script type="text/javascript">
	$(document).ready(function() {
		$('.add_cart').click(function() {
			var product_id = $(this).data("productid");
			var product_name = $(this).data("productname");
			var product_price = $(this).data("productprice");
			var product_status = $(this).data("productstatus");
			var quantity = $('#' + product_id).val();
			$.ajax({
				url: "<?= site_url('backend/admin/transaksi_pembayaran/add_to_cart'); ?>",
				method: "POST",
				data: {
					product_id: product_id,
					product_name: product_name,
					product_price: product_price,
					product_status: product_status,
					quantity: quantity
				},
				success: function(data) {
					$('#detail_cart').html(data);
				}
			});
		});

		$('#detail_cart').load("<?= site_url('backend/admin/transaksi_pembayaran/load_cart'); ?>");

		$(document).on('click', '.remove_cart', function() {
			var row_id = $(this).attr("id");

			$.ajax({
				url: "<?= site_url('backend/admin/transaksi_pembayaran/hapus_cart'); ?>",
				method: "POST",
				data: {
					row_id: row_id
				},
				success: function(data) {
					$('#detail_cart').html(data);
				}
			});
		});
	});
</script>