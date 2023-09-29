<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input</title>
    <style>
        form{display: table;}
        p{display: table-row;}
        label, input{display: table-cell; margin-bottom: 10px;}
        button{margin-right: 10px;}
    </style>
</head>
<body>
    <h2>Toko Cat Guna Bangun Jaya</h2>
    <form action="nota.php" method="post">
        <p>
        <label for="Nama Customer">Nama Customer</label>
        <input type="text" name="nama">
        </p>
        <p>
        <label for="Alamat">Alamat</label>
        <input type="text" name="alamat">
        </p>
        <p>
        <label for="Jenis Cat">Jenis Cat</label>
        <select name="jenis">
            <option value="Bituminous Paint">Bituminous Paint</option>
            <option value="Chlorinated Rubber">Chlorinated Rubber</option>
            <option value="Vinyl">Vinyl</option>
        </select>
        </p>
        <p>
        <label for="warna_cat">Warna Cat</label>
        <input type="radio" name="warna" value="Biru">Biru      
        <input type="radio" name="warna" value="Merah">Merah
        <input type="radio" name="warna" value="Kuning">Kuning
        </p>
        <p>
        <label for="Jumlah Beli">Jumlah Beli</label>
        <input type="number" name="jumlah">
        </p>
        <p>
            <button type="submit">Hitung</button>
            <button type="reset">Batal</button>
        </p>
    </form>
</body>
</html>