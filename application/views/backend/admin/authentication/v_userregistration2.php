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
                        <h1 class="h3 mb-0 text-gray-800">REGISTRATION DATA ADMIN</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Registration Admin</li>
                        </ol>
                    </div>

                    <div id="layoutAuthentication">
                        <div id="layoutAuthentication_content">
                            <main>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                                <div class="card-header">
                                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                                </div>
                                                <?php echo form_open_multipart(base_url('authuser/register')); ?>
                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label class="small mb-2" for="inputNama">Nama</label>
                                                        <input class="form-control py-4" type="text" name="name" value="<?= set_value('name'); ?>" placeholder="Enter Fullname" />
                                                        <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="small mb-2" for="inputUsername">Username</label>
                                                        <input class="form-control py-4" type="text" name="username" value="<?= set_value('username'); ?>" placeholder="Enter Username" />
                                                        <?= form_error('nip', '<small class="text-danger">', '</small>') ?>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-2" type="password" for="inputPassword">Password</label>
                                                                <input class="form-control py-4" type="password" name="password1" placeholder="Enter password" />
                                                                <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-2" type="password" for="inputConfirmPassword">Confirm Password</label>
                                                                <input class="form-control py-4" type="password" name="password2" placeholder="Confirm password" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="small mb-2" for="inputEmail">Email</label>
                                                        <input class="form-control py-4" type="text" name="email" placeholder="Enter email address" />
                                                        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-6 control-label">Jenis Kelamin</label>
                                                                <div class="col-lg-13">
                                                                    <select class="form-control" name="jenis_kelamin" required>
                                                                        <option disabled selected>-Pilih Jenis Kelamin-</option>
                                                                        <option value="Laki Laki">Laki-Laki</option>
                                                                        <option value="Perempuan">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-4 control-label">Level</label>
                                                                <div class="col-lg-13">
                                                                    <select class="form-control" name="level_id" required>
                                                                        <option disabled selected>-Pilih Level-</option>
                                                                        <option value="1">Administrator</option>
                                                                        <option value="2">Owner</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="title" class="col-sm-4 control-label">Profile Picture</label>
                                                        <div class="row-md-8">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="i_gambar" id="i_gambar">
                                                                <label class="custom-file-label">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>

                                                    <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Create Account</button></div>
                                                </div>
                                                <?php echo form_close(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </main>
                        </div>
                        <!-- MAIN -->

                        <!-- Modal Logout -->
                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to logout?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                        <a href="login.html" class="btn btn-primary">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---Container Fluid-->
                </div>
            </div>
            <br>
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