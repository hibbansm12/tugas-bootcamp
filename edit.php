<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "SELECT * FROM penjualan WHERE id = $id";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $data = mysqli_fetch_assoc($result);
        $nama_customer = $data['nama_customer'];
        $no_hp = $data['no_hp'];
        $alamat = $data['alamat'];
        $tgl_penjualan = $data['tgl_penjualan'];
        $jenis_cat = $data['jenis_cat'];
        $warna = $data['warna'];
        $jml_beli = $data['jml_beli'];
    } else {
        // Handle jika query gagal
        echo "Error: " . mysqli_error($conn);
        die();
    }
} else {
    echo "Data telah diedit!";
    die();
}

if (isset($_POST['submit'])) {
    $nama_customer = $_POST['nama_customer'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $tgl_penjualan = $_POST['tgl_penjualan'];
    $jenis_cat = $_POST['jenis_cat'];
    $warna = $_POST['warna'];
    $jml_beli = $_POST['jml_beli'];
    
    $query = "UPDATE penjualan SET nama_customer='$nama_customer', no_hp='$no_hp', alamat='$alamat', tgl_penjualan='$tgl_penjualan', jenis_cat='$jenis_cat', warna='$warna', jml_beli='$jml_beli' WHERE id=$id";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        header("Location: index_mysql.php"); 
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['reset'])) {
    header("Location: index_mysql.php");
    exit();
}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Data</title>
</head>
<style>
        body {
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh; 
        }

        h1 {
            justify-content: center;
            text-align: center;
            font-size: 24px;
            margin-bottom: 0px;
        }

        form {
            width: 400px;
            padding: 20px;
            align-items: center;
            background-color: #f2f2f2;
            border: 1px solid #ddd;
            align-items: center;
            margin-left: 34%;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        button[type="reset"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
</style>

<body>
    <h1><strong>Form Edit Data</strong></h1>
    <form method="post" action="">
        <table>
            <tr>
                <td>Nama Customer</td>
                <td>:</td>
                <td><input type="text" name="nama_customer" value="<?php echo $nama_customer; ?>"></td>
            </tr>
            <tr>
                <td>No HP</td>
                <td>:</td>
                <td><input type="text" name="no_hp" value="<?php echo $no_hp; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
            </tr>
            <tr>
                <td>Tanggal Penjualan</td>
                <td>:</td>
                <td><input type="date" name="tgl_penjualan" value="<?php echo $tgl_penjualan; ?>"></td>
            </tr>
            <tr>
                <td>Jenis Cat</td>
                <td>:</td>
                <td>
                    <select name="jenis_cat">
                        <option value="Bituminous Paint" <?php if ($jenis_cat === 'Bituminous Paint') echo 'selected'; ?>>Bituminous Paint</option>
                        <option value="Chlorinated Rubber" <?php if ($jenis_cat === 'Chlorinated Rubber') echo 'selected'; ?>>Chlorinated Rubber</option>
                        <option value="Vynill" <?php if ($jenis_cat === 'Vynill') echo 'selected'; ?>>Vynill</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Warna Cat</td>
                <td>:</td>
                <td>
                    <input type="radio" name="warna" value="Merah" <?php if ($warna === 'Merah') echo 'checked'; ?>>Merah
                    <input type="radio" name="warna" value="Biru" <?php if ($warna === 'Biru') echo 'checked'; ?>>Biru
                    <input type="radio" name="warna" value="Kuning" <?php if ($warna === 'Kuning') echo 'checked'; ?>>Kuning
                </td>
            </tr>
            <tr>
                <td>Jumlah Beli</td>
                <td>:</td>
                <td><input type="text" name="jml_beli" value="<?php echo $jml_beli; ?>"></td>
            </tr>
        </table>
        
        <button type="submit" name="submit">Simpan</button>
        <button type="reset" name="reset">Batal</button>

</body>
</html>
