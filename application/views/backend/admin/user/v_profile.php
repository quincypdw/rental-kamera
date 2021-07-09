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
                        <h1 class="h3 mb-0 text-gray-800">PROFILE ADMIN</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url("backend/overview"); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile Admin</li>
                        </ol>
                    </div>

                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Profile Image -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img class="img-profile rounded-circle" src="<?= base_url('assets/image-user/' . $this->session->userdata('masuk')[0]->foto_user); ?>" width="200" alt="User profile picture">
                                            </div>
                                            <h3 class="profile-username text-center"><?= $this->session->userdata('masuk')[0]->name; ?></h3>
                                            <p class="text-muted text-center"><?php $kedudukan = $this->session->userdata('masuk')[0]->level_id;
                                                                                if ($kedudukan == 1) {
                                                                                    echo ("Administrator");
                                                                                } else {
                                                                                    echo ("Owner");
                                                                                } ?> </p>

                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">About Me</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <strong><i class="fas fa-atlas mr-1"></i> Email</strong>

                                                    <p class="text-muted">
                                                        <?= $this->session->userdata('masuk')[0]->email; ?>
                                                    </p>

                                                    <hr>

                                                    <strong><i class="fas fa-venus-mars mr-1"></i> Jenis Kelamin</strong>

                                                    <p class="text-muted"><?= $this->session->userdata('masuk')[0]->jenis_kelamin; ?></p>

                                                    <hr>

                                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                                    <p class="text-muted">
                                                        <span class="tag tag-danger">UI Design</span>
                                                        <span class="tag tag-success">Coding</span>
                                                        <span class="tag tag-info">Javascript</span>
                                                        <span class="tag tag-warning">PHP</span>
                                                        <span class="tag tag-primary">Node.js</span>
                                                    </p>

                                                    <hr>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->

                                        <!-- About Me Box -->
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>


                <!-- Footer -->
                <?php $this->load->view('backend/admin/partials/footer.php'); ?>
                <!-- Footer -->
            </div>
            <!-- ./wrapper -->
            <?php $this->load->view('backend/admin/partials/logout_modal.php'); ?>

            <!-- JS -->
            <?php $this->load->view('backend/admin/partials/js.php'); ?>
</body>

</html>