<?php 
    require 'koneksi.php';
    $conn = mysqli_connect("localhost","root","","toko_cat");
    $result_penjualan = mysqli_query($conn, "SELECT * FROM penjualan");
    $penjualan = mysqli_fetch_all($result_penjualan, MYSQLI_ASSOC);
    $no = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan</title>
</head>
<body >
    <h1 style="text-align:center;">Toko Cat Guna Bangun Jaya</h1>
    <h2 style="text-align:center;">Data Penjualan</h2>
    <button type="submit"  style="margin: 0 71.4%; padding-bottom: 3px; width:100px"><a href="input.php">Tambah Data</a></button>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0" style="margin: auto;">
        <tr>
            <th style="padding-top: 3px;">ID</th>
            <th>Nama Customer</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Tanggal Penjualan</th>
            <th>Jenis Cat</th>
            <th>Warna</th>
            <th>Jumlah Beli</th>
            <th colspan="3">Aksi</th>
        </tr>
        <?php foreach($penjualan as $pj) : ?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $pj["nama_customer"]?></td>
            <td><?php echo $pj["no_hp"]?></td>
            <td><?php echo $pj["alamat"]?></td>
            <td><?php echo $pj["tgl_penjualan"]?></td>
            <td><?php echo $pj["jenis_cat"]?></td>
            <td><?php echo $pj["warna"]?></td>
            <td><?php echo $pj["jml_beli"]?></td>
            <td><a href="hapus.php/?id=<?= $pj["id"]; ?>">Hapus</a></td>
            <td><a href="edit.php/?id=<?= $pj["id"]; ?>">Edit</a></td>
            <td><a href="nota.php/?id=<?= $pj["id"]; ?>">Nota</a></td>
        </tr>
        <?php $no++; ?>
        <?php endforeach ?>
    </table>
</body>
</html>