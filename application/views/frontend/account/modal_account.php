<?php
foreach ($customer->result_array() as $i) :
    $id = $i['customer_id'];
    $nama = $i['nama'];
    $email = $i['email'];
    $username = $i['username'];
    $alamat = $i['alamat'];
    $jenis_kelamin = $i['jenis_kelamin'];
    $no_hp = $i['no_hp']
?>

    <div class="modal fade" id="editAccount" role="dialog">
        <div class="modal-dialog">
            <form class="form" action="<?php echo base_url('/frontend/account/edit' . $id); ?>" method="post">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Account</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label"> Nama </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="i_nama" placeholder="Yonatan Abisai" value="<?php echo $nama; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="col-sm-2 control-label"> Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="i_email" placeholder="yonatan@gmail.com" value="<?php echo $email; ?>">
                                    <?= form_error('email', ' <small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label"> Jenis Kelamin </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="jenis_kelamin" name="i_jenis_kelamin" required>
                                    <option selected disabled>-Pilih Jenis Kelamin-</option>
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="title" class="col-sm-2 control-label"> Username </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="i_username" placeholder="yonach" value="<?php echo $username; ?>">
                            <?= form_error('i_username', ' <small class="text-danger">', '</small>') ?>
                        </div>
                    </div>
                </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label for="title" class="col-sm-2 control-label"> Alamat </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="i_alamat" placeholder="Yogyakarta" value="<?php echo $alamat; ?>">
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="title" class="col-sm-2 control-label"> Nomor Handphone </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="i_no_hp" placeholder="yonach" value="<?php echo $no_hp; ?>">
                <?= form_error('i_no_hp', ' <small class="text-danger">', '</small>') ?>
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