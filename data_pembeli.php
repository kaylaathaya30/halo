<?php
require 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<body>
        <div class="all">
    <center>
        <div class="box">
            <h2>DATA PELANGGAN</h2>
            <table border="0" cellspascing="0" cellpadding="4" border="0" width="78%" style="text-align: center; font-size: 15px; margin-bottom: 20px;">
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>    
            <?php $i = 1; ?>
            <?php foreach (getPembeli() as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row['nama_pembeli']?></td>
                <td><?= $row['alamat']?></td>
                <td><?= $row['email']?></td>
                <td>
                    <a href="form_pembeli.php?id_pembeli=<?= $row['id_pembeli']?>"> Edit</a>
                     |
                    <a href="aksi.php?id_pembeli=<?= $row['id_pembeli']?>&action=delete_pembeli"> Delete</a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
            </table>

            <a href="form_pembeli.php">Tambah Data Pelanggan</a>
        </div>
    </center>
</div>
    </body>
</body>
</html>