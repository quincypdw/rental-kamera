<!-- <div class="modal fade" id="addCustomer" role="dialog">
	<div class="modal-dialog">
		<form class="form" action="<?php echo base_url('/admin/customer/add'); ?>" method="post">
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title">Add Customer</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>

				</div>

				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label">Customer's Fullname</label>
							<div class="col-sm-10">
								<input type="text" class=form-control name="i_fullname" placeholder="Mark Zurkerburg" required>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label">Customer's Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="i_email"
								placeholder="markzurkerburg@gmail.com" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label">Customer's No Member</label>
							<div class="col-sm-10">
								<input type="text" class=form-control name="i_no_member" placeholder="Mark Zurkerburg" required>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label">Customer's Jenis Kelamin</label>
							<div class="col-sm-10">
								<input type="text" class=form-control name="i_jenis_kelamin" placeholder="Mark Zurkerburg" required>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label">Customer's Nomor Telepon</label>
							<div class="col-sm-10">
								<input type="text" class=form-control name="i_nomor_telepon" placeholder="Mark Zurkerburg" required>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<label for="title" class="col-sm-2 control-label">Customer's Alamat</label>
							<div class="col-sm-10">
								<input type="text" class=form-control name="i_alamat" placeholder="Mark Zurkerburg" required>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>

			</div>
		</form>
	</div>
</div> -->

<?php
foreach ($admin->result_array() as $i) :
    $admin_id = $i['id'];
    $nama = $i['name'];
    $username = $i['username'];
    $password = $i['password'];
    $email = $i['email'];
    $jenis_kelamin = $i['jenis_kelamin'];
    $level = $i['level_id'];
    $gambar = $i['foto_user'];

?>

    <div class="modal fade" id="editAdmin<?php echo $admin_id; ?>" role="dialog">
        <div class="modal-dialog">
            <?php echo form_open_multipart(base_url('/backend/admin/admindata/edit/' . $admin_id)); ?>
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Admin</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Admin Name</label>
                            <div class="col-sm-10">
                                <input type="text" class=form-control name="i_name" placeholder="Mark Zurkerburg" value="<?php echo $nama; ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Admin Username</label>
                            <div class="col-sm-10">
                                <input type="text" class=form-control name="i_username" placeholder="Mark Zurkerburg" value="<?php echo $username; ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Admin Password</label>
                            <div class="col-sm-10">
                                <input type="hidden" class=form-control name="i_password" placeholder="" value="<?php echo $password; ?>">
                                <input type="password" class=form-control name="i_password" value="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Admin Email</label>
                            <div class="col-sm-10">
                                <input type="text" class=form-control name="i_email" placeholder="Mark Zurkerburg" value="<?php echo $email; ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Admin Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="i_jenis_kelamin" value="<?php echo $jenis_kelamin; ?>">
                                    <!-- <option disabled selected>-Pilih Jenis Kelamin-</option> -->
                                    <option value="Laki-laki" <?php if ($jenis_kelamin == "Laki-laki") echo 'selected=="selected"'; ?>>Laki-laki</option>
                                    <option value="Perempuan" <?php if ($jenis_kelamin == "Perempuan") echo 'selected=="selected"'; ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Level</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="i_level" value="<?php echo $level; ?>">
                                    <option value="1" <?php if ($level == "1") echo 'selected=="selected"'; ?>>Administrator</option>
                                    <option value="2"  <?php if ($level == "2") echo 'selected=="selected"'; ?>>Owner</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Upload Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="i_gambar" class="form-control" value="<?= $gambar ?>">
                                <input type="hidden" id="old" name="old" value="<?php echo $gambar   ?>">
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
foreach ($admin->result_array() as $i) :
    $admin_id = $i['id'];
    $nama = $i['name'];
    $username = $i['username'];
    $password = $i['password'];
    $email = $i['email'];
    $jenis_kelamin = $i['jenis_kelamin'];
    $level = $i['level_id'];

?>
    <div class="modal fade" id="deleteAdmin<?php echo $admin_id; ?>" role="dialog">
        <div class="modal-dialog">
            <form class="form" action="<?php echo base_url('/backend/admin/admindata/delete/' . $admin_id); ?>" method="post">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>

                    <div class="modal-body">Pilih "Delete" untuk menghapus data Admin dengan nama <?php echo $nama; ?> </div>

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