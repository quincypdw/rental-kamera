<?php
foreach ($customer->result_array() as $i) : $id = $i['customer_id'];
    $nama = $i['nama'];
    $nik = $i['nik'];
    $tanggal_lahir = $i['tanggal_lahir'];
    $jenis_kelamin = $i['jenis_kelamin'];
    $alamat = $i['alamat'];
    $username = $i['username'];
    $password = $i['password'];
    $no_hp = $i['no_hp'];
    $email = $i['email'];

?>

    <div class="modal fade" id="editCustomer<?php echo $id; ?>" role="dialog">
        <div class="modal-dialog">
            <form class="form" action="<?php echo base_url('/backend/admin/customer/edit/' . $id); ?>" method="post">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Diskon</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class=form-control name="i_nama" placeholder="Bambang Sukijan" value="<?php echo $nama; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="i_username" placeholder="asdfghjkl123" value="<?php echo $username; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="hidden" class=form-control name="i_password" placeholder="" value="<?php echo $password; ?>">
                                    <input type="password" class=form-control name="i_password" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="i_jenis_kelamin" value="<?php echo $jenis_kelamin; ?>">
                                        <!-- <option disabled selected>-Pilih Jenis Kelamin-</option> -->
                                        <option value="Laki-laki" <?php if ($jenis_kelamin == "Laki-laki") echo 'selected=="selected"'; ?>>Laki-laki</option>
                                        <option value="Perempuan" <?php if ($jenis_kelamin == "Perempuan") echo 'selected=="selected"'; ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="i_alamat" placeholder="jl kolonel sugiono" value="<?php echo $alamat; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="i_tanggal_lahir" placeholder="" value="<?php echo $tanggal_lahir; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="i_email" placeholder="example@gmail.com" value="<?php echo $email; ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
endforeach;
?>

<?php
foreach ($customer->result_array() as $i) : $id = $i['customer_id'];
    $nama = $i['nama'];
    $nik = $i['nik'];
    $tanggal_lahir = $i['tanggal_lahir'];
    $jenis_kelamin = $i['jenis_kelamin'];
    $alamat = $i['alamat'];
    $username = $i['username'];
    $password = $i['password'];
    $no_hp = $i['no_hp'];
    $email = $i['email'];

?>
    <div class="modal fade" id="deleteCustomer<?php echo $id; ?>" role="dialog">
        <div class="modal-dialog">
            <form class="form" action="<?php echo base_url('/backend/admin/customer/delete/' . $id); ?>" method="post">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>

                    <div class="modal-body">Pilih "Delete" untuk menghapus customer dengan nama <?php echo $nama; ?> </div>

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