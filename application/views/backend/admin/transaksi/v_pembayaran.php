<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('backend/admin/partials/header.php') ?>
</head>
    <script>
        $("#dataTableHover").dataTable({
            "order":[[3,'desc']]
        });
    </script>
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
                        <h1 class="h3 mb-0 text-gray-800">Pembayaran</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php base_url('backend/overview') ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                            <li class="breadcrumb-item"><a href="<?php base_url('backend/admin/pembayaran') ?>">Pembayaran</a></li>
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
                                            <th>Kode Transaksi</th>
                                            <th>Nama Pengirim</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Kode Transaksi</th>
                                            <th>Nama Pengirim</th>
                                            <th class="sorting_desc" aria-sort="descending">Tanggal Bayar</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        foreach ($pembayaran->result_array() as $i) : $id = $i['id_bayar'];
                                            $kode_transaksi = $i['kode_transaksi'];
                                            $order_id = $i['order_id'];
                                            $tanggal = $i['tanggal_bayar'];
                                            $jumlah = $i['jumlah_bayar'];
                                            $nama = $i['nama_pengirim'];
                                            $bukti = $i['bukti_transfer'];
                                            $status_bayar = $i['status_bayar'];
                                        ?>
                                            <td><?php echo $kode_transaksi; ?></td>
                                            <td><?php echo $nama; ?></td>
                                            <td><?php echo $tanggal; ?></td>
                                            <td><?php echo 'Rp.'.number_format($jumlah, 0, ',', '.').',00'; ?></td>
                                            <td><?php if ($status_bayar==""){ echo '<span class="badge badge-danger">BELUM LUNAS</span>' ?>
                                                <?php } else if ($status_bayar=="DP"){ echo '<span class="badge badge-warning">DP</span>' ?>
                                                <?php } else if ($status_bayar=="LUNAS"){ echo '<span class="badge badge-success">LUNAS</span>' ?>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#viewPembayaran<?php echo $id; ?>"><i class="fas fa-eye"></i></button>
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#editPembayaran<?php echo $id; ?>"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#deletePembayaran<?php echo $id; ?>"><i class="fas fa-trash"></i></button>
                                            </td>
                                            </tr>
                                        <?php
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
    <script>
        $('#dataTableHover').DataTable( {
            "order": [[ 2, "desc" ]]
        } );;
    </script>
    <?php $this->load->view('backend/admin/transaksi/modals/pembayaran_modal'); ?>
</body>

</html>