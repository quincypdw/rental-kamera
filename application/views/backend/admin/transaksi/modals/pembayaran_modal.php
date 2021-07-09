<?php
foreach ($pembayaran->result_array() as $i) : $id = $i['id_bayar'];
	$jumlahbayar = $i['jumlah_bayar'];
    $status_bayar = $i['status_bayar'];
?>

	<div class="modal fade" id="editPembayaran<?php echo $id; ?>" role="dialog">
		<div class="modal-dialog">
			<?php echo form_open_multipart(base_url('backend/admin/pembayaran/edit/' . $id)); ?>
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title">Edit Pembayaran</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
				<div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Jumlah Bayar</label>
                            <div class="col-sm-10">
                                <input type="text" class=form-control name="jumlahbayar" value="<?php echo $jumlahbayar; ?>">
                            </div>
                        </div>
                    </div>
					<div class="form-group">
							<div class="row">
								<label for="title" class="col-sm-2 control-label">Status Bayar</label>
								<div class="col-sm-8">
									<select class="form-control" name="status">
										<option value="BELUM BAYAR" <?php if ($status_bayar == "Belum Bayar" || $status_bayar=="" ) echo 'selected="selected"'; ?>>Belum Bayar</option>
										<option value="DP" <?php if ($status_bayar == "DP") echo 'selected="selected"'; ?>>DP</option>
										<option value="LUNAS" <?php if ($status_bayar == "LUNAS") echo 'selected="selected"'; ?>>Lunas</option>
									</select>
								</div>
							</div>
						</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Update</button>
				</div>

			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
<?php
endforeach;
?>

<?php
foreach ($pembayaran->result_array() as $i) : $id = $i['id_bayar'];
	$nama = $i['nama_pengirim'];

?>
	<div class="modal fade" id="deletePembayaran<?php echo $id; ?>" role="dialog">
	<div class="modal-dialog">
		<form class="form" action="<?php echo base_url('/backend/admin/pembayaran/delete/' . $id); ?>" method="post">
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
					<button type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
				</div>

				<div class="modal-body">Pilih "Delete" untuk menghapus pembayaran dengan nama <?php echo $nama; ?> </div>

				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-danger">Delete</button>
				</div>

			</div>
		</form>
	</div>
</div>
<?php
endforeach;
?>

<?php
foreach ($pembayaran->result_array() as $i) : $id = $i['id_bayar'];
	$nama = $i['nama_pengirim'];
	$gambar = $i['bukti_transfer']

?>
	<div class="modal fade" id="viewPembayaran<?php echo $id; ?>" role="dialog">
	<div class="modal-dialog">
		<form class="form" action="<?php echo base_url('/backend/admin/pembayaran/viewphoto/' . $id); ?>" method="post">
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Bukti Transaksi</h5>
					<button type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<div class="row">
						<img src="<?= base_url('assets/image-bukti/' . $gambar); ?>"style="height: 500px">
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
				</div>

			</div>
		</form>
	</div>
</div>
<?php
endforeach;
?>