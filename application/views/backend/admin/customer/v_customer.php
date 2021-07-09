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
                        <h1 class="h3 mb-0 text-gray-800">Customer</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php base_url('backend/overview') ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                            <li class="breadcrumb-item"><a href="<?php base_url('backend/admin/laporan_pendapatan') ?>">Laporan Customer</a></li>
                        </ol>
                    </div>
                    <?php echo $this->session->flashdata('message'); ?>

                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Data Customer</h6>
                            </div>
                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Username</th>
                                            <th>Nomor Handphone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $x = 1;
                                        foreach ($customer->result_array() as $i) : $id = $i['customer_id'];
                                            $nik = $i['nik'];
                                            $nama = $i['nama'];
                                            $tanggal_lahir = $i['tanggal_lahir'];
                                            $jenis_kelamin = $i['jenis_kelamin'];
                                            $alamat = $i['alamat'];
                                            $username = $i['username'];
                                            $nomor_hp = $i['no_hp'];
                                            $email = $i['email'];
                                        ?>
                                            <tr>
                                                <td><?php echo $id; ?></td>
                                                <td><?php echo $nik; ?></td>
                                                <td><?php echo $nama; ?></td>
                                                <td><?php echo $tanggal_lahir; ?></td>
                                                <td><?php echo $jenis_kelamin; ?></td>
                                                <td><?php echo $alamat; ?></td>
                                                <td><?php echo $username; ?></td>
                                                <td><?php echo $nomor_hp; ?></td>
                                                <td><?php echo $email; ?></td>

                                                <td>
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#editCustomer<?php echo $id; ?>"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteCustomer<?php echo $id; ?>"><i class="fas fa-trash"></i> </button>
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
                    <!-- MAIN -->

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
    <?php $this->load->view('backend/admin/customer/modals/customer_modal.php'); ?>
    <?php $this->load->view('backend/admin/partials/js.php'); ?>
</body>

</html>