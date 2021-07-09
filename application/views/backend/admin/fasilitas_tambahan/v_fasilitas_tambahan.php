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
                        <h1 class="h3 mb-0 text-gray-800">Fasilitas Tambahan</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Fasilitas Tambahan</li>
                        </ol>
                    </div>
                    <?php echo $this->session->flashdata('message'); ?>

                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Data Fasilitas Tambahan</h6>
                                <button class="btn btn-success" data-toggle="modal" data-target="#addFasilitas_tambahan">+</button>
                            </div>
                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Tipe</th>
                                            <th>Kategori</th>
                                            <th>Merk</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>Deskripsi</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $x = 1;
                                        foreach ($fasilitas_tambahan->result_array() as $i) : $id = $i['id'];
                                            $nama = $i['nama_produk'];
                                            $tipe = $i['tipe'];
                                            $kategori = $i['kategori'];
                                            $merk = $i['merk'];
                                            $stok = $i['stok'];
                                            $harga = $i['harga_produk'];
                                            $deskripsi = $i['deskripsi'];
                                            $gambar = $i['gambar_fasilitas_tambahan'];
                                        ?>
                                            <tr>
                                                <td><?php echo $id; ?></td>
                                                <td><?php echo $nama; ?></td>
                                                <td><?php echo $tipe; ?></td>
                                                <td><?php echo $kategori; ?></td>
                                                <td><?php echo $merk; ?></td>
                                                <td><?php echo $stok; ?></td>
                                                <td><?php echo 'Rp.'.number_format($harga, 0, ',', '.').',00'; ?></td>
                                                <td><?php echo substr_replace($deskripsi, "...", 30); ?></td>
                                                <td><img src="<?= base_url('assets/image-produk/' . $gambar); ?>" style="width: 128px; height: 100px"></td>
                                                <td>
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#editFasilitas_tambahan<?php echo $id; ?>"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteFasilitas_tambahan<?php echo $id; ?>"><i class="fas fa-trash"></i></button>
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
            <?php $this->load->view('backend/admin/fasilitas_tambahan/modals/modal_fasilitas_tambahan.php'); ?>
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