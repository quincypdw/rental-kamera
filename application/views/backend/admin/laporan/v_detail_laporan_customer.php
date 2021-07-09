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
                            <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                            <li class="breadcrumb-item"><a href="<?php base_url('backend/admin/laporan_pendapatan') ?>">Laporan Customer</a></li>
                            <li class="breadcrumb-item">Detail</a></li>
                        </ol>
                    </div>
                    <?php echo $this->session->flashdata('message'); ?>

                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Detail Penyewaan</h6>
                            </div>
                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                    <thead class="thead light">
                                        <tr>
                                            <th>Kode Transaksi</th>
                                            <th>Nama Customer</th>
                                            <th>Tanggal Peminjaman</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($detail->result_array() as $i) { ?>
                                            <tr>
                                                <td><?= $i['kode_transaksi']; ?></td>
                                                <td><?= $i['nama']; ?></td>
                                                <td><?= $i['tanggal_order']; ?></td>
                                            </tr>
                                        <?php } ?>
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
</body>

</html>