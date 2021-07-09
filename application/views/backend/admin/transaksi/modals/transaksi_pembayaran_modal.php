<!-- Modal Customer -->
<div class="modal fade" id="searchCustomer" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $x = 1;
                            foreach ($customer->result_array() as $i) : $id = $i['customer_id'];
                                $nama = $i['nama'];
                                $jenis_kelamin = $i['jenis_kelamin'];
                            ?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $nama; ?></td>
                                    <td><?php echo $jenis_kelamin; ?></td>
                                </tr>
                            <?php
                                $x++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Kamera -->
<div class="modal fade" id="searchKamera" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Fasilitas Tambahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover3">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Tipe</th>
                                <th>Merk</th>
                                <th>Mega Pixel</th>
                                <th>Jumlah</th>
                                <th width="35%">Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $x = 1;
                            foreach ($kamera->result_array() as $i) : $id = $i['id'];
                                $nama = $i['nama_kamera'];
                                $tipe = $i['tipe'];
                                $merk = $i['merk'];
                                $megapixel = $i['megapixel'];
                                $harga = $i['harga_kamera'];
                                $status = 1;
                            ?>
                                <tr>
                                    <td><?= $id ?></td>
                                    <td><?= $nama; ?></td>
                                    <td><?= $tipe; ?></td>
                                    <td><?= $merk; ?></td>
                                    <td><?= $megapixel; ?></td>
                                    <td>
                                        <input type="number" name="quantity" id="<?php echo $id; ?>" value="1" class="form-control" style="width: 65px;">
                                    </td>
                                    <td><?= 'Rp ', number_format($harga, '0', ',', '.') ?></td>
                                    <td>
                                        <button class="add_cart btn btn-success btn-block" data-productid="<?= $id ?>" data-productname="<?= $nama ?>" data-productprice="<?= $harga ?>" data-productstatus="<?= $status ?>">
                                            <i class="fa fa-cart-plus"></i> Add
                                        </button>
                                    </td>
                                </tr>
                            <?php
                                $x++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Produk -->
<div class="modal fade" id="searchProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Fasilitas Tambahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover3">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Tipe</th>
                                <th>Kategori</th>
                                <th>Merk</th>
                                <th>Jumlah</th>
                                <th width="35%">Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $x = 1;
                            foreach ($produk->result_array() as $i) : $id = $i['id'];
                                $nama = $i['nama_produk'];
                                $tipe = $i['tipe'];
                                $kategori = $i['kategori'];
                                $merk = $i['merk'];
                                $stok = $i['stok'];
                                $harga = $i['harga_produk'];
                                $status = 2;
                            ?>
                                <tr>
                                    <td><?= $id ?></td>
                                    <td><?= $nama; ?></td>
                                    <td><?= $tipe; ?></td>
                                    <td><?= $kategori; ?></td>
                                    <td><?= $merk; ?></td>
                                    <td>
                                        <input type="number" name="quantity" id="<?php echo $id; ?>" value="1" class="form-control" style="width: 65px;">
                                    </td>
                                    <td><?= 'Rp ', number_format($harga, '0', ',', '.') ?></td>
                                    <td>
                                        <button class="add_cart btn btn-success btn-block" data-productid="<?= $id ?>" data-productname="<?= $nama ?>" data-productprice="<?= $harga ?>" data-productstatus="<?= $status ?>">
                                            <i class="fa fa-cart-plus"></i> Add
                                        </button>
                                    </td>
                                </tr>
                            <?php
                                $x++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>