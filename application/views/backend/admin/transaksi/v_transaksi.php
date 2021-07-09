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
                            <li class="breadcrumb-item"><a href="<?php base_url('backend/admin/transaksi') ?>">Transaksi Penyewaan</a></li>
                        </ol>
                    </div>
                    <?php echo $this->session->flashdata('message'); ?>

                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
                            </div>
                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Kode Transaksi</th>
                                            <th>Nama Customer</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status Barang</th>
                                            <th>Status Bayar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Kode Transaksi</th>
                                            <th>Nama Customer</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status Barang</th>
                                            <th>Status Bayar</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $x = 1;
                                        foreach ($transaksi1->result_array() as $i) : $id = $i['order_id'];
                                            $kode_transaksi = $i['kode_transaksi'];
                                            $customer = $i['nama'];
                                            $admin = $i['name'];
                                            $order = $i['tanggal_order'];
                                            $peminjaman = $i['tanggal_peminjaman'];
                                            $kembali = $i['tanggal_kembali'];
                                            $status_barang = $i['status_barang'];
                                            $status_bayar = $i['status_bayar'];
                                            $denda = $i['denda'];
                                            $catatan = $i['catatan'];
                                        ?>
                                            <td><?= $kode_transaksi; ?></td>
                                            <td><?= $customer; ?></td>
                                            <td><?= $peminjaman; ?></td>
                                            <td><?= $kembali?></td>
                                            <td><?php if ($status_barang=="DIPESAN" || $status_barang==""){ echo '<span class="badge badge-primary">DIPESAN</span>' ?>
                                                <?php } else if ($status_barang=="DIPINJAM"){ echo '<span class="badge badge-warning btn-md">DIPINJAM</span>' ?>
                                                <?php } else if ($status_barang=="KEMBALI"){ echo '<span class="badge badge-success btn-md">KEMBALI</span>' ?>
                                                <?php } else if ($status_barang=="RUSAK"){ echo '<span class="badge badge-danger btn-md">RUSAK</span>' ?>
                                                <?php } ?>
                                            </td>
                                            <td><?php if ($status_bayar==""){ echo '<span class="badge badge-danger">BELUM LUNAS</span>' ?>
                                                <?php } else if ($status_bayar=="DP"){ echo '<span class="badge badge-warning">DP</span>' ?>
                                                <?php } else if ($status_bayar=="LUNAS"){ echo '<span class="badge badge-success">LUNAS</span>' ?>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary" href="<?= base_url("backend/admin/transaksi/detail/".$id) ?>"><i class="fas fa-eye"></i></a>
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#editStatusBayar<?php echo $id; ?>"><i class="fas fa-money-bill-wave-alt"></i></button>
                                                <button class="btn btn-success" data-toggle="modal" data-target="#modalPengembalian<?php echo $id; ?>"><i class="fas fa-undo-alt"></i></button>
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteTransaksi<?php echo $id; ?>"><i class="fas fa-trash"></i></button>
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
    <?php $this->load->view('backend/admin/transaksi/modals/transaksi_modal'); ?>
    <?php $this->load->view('backend/admin/partials/js.php'); ?>
    <script>
        $('#dataTableHover').DataTable( {
            "order": [[ 0, "desc" ]]
        } );;
    </script>
</body>

</html>