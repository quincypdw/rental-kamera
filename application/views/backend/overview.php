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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h5 class="h5 mb-0 text-gray-800"><?php
                        date_default_timezone_set('Asia/Jakarta');
                        $Hour = date("H");

                        if ( $Hour >= 5 && $Hour <= 11 ) {
                            echo "⛅Selamat pagi, ".$this->session->userdata('masuk')[0]->name;
                        } else if ( $Hour >= 12 && $Hour <= 15 ) {
                            echo "☀Selamat siang, ".$this->session->userdata('masuk')[0]->name;
                        } else if ( $Hour >= 16 && $Hour <= 18 ) {
                            echo "☁Selamat sore, ".$this->session->userdata('masuk')[0]->name;
                        } else if ( $Hour >= 19 || $Hour <= 4 ) {
                            echo "🌙Selamat malam, ".$this->session->userdata('masuk')[0]->name;
                        }
                        ?></h5>
                    </div>
                    <?php if ($this->session->flashdata('message')) {
                        echo $this->session->flashdata('message');
                    } ?>

                    <div class="row mb-3">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pengunjung Bulan Ini</div>
                                            <?php
                                            $query = $this->db->query("SELECT * FROM tbl_pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'%m%y')");
                                            $jml = $query->num_rows();
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-walking fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Annual) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4" href="<?= base_url("backend/transaksi/transaksi_penyewaan"); ?>">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Transaksi Bulan Ini</div>
                                            <?php
                                            $query = $this->db->query("SELECT * FROM transaksi_penyewaan WHERE DATE_FORMAT(tanggal_peminjaman,'%m%y')=DATE_FORMAT(CURDATE(),'%m%y')");
                                            $jml = $query->num_rows();
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml ?></div>
                                            <div class="mt-2 mb-0 text-muted text-xs">
                                                <button class="button btn-primary mr-3" onclick="window.location.href='<?= base_url("backend/admin/transaksi") ?>';">View</button>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-cart fa-2x text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- New User Card Example -->

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pelanggan Baru</div>
                                            <?php
                                            $query = $this->db->query("SELECT * FROM customer WHERE DATE_FORMAT(date_created,'%m%y')=DATE_FORMAT(CURDATE(),'%m%y')");
                                            $jml = $query->num_rows();
                                            ?>
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jml ?></div>
                                            <div class="mt-2 mb-0 text-muted text-xs">
                                                <button class="button btn-primary" onclick="window.location.href='<?= base_url("backend/admin/customer") ?>';" >View</button>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-info"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pendapatan Bulan Ini</div>
                                            <?php
                                            $query = $this->db->query("SELECT SUM(d_penyewaan.total_price)as total_price FROM transaksi_penyewaan INNER JOIN d_penyewaan ON transaksi_penyewaan.order_id=d_penyewaan.order_id WHERE transaksi_penyewaan.status_bayar='LUNAS' AND DATE_FORMAT(tanggal_order,'%m%y')=DATE_FORMAT(CURDATE(),'%m%y')");
                                            $pendapatan=$query->row()->total_price;;
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= 'Rp.'.number_format($pendapatan, 0, ',', '.').',00'; ?></div>
                                            <div class="mt-2 mb-0 text-muted text-xs">
                                                <span class="text-danger">Hanya perkiraan</span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hand-holding-usd fa-2x text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <!-- <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Monthly Recap Report</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <!-- <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Products Sold</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle btn btn-primary btn-sm" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Month <i class="fas fa-chevron-down"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Select Periode</div>
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Week</a>
                                            <a class="dropdown-item active" href="#">Month</a>
                                            <a class="dropdown-item" href="#">This Year</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="small text-gray-500">Oblong T-Shirt
                                            <div class="small float-right"><b>600 of 800 Items</b></div>
                                        </div>
                                        <div class="progress" style="height: 12px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="small text-gray-500">Gundam 90'Editions
                                            <div class="small float-right"><b>500 of 800 Items</b></div>
                                        </div>
                                        <div class="progress" style="height: 12px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="small text-gray-500">Rounded Hat
                                            <div class="small float-right"><b>455 of 800 Items</b></div>
                                        </div>
                                        <div class="progress" style="height: 12px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="small text-gray-500">Indomie Goreng
                                            <div class="small float-right"><b>400 of 800 Items</b></div>
                                        </div>
                                        <div class="progress" style="height: 12px;">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="small text-gray-500">Remote Control Car Racing
                                            <div class="small float-right"><b>200 of 800 Items</b></div>
                                        </div>
                                        <div class="progress" style="height: 12px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <a class="m-0 small text-primary card-link" href="#">View More <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div> -->
                        </div>
                        <!-- Invoice Example -->
                        <div class="col-xl-8 col-lg-7 mb-4">
                            <!-- <div class="card">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Invoice</h6>
                                    <a class="m-0 float-right btn btn-danger btn-sm" href="#">View More <i class="fas fa-chevron-right"></i></a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Customer</th>
                                                <th>Item</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="#">RA0449</a></td>
                                                <td>Udin Wayang</td>
                                                <td>Nasi Padang</td>
                                                <td><span class="badge badge-success">Delivered</span></td>
                                                <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">RA5324</a></td>
                                                <td>Jaenab Bajigur</td>
                                                <td>Gundam 90' Edition</td>
                                                <td><span class="badge badge-warning">Shipping</span></td>
                                                <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">RA8568</a></td>
                                                <td>Rivat Mahesa</td>
                                                <td>Oblong T-Shirt</td>
                                                <td><span class="badge badge-danger">Pending</span></td>
                                                <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">RA1453</a></td>
                                                <td>Indri Junanda</td>
                                                <td>Hat Rounded</td>
                                                <td><span class="badge badge-info">Processing</span></td>
                                                <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">RA1998</a></td>
                                                <td>Udin Cilok</td>
                                                <td>Baby Powder</td>
                                                <td><span class="badge badge-success">Delivered</span></td>
                                                <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer"></div> -->
                            </div>
                        </div>
                        <!-- Message From Customer-->
                        <div class="col-xl-4 col-lg-5 ">
                            <!-- <div class="card">
                                <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-light">Message From Customer</h6>
                                </div>
                                <div>
                                    <div class="customer-message align-items-center">
                                        <a class="font-weight-bold" href="#">
                                            <div class="text-truncate message-title">Hi there! I am wondering if you can help me with a
                                                problem I've been having.</div>
                                            <div class="small text-gray-500 message-time font-weight-bold">Udin Cilok · 58m</div>
                                        </a>
                                    </div>
                                    <div class="customer-message align-items-center">
                                        <a href="#">
                                            <div class="text-truncate message-title">But I must explain to you how all this mistaken idea
                                            </div>
                                            <div class="small text-gray-500 message-time">Nana Haminah · 58m</div>
                                        </a>
                                    </div>
                                    <div class="customer-message align-items-center">
                                        <a class="font-weight-bold" href="#">
                                            <div class="text-truncate message-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                            </div>
                                            <div class="small text-gray-500 message-time font-weight-bold">Jajang Cincau · 25m</div>
                                        </a>
                                    </div>
                                    <div class="customer-message align-items-center">
                                        <a class="font-weight-bold" href="#">
                                            <div class="text-truncate message-title">At vero eos et accusamus et iusto odio dignissimos
                                                ducimus qui blanditiis
                                            </div>
                                            <div class="small text-gray-500 message-time font-weight-bold">Udin Wayang · 54m</div>
                                        </a>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a class="m-0 small text-primary card-link" href="#">View More <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!--Row-->

                        <!-- Modal Logout -->
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
