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
                        <h1 class="h3 mb-0 text-gray-800">DATA ADMIN</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Administrator</li>
                        </ol>
                    </div>

                    <div class="row mb-3">
                        <!-- Invoice Example -->
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
                                </div>
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No. </th>
                                                <th>Nama Admin</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Level</th>
                                                <th>Profile Picture</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $x = 1;
                                            foreach ($admin->result_array() as $i) : $admin_id = $i['id'];
                                                $nama = $i['name'];
                                                $username = $i['username'];
                                                $level_id = $i['level_id'];
                                                if ($level_id == 1) {
                                                    $level_id = ("Administrator");
                                                } else {
                                                    $level_id = ("Owner");
                                                }
                                                $jenis_kelamin = $i['jenis_kelamin'];
                                                $email = $i['email'];
                                                $gambar = $i['foto_user'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $admin_id; ?></td>
                                                    <td><?php echo $nama; ?></td>
                                                    <td><?php echo $username; ?></td>
                                                    <td><?php echo $email; ?></td>
                                                    <td><?php echo $jenis_kelamin; ?></td>
                                                    <td><?php echo $level_id; ?></td>
                                                    <td><img src="<?= base_url('assets/image-user/' . $gambar); ?>" style="width: 75px; height: 75px" class="img-profile rounded-circle"></td>
                                                    <td>
                                                        <button class="btn btn-primary" data-toggle="modal" data-target="#editAdmin<?php echo $admin_id; ?>"><i class="fas fa-edit"></i></button>
                                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteAdmin<?php echo $admin_id; ?>"><i class="fas fa-trash"></i></button>
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
        <?php $this->load->view('backend/admin/user/modals/admin_modal'); ?>
        <?php $this->load->view('backend/admin/partials/js.php'); ?>
</body>

</html>