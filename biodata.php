<?php

$nama = "Hibban Sani Muttaqin";
$tempat = "Tasikmalaya";
$tanggal_lahir = "17 Desember 2003";
$hobi = "Main game";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biodata</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      font-size: 1.2rem;
    }

    h1 {
      text-align: center;
      margin: 1.3rem 0;
    }

    section {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      width: fit-content;
      margin: 0 auto;
      gap: 1.3rem;
    }

    table {
      background-color: #f0dfd6;
      border-radius: 0.4rem;
      box-shadow: 2px 3px 4px rgba(0,0,0, 0.4);
    }

    table, td, tr {
      border: none;
      border-collapse: collapse;
    }

    td, tr {
      padding: 0.5rem 1rem;
    }
  </style>
</head>
<body>
  <h1>Biodata</h1>
  <section> 
    <table>
      <tr>
        <td >Nama</td>
        <td >:</td>
        <td ><?= $nama?></td>
      </tr>
      <tr>
        <td >Tempat Lahir</td>
        <td >:</td>
        <td ><?= $tempat ?></td>
      </tr>
      <tr>
        <td >Tanggal Lahir</td>
        <td >:</td>
        <td ><?= $tanggal_lahir ?></td>
      </tr>
      <tr>
        <td >Hobi</td>
        <td >:</td>
        <td ><?= $hobi ?></td>
      </tr>
    </table>
  </section>
</body>
</html>