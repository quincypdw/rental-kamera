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
                <h2>Laporan Produk PALALEPALEPALEPALE</h2>
            </div>
            <div>
                <table id="table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jumlah Kamera</th>
                            <th>Jumlah Fasilitas Tambahan</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $x = 1;
                        foreach ($laporan as $i) :$tanggal = $i['tanggal_order'];
                            $qk = $i['quantity_kamera'];
                            $qp = $i['quantity_produk'];

                        ?>
                            <tr>
                                <td style="text-align:center;"><?= $tanggal; ?></td>
                                <td style="text-align:center;"><?= $qk; ?></td>
                                <td style="text-align:center;"><?= $qp; ?></td>
                            </tr>
                        <?php
                            $x++;
                        endforeach; ?>
                    </tbody>
            </div>
        </div>
    </main>

</html>