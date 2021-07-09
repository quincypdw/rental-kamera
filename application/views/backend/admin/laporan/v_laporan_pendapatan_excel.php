<?php 
header("Content-type:application/octet-stream/");

header("Content-Disposition:attachment; filename= laporan_pendapatan.xls");

header("Pragma: no-cache");

header("Expires: 0");
?>

<table border="1" width="100%">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nomor Nota</th>
            <th>Nama Kasir</th>
            <th>Nama Customer</th>
            <th>Tanggal Order</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
    <?php $i=1;
    foreach($excel as $value):
    ?>
    <tr>
    <td><?= $i++; ?></td>
    <td><?= $value['kode_transaksi']; ?></td>
    <td><?= $value['name'];?></td>
    <td><?= $value['nama'];?></td>
    <td><?= $value['tanggal_order'];?></td>
    <td><?= $value['tanggal_peminjaman'];?></td>
    <td><?= $value['tanggal_kembali'];?></td>
    <td><?= $value['total_price'];?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>