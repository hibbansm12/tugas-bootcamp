<?php
    require 'koneksi.php';
    $id = $_GET['id'];
    $result_penjualan = mysqli_query($conn, "DELETE FROM penjualan WHERE `id` = $id");
    echo "Data telah dihapus";
?>
