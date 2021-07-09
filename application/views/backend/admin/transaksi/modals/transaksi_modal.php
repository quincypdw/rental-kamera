<?php
foreach ($transaksi->result_array() as $i) : $id = $i['order_id'];
    $kode_transaksi = $i['kode_transaksi'];

?>
    <div class="modal fade" id="deleteTransaksi<?php echo $id; ?>" role="dialog">
        <div class="modal-dialog">
            <form class="form" action="<?php echo base_url('/backend/admin/transaksi/delete/' . $id); ?>" method="post">
                <div class="modal-content">
                <?php if($status_bayar=="LUNAS") { ?>
                    <div class="alert alert-success" role="alert">Status Pembayaran sudah LUNAS! Transaksi Tidak dapat dihapus.</div>
                <?php } else { ?>

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>

                    <div class="modal-body">Pilih "Delete" untuk menghapus transaksi dengan kode transaksi <?php echo $kode_transaksi; ?> </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                <?php } ?>
                </div>
            </form>
        </div>
    </div>
<?php
endforeach;
?>

<?php
foreach ($transaksi->result_array() as $i) : $id = $i['order_id'];
    $kode_transaksi = $i['kode_transaksi'];
    $status_bayar = $i['status_bayar'];

?>

	<div class="modal fade" id="editStatusBayar<?php echo $id; ?>" role="dialog">
		<div class="modal-dialog">
			<?php echo form_open_multipart(base_url('backend/admin/transaksi/bayar_transaksi/' . $id)); ?>
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title">Edit Pembayaran</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
                <?php if($status_bayar=="LUNAS") { ?>
                    <div class="alert alert-success" role="alert">Status Pembayaran sudah LUNAS!</div>
                <?php } else { ?>

				<div class="modal-body">
					<div class="form-group">
							<div class="row">
								<label for="title" class="col-sm-2 control-label">Status Bayar</label>
								<div class="col-sm-8">
									<select class="form-control" name="status_bayar">
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
                <?php } ?>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
<?php
endforeach;
?>

<?php
foreach ($transaksi->result_array() as $i) : $id = $i['order_id'];
    $kode_transaksi = $i['kode_transaksi'];
    $status_barang = $i['status_barang'];
    $status_bayar = $i['status_bayar'];

?>
    <div class="modal fade" id="modalPengembalian<?= $id; ?>" role="dialog">
        <div class="modal-dialog">
            <form class="form" action="<?php echo base_url('/backend/admin/transaksi/kembali/' . $id); ?>" method="post">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <?php if($status_barang=="Kembali") { ?>
                    <div class="alert alert-success" role="alert">Status Barang sudah Kembali!</div>
                <?php } else { ?>
				<div class="modal-body">
                
					<div class="form-group">
							<div class="row">
								<label for="title" class="col-sm-2 control-label">Status Barang</label>
								<div class="col-sm-8">
									<select class="form-control" name="status_barang">
										<option value="DIPESAN" <?php if ($status_barang == "DIPESAN" ) echo 'selected="selected"'; ?>>DIPESAN</option>
										<option value="DIPINJAM" <?php if ($status_barang == "DIPINJAM") echo 'selected="selected"'; ?>>DIPINJAM</option>
										<option value="KEMBALI" <?php if ($status_barang == "KEMBALI") echo 'selected="selected"'; ?>>KEMBALI</option>
                                        <option value="RUSAK"  <?php if ($status_barang == "RUSAK") echo 'selected="selected"'; ?>>RUSAK</option>
									</select>
								</div>
							</div>
						</div>
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Denda</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="denda" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Catatan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="catatan" placeholder="Masukan catatan" rows="4" cols="50"></textarea>
                            </div>
                        </div>
                    </div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
                <?php } ?>
                </div>
            </form>
        </div>
    </div>
<?php
endforeach;
?>