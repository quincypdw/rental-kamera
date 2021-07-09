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
                <?php for ($i = 0; $i < 12; $i++) {
                    $bulan[$i] = medium_bulan($i + 1);
                    $lapMember[$i] = 0;
                }
                foreach ($chart_data as $i => $value) {
                    $lapMember[$i] = (float)$value->total;
                }
                ?>

                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php base_url('backend/overview') ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                            <li class="breadcrumb-item"><a href="<?php base_url('backend/admin/laporan_pendapatan') ?>">Laporan Pendapatan</a></li>
                        </ol>
                    </div>
                    <?php echo $this->session->flashdata('message'); ?>

                    <!-- Search Tanggal -->
                    <div class="card mb-4">
                        <div class="card-header font-weight-bold">
                            <i class="fas fa-search"></i> Search Date
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="<?php echo base_url('backend/admin/laporan_pendapatan/search'); ?>">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold"> Start Date </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="date" class="form-control pull-right" id="start_date" name="start_date">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold"> End Date </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-calendar-day"></i></span>
                                                </div>
                                                <input type="date" class="form-control pull-right" id="end_date" name="end_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="font-weight-bold"> Go </label>
                                            <div class="input-group date">
                                                <button class="btn btn-success btn-md" href="submit">
                                                    <i class="fas fa-search"> </i> Search
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="font-weight-lighter">
                                    <em>*The <b> End Date</b> input must be + 1 Day.</em>
                                    <br>e.g. End Date : 01/20/2021 &rarr; <strong> 01/21/2021 </strong>.

                                </p>
                            </form>
                        </div>
                    </div>
                    <!-- Search Tanggal -->

                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Laporan Pendapatan</h6>
                            </div>
                            <div class="card-header button-group"><i class="fas fa-table mr-1"></i>
                                <a type="button" href="<?= base_url('backend/admin/laporan_pendapatan/pdf'); ?>" class="btn btn-danger"><i class="far fa-file pdf"></i> Export PDF</a>
                                <button type="button" onclick="exportlistpeminjaman()" class="btn btn-success"><i class="fa fa-download"></i> Export Excel</a>
                            </div>
                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Kode Transaksi</th>
                                            <th>Tanggal Order</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kode Transaksi</th>
                                            <th>Tanggal Order</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        if ($find_date == null) {
                                        } else {
                                            $x = 1;
                                            foreach ($find_date->result_array() as $i) : $id = $i['d_penyewaan_id'];
                                                $kode_transaksi = $i['kode_transaksi'];
                                                $order = $i['tanggal_order'];
                                        ?>
                                                <td><?= $x; ?></td>
                                                <td><?= $kode_transaksi; ?></td>
                                                <td><?= full_date_dmy($order); ?></td>
                                                <td>
                                                    <a href="<?= base_url('backend/admin/laporan_pendapatan/detail/' . $kode_transaksi) ?>" class="btn btn-primary">View</a>
                                                </td>
                                                </tr>
                                        <?php
                                                $x++;
                                            endforeach;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Area Charts -->
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Chart Pendapatan</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                </div>
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

    <!-- Chart Area -->
    <script type="text/javascript">
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= json_encode($bulan) ?>,
                datasets: [{
                    label: "Pendapatan",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.5)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: <?= json_encode($lapMember) ?>,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 3,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return value;
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': Rp ' + tooltipItem.yLabel + ',00';
                        }
                    }
                }
            }
        });
    </script>
    <!-- Chart Area -->


    <script>
        function exportlistpeminjaman() {
            var mulai = $('#start_date').val();
            var selesai = $('#end_date').val();
            window.location.href = "<?= base_url('backend/admin/laporan_pendapatan/exportexcel/') ?>" + mulai + "/" + selesai;
        }
    </script>
</body>

</html>