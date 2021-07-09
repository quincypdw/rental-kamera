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
                    $lapMember[$i] = 0;
                }
                foreach ($chart_data as $i => $value) {
                    $lapMember[$i] = (float)$value->Jumlah;
                }
                ?>
                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Laporan Customer</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Customer</li>
                        </ol>
                    </div>
                    <?php echo $this->session->flashdata('message'); ?>

                    <!-- Search Tanggal -->
                    <div class="card mb-4">
                        <div class="card-header font-weight-bold">
                            <i class="fas fa-search"></i> Search Date
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="<?php echo base_url('backend/admin/laporan_customer/search'); ?>">

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

                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Data Customer</h6>
                            </div>
                            <div class="card-header"><i class="fas fa-table mr-1"></i>
                                <a type="button" href="<?= base_url('backend/admin/laporan_customer/pdf'); ?>" class="btn btn-warning"><i class="far fa-file pdf"></i>Export PDF</a>
                            </div>
                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Jumlah Customer</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($jumlah == null) {
                                        } else {
                                            $x = 1;
                                            foreach ($jumlah as $i) : $jumlah = $i['Jumlah'];
                                                $tanggal = $i['tanggal_order'];
                                                $id = $i['order_id'];
                                                $customer = $i['customer'];
                                        ?>
                                                <tr>
                                                    <td><?= $tanggal ?></td>
                                                    <td><?= $jumlah ?></td>
                                                    <td>
                                                        <a href="<?= base_url('backend/admin/laporan_customer/detail/' . $tanggal) ?>" class="btn btn-primary">View</a>
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

                    <!-- Bar Chart -->
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Chart Jumlah Customer Tahun <?= date('Y') ?></h6>
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
                label: "Jumlah Customer",
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
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