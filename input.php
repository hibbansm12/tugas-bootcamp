<?php
     require 'koneksi.php';
     if(isset($_POST['submit'])){
        $nama = $_POST['nama_customer'];
        $hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
        $tgl = $_POST['tgl_penjualan'];
        $jenis = $_POST['jenis_cat'];
        $warna = $_POST['warna'];
        $jumlah =$_POST['jml_beli'];
        
        $query = "INSERT INTO `penjualan` (`id`, `nama_customer`, `no_hp`, `alamat`, `tgl_penjualan`, `jenis_cat`, `warna`, `jml_beli`) VALUES (NULL, '$nama', '$hp', '$alamat', '$tgl', '$jenis', '$warna', '$jumlah')";

        $result = mysqli_query($conn, $query);

        echo "
        <script>
            alert('Data penjualan telah masuk');
            document.location.href = 'penjualan.php';
        </script>
        ";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Tambah Data</title>
</head>
<body>
<form action="" method="POST">
        <table style="border: 2px solid black; border-collapse: collapse; margin: auto;">
            <tbody><th colspan="3" style="text-align: center; padding: 20px; font-size:larger">Form Tambah Data</th>

                <tr>
                    <td style="border-top: 2px solid black;">Nama Customer</td>
                    <td style="border-top: 2px solid black;">:</td>
                    <td style="border-top: 2px solid black;"><input type="text" name="nama_customer"></td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td>:</td>
                    <td><input type="text" name="no_hp"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><textarea name="alamat"></textarea></td>
                </tr>
                <tr>
                    <td>Tanggal Penjualan</td>
                    <td>:</td>
                    <td><input type="date" name="tgl_penjualan"></td>
                </tr>
                <tr>
                    <td>Jenis Cat</td>
                    <td>:</td>
                    <td><select name="jenis_cat">
                        <option value="Bituminous">Bituminous Paint</option>
                        <option value="Chlorinated">Chlorinated Rubber</option>
                        <option value="Vinyl">Vinyl</option>
                    </select></td>
                </tr>
                <tr>
                    <td>Warna Cat</td>
                    <td>:</td>
                    <td>
                        <input type="radio" name="warna" value="Merah">Merah</input>
                        <input type="radio" name="warna" value="Biru">Biru</input>
                        <input type="radio" name="warna" value="Kuning">Kuning</input>
                    </td>
                </tr>
                <tr>
                    <td>Jumlah Beli</td>
                    <td>:</td>
                    <td><input type="number" name="jml_beli"></td>
                </tr>
                <tr>
                    <td style="padding-top: 20px;">
                    <button type="submit" name="submit"><a href="penjualan.php"></a>Simpan</button>   
                    <button type="reset" name="reset">Batal</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>