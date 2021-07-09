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
                            <li class="breadcrumb-item"><a href="<?php base_url('backend/admin/transaksi') ?>">Transaksi</a></li>
                            <li class="breadcrumb-item"><a href="<?php base_url('backend/admin/transaksi') ?>">Transaksi Penyewaan</a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>
                    <?php echo $this->session->flashdata('message'); ?>

                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
                            </div>
                            <?php
                            $a = $transaksi->row_array();
                            $order_id = $a['order_id'];
                            $kode_transaksi = $a['kode_transaksi'];
                            $customer = $a['nama_customer'];
                            $order = $a['tanggal_order'];
                            $peminjaman = $a['tanggal_peminjaman'];
                            $kembali = $a['tanggal_kembali'];
                            $admin = $a['nama_admin'];
                            $nik = $a['nik'];
                            $denda = $a['denda'];
                            $diskon = $a['diskon'];
                            $catatan = $a['catatan'];
                            $jumlah = 0;
                            foreach ($transaksi->result_array() as $b) :
                                $jmlkam = $b['quantity_kamera'];
                                $jmlftam = $b['quantity_produk'];
                                $jumlah += $jmlkam;
                                $jumlah += $jmlftam;
                            endforeach;
                            ?>
                            <table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
                                <tr>
                                    <td style="width:140px;padding-left:5px;">Kode Transaksi</td>
                                    <td>: <b><?php echo $kode_transaksi ?></b></td>
                                    <td style="width:100px;padding-left:5px;">Nama</td>
                                    <td>: <?php echo $customer ?></td>
                                </tr>
                                <tr>
                                    <td style="padding-left:5px;">Tanggal Order</td>
                                    <td>: <?php echo date("d-M-Y", strtotime($order)) ?></td>
                                    <td style="padding-left:5px;">NIK</td>
                                    <td>: <?php echo $nik; ?></td>
                                </tr>
                                <tr>
                                    <td style="padding-left:5px;">Tgl. Peminjaman</td>
                                    <td>: <?php echo date("d-M-Y", strtotime($peminjaman)) ?></td>
                                    <td style="padding-left:5px;">Jml Barang</td>
                                    <td>: <?php echo $jumlah ?></td>
                                </tr>
                                <tr>
                                    <td style="padding-left:5px;">Tgl. Kembali</td>
                                    <td>: <?php echo date("d-M-Y", strtotime($kembali)) ?></td>
                                </tr>
                            </table>
                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th style="text-align:center;">Quantity</th>
                                            <th style="text-align:center;">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $x = 1;
                                        foreach ($transaksi->result_array() as $i) :
                                            $nama_kamera = $i['nama_kamera'];
                                            $nama_produk = $i['nama_produk'];
                                            $qty1 = $i['quantity_kamera'];
                                            $qty2 = $i['quantity_produk'];
                                            $harga = $i['subtotal'];
                                        ?>
                                            <tr>
                                                <td><?= $x; ?></td>
                                                <?php if ($qty2 == null) { ?>
                                                    <td><?= $nama_kamera; ?></td>
                                                    <td style="text-align:center;"><?= $qty1; ?></td>
                                                <?php } else if ($qty1 == null) { ?>
                                                    <td><?= $nama_produk; ?></td>
                                                    <td style="text-align:center;"><?= $qty2; ?></td>
                                                <?php } ?>
                                                <td style="text-align:center;"><?= 'Rp. ' . number_format($harga, 0, ',', '.') . ',00'; ?></td>
                                            </tr>
                                        <?php
                                            $x++;
                                        endforeach; ?>
                                        <?php if($diskon!=0) { ?>
                                        <tr>
                                            <td colspan=3 style="text-align:center;">Diskon</td>
                                            <td style="text-align:center;"><?= $diskon . "%" ?>
                                        </tr>
                                        <?php } ?>
                                        <?php
                                        foreach($total_harga->result_array() as $d):
                                            $subtotal = $d['total_harga'];
                                        ?>
                                        <tr>
                                            <td colspan=3 style="text-align:center;"><b>Total</b></td>
                                            <td style="text-align:center;"><b><?php echo 'Rp. ' . number_format($subtotal, 0, ',', '.') . ',00'; ?></b></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php if($denda!=0) { ?>
                                        <tr>
                                            <td colspan=3 style="text-align:center; color:red;">Denda</td>
                                            <td style="text-align:center; color:red;"><?= 'Rp. ' . number_format($denda, 0, ',', '.') . ',00'; ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive p-5">
                                <h6>Ditangani oleh : <?php if($admin!="") { echo $admin ; } else { echo "Pemesanan Online"; } ?></h6>
                                <h6>Catatan : <?= $catatan ?></h6>
                            </div>
                            <!-- kosong dulu -->


                        </div>
                    </div>
                </div>

                <?php $this->load->view('backend/admin/partials/logout_modal.php'); ?>

            </div>
            <!---Container Fluid-->
        </div>
    </div>
    <!-- Footer -->
    <?php $this->load->view('backend/admin/partials/footer.php'); ?>
    <!-- Footer -->
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php $this->load->view('backend/admin/partials/js.php'); ?>
    <script>
        $('#dataTableHover').DataTable({
            pageLength: false,
            paging: false,
            searching: false
        });;
    </script>
</body>

</html>