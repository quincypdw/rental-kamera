<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>INVOICE PENYEWAAN PESONA LENS</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>
<body  onLoad="window.print()">
<div id="laporan">
<?php
    error_reporting(0);
    $b=$penyewaan->row_array();
    $c=$jumlah_sewa->row_array();
    $id = $b['order_id'];
    $kode_transaksi = $b['kode_transaksi'];
    $customer = $b['nama'];
    $order = $b['tanggal_order'];
    $peminjaman = $b['tanggal_peminjaman'];
    $kembali = $b['tanggal_kembali'];
    $jmlpinjam = $c['jml_sewa'];
?>
<table align="center" style="width:800px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">

</table>

<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
<tr>
    <td colspan="4" style="width:700px; padding-left:20px;"><center>INVOICE</center><br/></td>
</tr>
                        <tr>
                            <td style="width:140px;padding-left:5px;">Kode Transaksi</td>
                            <td>: <b><?php echo $kode_transaksi?></b></td>
                            <td style="width:100px;padding-left:5px;">Nama</td>
                            <td>: <?php echo $customer?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="padding-left:5px;">NIK</td>
                            <td>: <?php echo $_SESSION['nik']; ?></td>
                        </tr>
                        <tr>
                            <td style="padding-left:5px;">Tanggal Peminjaman</td>
                            <td>: <?php echo date("d-M-Y",strtotime($peminjaman)) ?></td>
                            <td style="padding-left:5px;">Jumlah Barang</td>
                            <td>: <?php echo $jmlpinjam ?></td>
                        </tr>
                        <tr>
                            <td style="padding-left:5px;">Tanggal Kembali</td>
                            <td>: <?php echo date("d-M-Y",strtotime($kembali)) ?></td>
                            <td style="padding-left:5px;">Tanggal Order</td>
                            <td>: <?php echo date("d-M-Y",strtotime($order)) ?></td>
                        </tr>
</table>
<table border="0" align="center" style="width:800px;border:none;">
        <tr>
            <th style="text-align:center">Rincian Produk</th>
        </tr>
</table>
<table border="1" align="center" style="width:800px;margin-bottom:20px;">
    <tr>
        <th style="text-align:center">No</th>
        <th style="text-align:center">Nama Barang</th>
        <th style="text-align:center">Jumlah</th>
        <th style="text-align:center">Diskon</th>
        <th style="text-align:center">Total Harga</th>
    </tr>
<tbody>
    <?php
        $x = 1;
        foreach ($penyewaan->result_array() as $i) :
            $id = $i['order_id'];
            $kode_transaksi = $i['kode_transaksi'];
            $kamera = $i['nama_kamera'];
            $jmlkamera = $i['quantity_kamera'];
            $fastam = $i['nama_produk'];
            $jmlfastam = $i['quantity_produk'];
            $diskon = $i['diskon'];
            $total = $i['total_price'];
        ?>

            
            <tr>
                <td style="text-align:center;"><?php echo $x ?></td>
                <?php if($fastam==null){ ?>
                <td style="text-align:center;"><?php echo $kamera; ?></td>
                <td style="text-align:center;"><?php echo $jmlkamera; ?></td>
                <?php } else if($kamera==null) { ?>
                <td style="text-align:center;"><?php echo $fastam; ?></td>
                <td style="text-align:center;"><?php echo $jmlfastam; ?></td>
                <?php } ?>
                <td style="text-align:center;"><?php echo $diskon; ?></td>
                <td style="text-align:center;"><?php echo 'Rp. '.number_format($total, 0, ',', '.').',00'; ?></td>
            </tr>
        <?php $x++;
        endforeach; 
        ?>
        <?php
        foreach($totalharga->result_array() as $d):
            $subtotal = $d['total_harga'];
        ?>
        <tr>
            <td colspan="4" style="text-align:right;"><b>Total:  </b></td>
            <td style="text-align:center;"><b><?php echo 'Rp. '.number_format($subtotal, 0, ',', '.').',00'; ?></b></td>
        </tr>
        <?php endforeach; ?>
</tbody>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td><b><?php echo "Perhatian: ";?></b></td>
    </tr>
    <tr>
        <td><?php echo "1. Invoice ini harap disimpan dan dibawa saat pengambilan barang.";?></td>
    </tr>
    <tr>
        <td><?php echo "2. Pengambilan barang tanpa invoice dianggap tidak sah.";?></td>
    </tr>
    <tr>
        <td><?php echo "3. Harap melakukan Konfirmasi Pembayaran terlebih dahulu sebelum mengambil barang.";?></td>
    </tr>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td align="center">Yogyakarta, <?php date_default_timezone_set('Asia/Jakarta');
        function tgl_indo($tanggal){
            $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);
            
            // variabel pecahkan 0 = tanggal
            // variabel pecahkan 1 = bulan
            // variabel pecahkan 2 = tahun
        
            return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }
        
        echo tgl_indo(date('Y-m-d'));?></td>
    </tr>

    <tr>
    <td><br/><br/><br/><br/></td>
    </tr>
    <tr>
        <td align="center"><b>( <?php echo $customer;?> )</b></td>
    </tr>

</table>

</div>
</body>
</html>
