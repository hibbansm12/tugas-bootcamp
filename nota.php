<?php
class Transaksi
{
  protected $jenis,
  $harga,
  $jumlah,
  $diskon;

  function __construct($jenis, $jumlah)
  {
    $this->jenis = $jenis;
    $this->jumlah = $jumlah;
    switch($this->jenis){
      case "Bituminous Paint":
        $this->harga=20000;
        break;
      case "Chlorinated Rubber":
        $this->harga=30000;
        break;
      case "Vinyl":
        $this->harga=40000;
        break;
    }
  }

  public function getJenis()
  {
    return $this->jenis;
  }

  public function getHarga()
  {
    return $this->harga;
  }

  public function getJumlah()
  {
    return $this->jumlah;
  }

  public function totalHarga()
  {
    return $this->jumlah*$this->harga;
  }

  public function isDiskon()
  {
    if ($this->jumlah >= 5 && $this->jumlah < 10) {
      $this->diskon = (5 / 100) * $this->totalHarga();
    } elseif ($this->jumlah >= 10) {
      $this->diskon = (10 / 100) * $this->totalHarga();
    } else {
      $this->diskon = 0;
    }
    return $this->diskon;
  }

  public function totalBayar()
  {
    return $this->totalHarga() - $this->isDiskon();
  }
}

class Customer extends Transaksi
{
  private $nama,
  $alamat;

  function __construct($jenis, $jumlah, $nama, $alamat)
  {
    parent::__construct($jenis, $jumlah);
    $this->nama = $nama;
    $this->alamat = $alamat;
  }

  function getNama()
  {
    return $this->nama;
  }

  function getAlamat()
  {
    return $this->alamat;
  }
}

$customer = new Customer($_POST['jenis'], $_POST['jumlah'], $_POST['nama'], $_POST['alamat']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota</title>
    <style>
        hr{
            height:2px;border-width:0;color:gray;background-color:gray;
        }
        h2, p{text-align: center;}
        table{
          margin-left: auto;
          margin-right: auto;
        }
    </style>
</head>
<body>
    <hr>
    <h2>Toko Cat Guna Bangun Jaya</h2>
    <hr>
    <table>
      <tr>
        <td>Nama Customer</td>
        <td>: <?php echo $customer->getNama() ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>: <?php echo $customer->getAlamat() ?></td>
      </tr>
      <tr>
        <td>Jenis Cat</td>
        <td>: <?php echo $customer->getJenis() ?></td>
      </tr>
      <tr>
        <td>Warna</td>
        <td>: <?php echo $_POST['warna'] ?></td>
      </tr>
      <tr>
        <td>Harga</td>
        <td>: <?php echo $customer->getHarga() ?></td>
      </tr>
      <tr>
        <td>Jumlah Beli</td>
        <td>: <?php echo $customer->getJumlah() ?></td>
      </tr>
    </table>
    <p>------------------------------------------------(*)</p>
    <table>
      <tr>
        <td>Total Harga</td>
        <td>: Rp. <?php echo $customer->totalHarga() ?></td>
      </tr>
      <tr>
        <td>Diskon</td>
        <td>: Rp. <?php echo $customer->isDiskon() ?></td>
      </tr>
    </table>
    <p>------------------------------------------------(-)</p>
    <table>
      <tr>
        <td>Total Bayar</td>
        <td>: Rp. <?php echo $customer->totalBayar() ?></td>
      </tr>
    </table>
</body>
</html>