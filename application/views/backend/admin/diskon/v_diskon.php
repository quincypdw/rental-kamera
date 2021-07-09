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
                        <h1 class="h3 mb-0 text-gray-800">DATA DISKON</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Diskon</li>
                        </ol>
                    </div>
                    <?php echo $this->session->flashdata('message'); ?>

                    <div class="row mb-3">
                        <!-- Invoice Example -->
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Diskon</h6>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#addDiskon">+</button>
                                </div>
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Kode Diskon</th>
                                                <th>Potongan</th>
                                                <th>Tanggal Awal</th>
                                                <th>Tanggal Akhir</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $x = 1;
                                            foreach ($diskon->result_array() as $i) : $id = $i['diskon_id'];
                                                $kode_promo = $i['kode_promo'];
                                                $potongan = $i['potongan'];
                                                $tanggal_awal = $i['tanggal_awal'];
                                                $tanggal_akhir = $i['tanggal_akhir'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $id; ?></td>
                                                    <td><?php echo $kode_promo; ?></td>
                                                    <td><?php echo $potongan, '%'; ?></td>
                                                    <td><?php echo $tanggal_awal; ?></td>
                                                    <td><?php echo $tanggal_akhir; ?></td>
                                                    <td>
                                                        <button class="btn btn-primary" data-toggle="modal" data-target="#editDiskon<?php echo $id; ?>"><i class="fas fa-edit"></i></button>
                                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteDiskon<?php echo $id; ?>"><i class="fas fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            <?php
                                                $x++;
                                            endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- MAIN -->

                            <?php $this->load->view('backend/admin/partials/logout_modal.php'); ?>

                        </div>
                        <!---Container Fluid-->
                    </div>
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
        <?php $this->load->view('backend/admin/diskon/modals/diskon_modal.php'); ?>
        <?php $this->load->view('backend/admin/partials/js.php'); ?>
</body>

</html>