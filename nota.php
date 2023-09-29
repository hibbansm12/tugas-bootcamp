<?php
require 'koneksi.php';

$id = $_GET['id'];
$result_penjualan = mysqli_query($conn, "SELECT * FROM penjualan WHERE `id` = '$id'");
function hargaCat($jenis){
    switch($jenis){
        case "Bituminous Paint":
          $harga=20000;
          break;
        case "Chlorinated Rubber":
          $harga=30000;
          break;
        case "Vinyl":
          $harga=40000;
          break;
      }
      return $harga;
}
function hitungTotalHarga($jumlah, $harga)
{
  return $jumlah * $harga;
}

function hitungDiskon($jumlah, $total_harga)
{
  if ($jumlah >= 5 && $jumlah < 10) {
    $diskon = (5 / 100) * $total_harga;
  } elseif ($jumlah >= 10) {
    $diskon = (10 / 100) * $total_harga;
  } else {
    $diskon = 0;
  }
  return $diskon;
}

function hitungTotalBayar($total_harga, $diskon)
{
  return $total_harga - $diskon;
}
foreach ($result_penjualan as $p) {
  $harga = hargaCat($p['jenis_cat']);
  $total_harga = hitungTotalHarga($p['jml_beli'], $harga);
  $diskon = hitungDiskon($p['jml_beli'], $total_harga);
  $total_bayar = hitungTotalBayar($total_harga, $diskon);
}

$result_total = mysqli_query($conn, "SELECT * FROM total_harga WHERE `id_penjualan` = '$id'");
if (mysqli_num_rows($result_total) > 0 && mysqli_num_rows($result_total) < 2) {
  $query = "UPDATE total_harga
    SET `id` = NULL,
       `id_penjualan` = '$id',
       `harga` = '$harga',
       `total_harga` = '$total_harga',
       `diskon` = '$diskon',
       `total_bayar` = '$total_bayar'";
} else {
  $query = "INSERT INTO total_harga(`id`, `id_penjualan`, `harga`, `total_harga`, `diskon`, `total_bayar`) VALUES (NULL, '$id', '$harga', '$total_harga', '$diskon', '$total_bayar')";
  echo "
      <script>
        alert('Nota sudah dibuat!!');
      </script>";
}

$result_total_harga = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Terimakasih Sudah Belanja</title>
</head>

<body>
  <h2><a href="penjualan.php">Kembali ke halaman utama</a></h2>
  <fieldset>
    <legend>Struk Pembelian</legend>
    <pre>---------------------------------------</pre>
    <h4>*Toko Cat Guna Bangun Jaya*</h4>
    <pre>---------------------------------------</pre>
    <?php foreach ($result_penjualan as $p) { ?>
    <pre>Nama Customer : <?php echo $p['nama_customer']; ?></pre>
    <pre>No. HP        : <?php echo $p['no_hp']; ?></pre>
    <pre>Alamat        : <?php echo $p['alamat']; ?></pre>
    <pre>Jenis Cat     : <?php echo $p['jenis_cat']; ?></pre>
    <pre>Warna         : <?php echo $p['warna']; ?></pre>
    <pre>Harga         : <?php echo $harga; ?></pre>
    <pre>Jumlah Beli   : <?php echo $p['jml_beli']; ?></pre>
    <pre>---------------------------------------</pre>
    <pre>Total Harga   : <?php echo $total_harga ?></pre>
    <pre>Diskon        : <?php echo $diskon ?></pre>
    <pre>---------------------------------------</pre>
    <pre>Total Bayar   : <?php echo $total_bayar ?></pre>
    <pre>---------------------------------------</pre>
    <?php } ?>
  </fieldset>

</body>

</html>