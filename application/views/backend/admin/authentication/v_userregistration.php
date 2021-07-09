<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Registration Administrator</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
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
                                <div class="card-body">
                                    <form class="user" method="post" action="<?php echo base_url('authuser/register'); ?>">

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
                                                    <label class="small mb-2" for="inputPassword">Password</label>
                                                    <input class="form-control py-4" type="password" name="password1" placeholder="Enter password" />
                                                    <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-2" for="inputConfirmPassword">Confirm Password</label>
                                                    <input class="form-control py-4" type="password" name="password2" placeholder="Confirm password" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-2" for="inputEmail">Email</label>
                                            <input class="form-control py-4" type="text" name="email" value="<?= set_value('email'); ?>" placeholder="Enter email address" />
                                            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title ">Jenis Kelamin</label>
                                                    <div class="col-lg-8">
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
                                                    <div class="col-lg-8">
                                                        <select class="form-control" name="level_id" required>
                                                            <option disabled selected>-Pilih Level-</option>
                                                            <option value="1">Administrator</option>
                                                            <option value="2">Owner</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- <div class="form-group">
                                            <?php echo form_open_multipart('image/uploadimage',['class'=>'shake','id'=>'constractForm','foto_user'=>'contact-form']); ?>
                                            <div class="form-group label-floating">
                                            <label class="small mb-2" for="foto_user">Images</label>
                                            <?php echo form_upload(['foto_user'=> 'thumb_image','class' => 'form-control']); ?>
                                            <?= form_error('foto_user', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                            <div class="form-submit mt-5">
                                            <i class="material-icons mdi mdi-message-outline"></i>
                                            </button>
                                            </div>
                                        </div> -->


                                        <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Create Account</button></div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="<?= base_url('backend/Overview'); ?>">Back to Menu</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Pesona Team Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>