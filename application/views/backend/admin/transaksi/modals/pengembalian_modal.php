<?php
foreach ($pengembalian->result_array() as $i) : $id = $i['pengembalian_id'];
    $kode_transaksi = $i['kode_transaksi'];
    $customer = $i['nama'];
    $admin = $i['name'];
    $status = $i['status_bayar'];
    $kurang = $i['jumlah_kurang_bayar'];
    $kembali = $i['tanggal_kembali'];
    $denda = $i['denda'];
    $catatan = $i['catatan'];
    $peminjaman = $i['tanggal_peminjaman'];
    $status_barang = $i['status_barang'];

?>

    <div class="modal fade" id="editPengembalian<?php echo $id; ?>" role="dialog">
        <div class="modal-dialog">
            <?php echo form_open_multipart(base_url('backend/admin/pengembalian/edit/' . $id)); ?>
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Pengembalian</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Order ID</label>
                            <div class="col-sm-10">
                                <input type="text" class=form-control name="i_order_id" value="<?php echo $id ?>">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Kode Transaksi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_kode_transaksi" value="<?php echo $kode_transaksi ?>" readonly>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Jumlah Kurang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_jumlah_kurang" value="<?php echo $kurang ?>">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Customer</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_customer" value="<?php echo $customer ?>" readonly>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Admin</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_admin" value="<?php echo $admin ?>" readonly>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Tanggal Kembali</label>
                            <div class="col-sm-10">
                                <input type="date" class=form-control name="i_tanggal_kembali" value="<?php echo $kembali ?>">
                            </div>
                        </div>

                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Denda</label>
                            <div class="col-sm-10">
                                <input type="text" class=form-control name="i_denda" value="<?php echo $denda ?>">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Catatan</label>
                            <div class="col-sm-10">
                                <input type="text" class=form-control name="i_catatan" value="<?php echo $catatan ?>">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Tanggal Peminjaman</label>
                            <div class="col-sm-10">
                                <input type="date" class=form-control name="i_tanggal_peminjaman" value="<?php echo $peminjaman ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title ">Status Pembayaran</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="i_status_pembayaran" value="<?php echo $status ?>">
                                        <option disabled selected value="<?php echo $status ?>">-Pilih Status-</option>
                                        <option value="Lunas">Lunas</option>
                                        <option value="DP">DP</option>
                                        <option value="Belum Dibayar">Belum Dibayar</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title ">Status Barang</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="i_status_barang" value="<?php echo $status_barang ?>">
                                        <option disabled selected value="<?php echo $status ?>">-Pilih Status-</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak">Rusak</option>
                                    </select>
                                </div>
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
foreach ($pengembalian->result_array() as $i) : $id = $i['pengembalian_id'];
    $kode_transaksi = $i['kode_transaksi'];
    $customer = $i['nama'];
    $admin = $i['name'];
    $status = $i['status_bayar'];
    $kurang = $i['jumlah_kurang_bayar'];
    $kembali = $i['tanggal_kembali'];
    $denda = $i['denda'];
    $catatan = $i['catatan'];
    $peminjaman = $i['tanggal_peminjaman'];
    $status_barang = $i['status_barang'];

?>
    <div class="modal fade" id="deletePengembalian<?php echo $id; ?>" role="dialog">
        <div class="modal-dialog">
            <form class="form" action="<?php echo base_url('/backend/admin/pengembalian/delete/' . $id); ?>" method="post">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>

                    <div class="modal-body">Pilih "Delete" untuk menghapus data pengembalian dengan id <?php echo $id; ?> </div>

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