<div class="modal fade" id="addFasilitas_tambahan" role="dialog">
    <div class="modal-dialog">
        <?php echo form_open_multipart(base_url('backend/admin/fasilitas_tambahan/add')); ?>
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add Fasilitas Tambahan</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <label for="title" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class=form-control name="i_nama" placeholder="Nikon SpeedLight SB-700" required>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <label for="title" class="col-sm-2 control-label">Tipe</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="i_tipe" placeholder="SB-700" required>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <label for="title" class="col-sm-2 control-label">Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class=form-control name="i_kategori" placeholder="Flash Eksternal" required>
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
                        <label for="title" class="col-sm-2 control-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="text" class=form-control name="i_stok" placeholder="15" required>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <label for="title" class="col-sm-2 control-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class=form-control name="i_harga_produk" placeholder="50000" required>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <label for="title" class="col-sm-2 control-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class=form-control name="i_deskripsi" placeholder="Tuliskan Deskripsi Fasilitas Tambahan" cols="30" rows="5" required></textarea>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="i_gambar">
                            <label class="custom-file-label" for="customFile">Foto Fasilitas Tambahan</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
</div>
</div>

<?php
foreach ($fasilitas_tambahan->result_array() as $i) : $id = $i['id'];
    $nama = $i['nama_produk'];
    $tipe = $i['tipe'];
    $kategori = $i['kategori'];
    $merk = $i['merk'];
    $stok = $i['stok'];
    $harga = $i['harga_produk'];
    $deskripsi = $i['deskripsi'];
    $gambar = $i['gambar_fasilitas_tambahan'];

?>

    <div class="modal fade" id="editFasilitas_tambahan<?php echo $id; ?>" role="dialog">
        <div class="modal-dialog">
            <?php echo form_open_multipart(base_url('backend/admin/fasilitas_tambahan/edit/' . $id)); ?>
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Fasilitas Tambahan</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_nama" value="<?php echo $nama ?>" placeholder="Nikon SpeedLight SB-700" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Tipe</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_tipe" value="<?php echo $tipe ?>" placeholder="SB-700" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_kategori" value="<?php echo $kategori ?>" placeholder="Flash Eksternal" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Merk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_merk" value="<?php echo $merk ?>" placeholder="Nikkon" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Stok</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_stok" value="<?php echo $stok ?>" placeholder="15" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_harga_produk" value="<?php echo $harga ?>" placeholder="50000" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="i_deskripsi" placeholder="Tuliskan Deskripsi Fasilitas Tambahan" cols="30" rows="5" required><?php echo $deskripsi ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Upload Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="i_gambar" class="form-control">
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
foreach ($fasilitas_tambahan->result_array() as $i) : $id = $i['id'];
    $nama = $i['nama_produk'];
    $tipe = $i['tipe'];
    $kategori = $i['kategori'];
    $merk = $i['merk'];
    $stok = $i['stok'];
    $harga = $i['harga_produk'];
    $deskripsi = $i['deskripsi'];
    $gambar = $i['gambar_fasilitas_tambahan'];

?>
    <div class="modal fade" id="deleteFasilitas_tambahan<?php echo $id; ?>" role="dialog">
        <div class="modal-dialog">
            <form class="form" action="<?php echo base_url('/backend/admin/fasilitas_tambahan/delete/' . $id); ?>" method="post">
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