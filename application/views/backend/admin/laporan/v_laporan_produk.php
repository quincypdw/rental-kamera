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

                <?php for ($i = 0; $i < 12; $i++) {
                    $bulan[$i] = medium_bulan($i + 1);
                    $lapKamera[$i] = 0;
                    $lapFasilitas[$i] = 0;
                }
                foreach ($chart_data as $i => $value) {
                    $lapKamera[$i] = (float)$value->jumlah_kamera;
                    $lapFasilitas[$i] = (float)$value->jumlah_produk;
                }
                ?>
                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Laporan Produk</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item"><a href="./">Laporan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan Produk</li>
                        </ol>
                    </div>
                    <?php echo $this->session->flashdata('message'); ?>

                    <!-- Search Tanggal -->
                    <div class="card mb-4">
                        <div class="card-header font-weight-bold">
                            <i class="fas fa-search"></i> Search Date
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="<?php echo base_url('backend/admin/laporan_produk/search'); ?>">

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title" class="col-sm-6 control-label">Bulan</label>
                                            <div class="col-lg-13">
                                                <select class="form-control" name="bulan" id="bulan" required>
                                                    <option disabled selected>-Pilih Bulan-</option>
                                                    <option value="01">Januari</option>
                                                    <option value="02">Febuari</option>
                                                    <option value="03">Maret</option>
                                                    <option value="04">April</option>
                                                    <option value="05">Mei</option>
                                                    <option value="06">Juni</option>
                                                    <option value="07">July</option>
                                                    <option value="08">Agustus</option>
                                                    <option value="09">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
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
                            </form>
                            <?php
                            if ($data_kamera == null) {
                            } else {
                                $x = 1;
                                foreach ($data_kamera as $i) : $tanggal = $i['tanggal_order'];
                                    $kamera = $i['KAMERA'];
                                    $jumlah = $i['JUMLAHK'];
                                    //var_dump($data_bulan); DIE;
                            ?>

                                    <div class="col-lg-4">
                                        <h6 class="m-0 font-weight-bold text-primary">Kamera Terbanyak: <?= $kamera ?></h6>
                                        <br>
                                        <h6 class="m-0 font-weight-bold text-primary">Jumlah Kamera: <?= $jumlah ?></h6>
                                        <br>
                                    </div>
                            <?php
                                    $x++;
                                endforeach;
                            }
                            ?>
                            <!-- <?php
                            // if ($data_produk == null) {
                            // } else {
                            //     $x = 1;
                            //     foreach ($data_produk as $i) : $tanggal = $i['tanggal_order'];
                            //         $kamera = $i['KAMERA'];
                            //         $jumlah = $i['JUMLAHK'];
                                    //var_dump($data_bulan); DIE;
                            ?>

                                    <div class="col-lg-4">
                                        <h6 class="m-0 font-weight-bold text-primary">Fasilitas Tambahan Terbanyak: <?= $kamera ?></h6>
                                        <br>
                                        <h6 class="m-0 font-weight-bold text-primary">Jumlah Fasilitas Tambahan: <?= $kamera ?></h6>
                                    </div>
                            <?php
                                    //$x++;
                                //endforeach;
                            //}
                            ?> -->
                        </div>
                    </div>
                    <!-- Search Tanggal -->

                    <!-- Bar Chart -->
                    <div class="col-lg-12">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>
                            <a type="button" href="<?= base_url('backend/admin/laporan_produk/pdf'); ?>" class="btn btn-warning"><i class="far fa-file pdf"></i>Export PDF</a>
                        </div>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Chart Jumlah Produk Tersewa Tahun <?= date('Y') ?></h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-bar">
                                    <canvas id="myBarChart"></canvas>
                                </div>
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
    <?php $this->load->view('backend/admin/partials/js.php'); ?>
</body>

<!-- Chart Bar -->

<script type="text/javascript">
    // Bar Chart Example
    var ctx = document.getElementById("myBarChart");
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($bulan) ?>,
            datasets: [{
                label: "Jumlah Kamera",
                backgroundColor: "#FFA500",
                hoverBackgroundColor: "#FF0000",
                borderColor: "#FFA500",
                data: <?= json_encode($lapKamera) ?>,
            }, {
                label: "Jumlah Fasilitas Tambahan",
                backgroundColor: "#00FF00",
                hoverBackgroundColor: "#FFFF00",
                borderColor: "#00FF00",
                data: <?= json_encode($lapFasilitas) ?>,
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
                        unit: 'month'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 12
                    },
                    maxBarThickness: 25,
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
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
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + tooltipItem.yLabel;
                    }
                }
            },
        }
    });
</script>

<!-- Chart Bar -->

</html>