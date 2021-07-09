<div class="modal fade" id="addDiskon" role="dialog">
    <div class="modal-dialog">
        <?php echo form_open_multipart(base_url('backend/admin/diskon/add')); ?>
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add Diskon</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <label for="title" class="col-sm-2 control-label">Kode Promo</label>
                        <div class="col-sm-10">
                            <input type="text" class=form-control name="i_kode_promo" placeholder="RAMADHANMURAH" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="title" class="col-sm-2 control-label">Potongan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="i_potongan" placeholder="50 atau 60" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <label for="title" class="col-sm-2 control-label">Tanggal Awal</label>
                        <div class="col-sm-10">
                            <input type="date" class=form-control name="i_tanggal_awal" placeholder="" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <label for="title" class="col-sm-2 control-label">Tanggal Akhir</label>
                        <div class="col-sm-10">
                            <input type="date" class=form-control name="i_tanggal_akhir" placeholder="" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php
foreach ($diskon->result_array() as $i) : $id = $i['diskon_id'];
    $kode_promo = $i['kode_promo'];
    $potongan = $i['potongan'];
    $tanggal_awal = $i['tanggal_awal'];
    $tanggal_akhir = $i['tanggal_akhir'];

?>

    <div class="modal fade" id="editDiskon<?php echo $id; ?>" role="dialog">
        <div class="modal-dialog">
            <?php echo form_open_multipart(base_url('backend/admin/diskon/edit/' . $id)); ?>
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Diskon</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Kode Promo</label>
                            <div class="col-sm-10">
                                <input type="text" class=form-control name="i_kode_promo" placeholder="RAMADHANMURAH" value="<?=$kode_promo ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Potongan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_potongan" placeholder="50 atau 60" value="<?= $potongan ?>" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Tanggal Awal</label>
                            <div class="col-sm-10">
                                <input type="date" class=form-control name="i_tanggal_awal" placeholder="" value="<?= $tanggal_awal ?>" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="title" class="col-sm-2 control-label">Tanggal Akhir</label>
                            <div class="col-sm-10">
                                <input type="date" class=form-control name="i_tanggal_akhir" placeholder="" value="<?= $tanggal_akhir ?>" required>
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
foreach ($diskon->result_array() as $i) : $id = $i['diskon_id'];
    $kode_promo = $i['kode_promo'];
    $potongan = $i['potongan'];
    $tanggal_awal = $i['tanggal_awal'];
    $tanggal_akhir = $i['tanggal_akhir'];

?>
    <div class="modal fade" id="deleteDiskon<?php echo $id; ?>" role="dialog">
        <div class="modal-dialog">
            <form class="form" action="<?php echo base_url('/backend/admin/diskon/delete/' . $id); ?>" method="post">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>

                    <div class="modal-body">Pilih "Delete" untuk menghapus diskon dengan kode promo <?php echo $kode_promo; ?> </div>

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