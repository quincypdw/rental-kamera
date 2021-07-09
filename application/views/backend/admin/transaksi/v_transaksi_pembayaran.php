<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('backend/admin/partials/header.php') ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?php $this->load->view('backend/admin/partials/sidebar.php') ?>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <?php $this->load->view('backend/admin/partials/navbar.php') ?>
                <!-- Topbar -->

                <!-- MAIN -->
                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php base_url('backend/overview') ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                            <li class="breadcrumb-item"><a href="<?php base_url('backend/admin/transaksi') ?>">Transaksi Pembayaran</a></li>
                        </ol>
                    </div>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>

                <div id="layoutAuthentication">
                    <div id="layoutAuthentication_content">
                        <main>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12">
                                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                                            <div class="card-header">
                                                <h3 class="text-center font-weight-light my-4">Data Transaksi</h3>
                                            </div>
                                            <div class="card-body">

                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label">Admin</label>
                                                    <div class="col-md-1">
                                                        <input class="form-control" type="text" id="id_admin" value="<?php $kedudukan = $this->session->userdata('masuk')[0]->level_id;
                                                                                                                        if ($kedudukan == 1) {
                                                                                                                            echo ("Administrator");
                                                                                                                        } else {
                                                                                                                            echo ("Owner");
                                                                                                                        } ?>" disabled />
                                                    </div>

                                                    <div class="col-md-4 mr-5">
                                                        <input class="form-control" type="text" id="nama_admin" value="<?= $this->session->userdata('masuk')[0]->name ?>" disabled />
                                                    </div>

                                                    <div class="ml-2 col-md-2">
                                                        <label class="col-form-label">Kode Transaksi</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input class="form-control" type="text" id="id_transaksi" value="<?= $invoice ?>" disabled />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Customer</label>
                                                    <div class="col-sm-1">
                                                        <input class="form-control" type="text" id="id_customer" disabled />
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" type="text" id="nama_customer" disabled />
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#searchCustomer"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Kamera</label>
                                                    <div class="col-sm-2">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#searchKamera"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Fasilitas Tambahan</label>
                                                    <div class="col-sm-2">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#searchProduk"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Tanggal Peminjaman</label>
                                                    <div class="col-sm-3">
                                                        <input class="form-control" type="date" id="peminjaman" name="peminjaman" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Durasi Peminjaman</label>
                                                    <div class="col-sm-3">
                                                        <select class="form-control" name="durasi" id="durasi" required>
                                                            <option disabled selected>-Durasi-</option>
                                                            <option value="1">1 Hari</option>
                                                            <option value="3">3 Hari</option>
                                                            <option value="7">7 Hari</option>
                                                            <option value="14">14 Hari</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Kode Promo</label>
                                                    <div class="col-sm-3">
                                                        <input class="form-control" type="text" id="diskon" name="diskon" />
                                                    </div>
                                                </div>

                                                <div class="col-sm-14">
                                                    <h4>Keranjang Belanjaan</h4>
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Barang</th>
                                                                <th>Produk</th>
                                                                <th>Harga</th>
                                                                <th>Jumlah</th>
                                                                <th>Total</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="detail_cart">
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <br>
                                                <br>
                                                <br>

                                                <button type="submit" class="process_payment btn btn-primary btn-block" data-id_transaksi="<?= $invoice ?>"><i class="fa fa-cash-register"></i> Process Payment</button>
                                                <a href="<?php base_url("backend/admin/transaksi_pembayaran/clear_cart") ?>" class="btn btn-primary btn-block"><i class="fa fa-trash"></i> CANCEL </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('backend/admin/partials/logout_modal.php'); ?>

    </div>
    <!-- Footer -->
    <?php $this->load->view('backend/admin/partials/footer.php'); ?>
    <!-- Footer -->

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php $this->load->view('backend/admin/partials/js.php'); ?>
    <?php $this->load->view('backend/admin/transaksi/modals/transaksi_pembayaran_modal.php'); ?>
</body>

</html>