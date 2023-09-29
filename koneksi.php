<?php 
    $conn = mysqli_connect("localhost","root","","toko_cat");
    $result_penjualan = mysqli_query($conn, "SELECT * FROM penjualan");
    $result_total = mysqli_query($conn, "SELECT * FROM total_harga");
    $penjualan = mysqli_fetch_all($result_penjualan, MYSQLI_ASSOC);
    $total = mysqli_fetch_all($result_total, MYSQLI_ASSOC);
?>