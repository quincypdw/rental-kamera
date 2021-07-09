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
                        <h1 class="h3 mb-0 text-gray-800">Pengembalian</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php base_url('authuser') ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                            <li class="breadcrumb-item"><a href="<?php base_url('backend/admin/pengembalian') ?>">Pengembalian</a></li>
                        </ol>
                    </div>
                    <?php echo $this->session->flashdata('message'); ?>

                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
                            </div>
                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Kode Transaksi</th>
                                            <th>Customer</th>
                                            <th>Admin</th>
                                            <th>Status Bayar</th>
                                            <th>Jumlah Kurang</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Denda</th>
                                            <th>Catatan</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Status Barang</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kode Transaksi</th>
                                            <th>Customer</th>
                                            <th>Admin</th>
                                            <th>Status Bayar</th>
                                            <th>Jumlah Kurang</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Denda</th>
                                            <th>Catatan</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Status Barang</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $x = 1;
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
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $kode_transaksi; ?></td>
                                            <td><?php echo $customer; ?></td>
                                            <td><?php echo $admin; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td><?php echo $kurang; ?></td>
                                            <td><?php echo $kembali; ?></td>
                                            <td><?php echo $denda; ?></td>
                                            <td><?php echo $catatan; ?></td>
                                            <td><?php echo $peminjaman; ?></td>
                                            <td><?php echo $status_barang; ?></td>
                                            <td>
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#editPengembalian<?php echo $id; ?>"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#deletePengembalian<?php echo $id; ?>"><i class="fas fa-trash"></i></button>
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

                    <?php $this->load->view('backend/admin/partials/logout_modal.php'); ?>

                </div>
                <!---Container Fluid-->
            </div>
            <!-- Footer -->
            <?php $this->load->view('backend/admin/partials/footer.php'); ?>
            <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php $this->load->view('backend/admin/partials/js.php'); ?>
    <?php $this->load->view('backend/admin/transaksi/modals/pengembalian_modal'); ?>
</body>

</html>