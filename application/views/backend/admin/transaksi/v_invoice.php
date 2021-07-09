<!DOCTYPE html>
<html>

<head>
    <style type="type/css">
        @page{
        margin: 0cm 0cm;
    }
    body{
        margin-top: 1cm;
        margin-left: 2cm;
        margin-bottom: 1cm;
        margin-right: 2cm;
    }

    header{
        position: fixed;
        margin-left: 2cm;
        margin-right: 2cm;
        top: 1cm;
    }

    footer{
        position: fixed;
        bottom: 1cm;
        left: 2cm;
        right: 2cm;
        top: 1cm;
        font-size: 10cm;
        font-family: Arial, Helvetica, san-serif;
    }
    main{
        font-family: Arial, Helvetica, san-serif;
        font-size: 12px;
    }

    .title{
        text-align: center;
        font-family: Arial, Helvetica, san-serif;
    }

    #table{
        border-collapse: collapse;
        width: 100%;
        line-height: 100%;
    }

    #table td, #table th{
        border: 1px solid #000;
        padding: 5px;
    }

    #table th{
        text-align: center;
        background-color: grey;
        color: #000;
    }
    </style>
</head>

<body>
    <header></header>
    <footer></footer>
    <main>
        <div class="row">
            <div class="title">
                <h2>INVOICE</h2>
            </div>
            <div>
                <table id="table">
                    <thead>
                        <tr>
                            <th style="text-align: center; font-family:courier;">No.Nota</th>
                            <th>Nama Kasir</th>
                            <th>Pembeli</th>
                            <th>Tanggal Order</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Kembali</th>
                            <th>Diskon</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $x = 1;
                        foreach ($invoice->result_array() as $i) : $id = $i['order_id'];
                            $kode_transaksi = $i['kode_transaksi'];
                            $customer = $i['nama'];
                            $admin = $i['name'];
                            $order = $i['tanggal_order'];
                            $peminjaman = $i['tanggal_peminjaman'];
                            $kembali = $i['tanggal_kembali'];
                            $diskon = $i['diskon'];
                            $total = $i['total_price'];
                        ?>
                            <tr>

                                <td style="text-align:center;"><?= $kode_transaksi; ?></td>
                                <td style="text-align:center;"><?= $admin; ?></td>
                                <td style="text-align:center;"><?= $customer; ?></td>
                                <td style="text-align:center;"><?= $order; ?></td>
                                <td style="text-align:center;"><?= $peminjaman; ?></td>
                                <td style="text-align:center;"><?= $kembali; ?></td>
                                <td style="text-align:center;"><?= $diskon . "%"?></td>
                                <td>Rp. <?= number_format($total, 0, ',', '.'); ?></td>
                            </tr>
                        <?php
                            $x++;
                        endforeach; ?>
                    </tbody>
            </div>
        </div>
    </main>

</html>