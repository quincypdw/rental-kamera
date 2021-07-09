<div class="modal fade" id="addKamera" role="dialog">
	<div class="modal-dialog">
		<?= form_open_multipart(base_url('backend/admin/kamera/add')); ?>
		<div class="modal-content">

			<div class="modal-header">
				<h5 class="modal-title">Add Kamera</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<div class="form-group">
					<div class="row">
						<label for="title" class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-10">
							<input type="text" class=form-control name="i_nama" placeholder="Nikon DSLR D5600 Kit 18-55mm VR" required>
						</div>
					</div>

					<br>

					<div class="row">
						<label for="title" class="col-sm-2 control-label">Tipe</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="i_tipe" placeholder="DSLR" required>
						</div>
					</div>

					<br>

					<div class="row">
						<label for="title" class="col-sm-2 control-label">Merk</label>
						<div class="col-sm-10">
							<input type="text" class=form-control name="i_merk" placeholder="Nikkon" required>
						</div>
					</div>

					<br>

					<div class="row">
						<label for="title" class="col-sm-2 control-label">Mega Pixel</label>
						<div class="col-sm-10">
							<input type="text" class=form-control name="i_megapixel" placeholder="24" required>
						</div>
					</div>

					<br>

					<div class="row">
						<label for="title" class="col-sm-2 control-label">Stok</label>
						<div class="col-sm-10">
							<input type="text" class=form-control name="i_stok" placeholder="15" required>
						</div>
					</div>

					<br>

					<div class="row">
						<label for="title" class="col-sm-2 control-label">Harga</label>
						<div class="col-sm-10">
							<input type="text" class=form-control name="i_harga_kamera" placeholder="50000" required>
						</div>
					</div>

					<br>

					<div class="row">
						<label for="title" class="col-sm-2 control-label">Deskripsi</label>
						<div class="col-sm-10">
							<input type="text" class=form-control name="i_deskripsi" placeholder="Tuliskan Deskripsi Kamera" required>
						</div>
					</div>

					<br>

					<div class="row">
						<div class="col-sm-12">
							<input type="file" class="custom-file-input" name="i_gambar">
							<label class="custom-file-label" for="customFile">Gambar Kamera</label>
						</div>
					</div>
				</div>
			</div>


			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-primary">Add</button>
			</div>
		</div>
		<?= form_close(); ?>
	</div>
</div>


<?php
foreach ($kamera->result_array() as $i) : $id = $i['id'];
	$nama = $i['nama_kamera'];
	$tipe = $i['tipe'];
	$merk = $i['merk'];
	$megapixel = $i['megapixel'];
	$stok = $i['stok'];
	$harga = $i['harga_kamera'];
	$deskripsi = $i['deskripsi'];
	$gambar = $i['gambar_kamera'];

?>

	<div class="modal fade" id="editKamera<?php echo $id; ?>" role="dialog">
		<div class="modal-dialog">
			<?php echo form_open_multipart(base_url('backend/admin/kamera/edit/' . $id)); ?>
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title">Edit Kamera</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label">Nama Kamera</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="i_nama" value="<?php echo $nama ?>" required>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label">Tipe Kamera</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="i_tipe" value="<?php echo $tipe ?>" required>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label">Merk Kamera</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="i_merk" value="<?php echo $merk ?>" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label">Megapixel Kamera</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="i_megapixel" value="<?php echo $megapixel ?>" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label">Stok Kamera</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="i_stok" value="<?php echo $stok ?>" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label">Harga Kamera</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="i_harga_kamera" value="<?php echo $harga ?>" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label">Deskripsi Kamera</label>
							<div class="col-sm-10">
								<textarea class="form-control" name="i_deskripsi" cols="30" rows="5" required><?php echo $deskripsi ?></textarea>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label">Upload Image</label>
							<div class="col-sm-10">
								<input type="file" name="i_gambar" class="form-control" accept="image/*">
								<input type="hidden"  id="old"  name="old"  value="<?php echo $gambar   ?>">
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Edit</button>
				</div>

			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
<?php
endforeach;
?>

<?php
foreach ($kamera->result_array() as $i) : $id = $i['id'];
	$nama = $i['nama_kamera'];
	$tipe = $i['tipe'];
	$merk = $i['merk'];
	$megapixel = $i['megapixel'];
	$stok = $i['stok'];
	$harga = $i['harga_kamera'];
	$deskripsi = $i['deskripsi'];
	$gambar = $i['gambar_kamera'];

?>
	<div class="modal fade" id="deleteKamera<?php echo $id; ?>" role="dialog">
		<div class="modal-dialog">
			<form class="form" action="<?php echo base_url('/backend/admin/kamera/delete/' . $id); ?>" method="post">
				<div class="modal-content">

					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
						<button type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">x</span>
						</button>
					</div>

					<div class="modal-body">Pilih "Delete" untuk menghapus kamera dengan nama <?php echo $nama; ?> </div>

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