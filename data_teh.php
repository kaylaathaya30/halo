<?php
require "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk Teh</title>
</head>
<div class="all">
    <body>
        <center>
            <div class="box">
                <h2>DATA TEH</h2>
                <table border="0" cellspascing="0" cellpadding="4" border="0" width="78%" style="text-align: center; font-size: 15px; margin-bottom: 20px;">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Teh</th>
                        <th>Harga per-pack</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach (getTea() as $row) : ?>
                        <tr>
                            <td class="center-align"><?= $row['id_teh'] ?></td>
                            <td><img src="images/<?= $row['gambar']; ?>" width="100px"></td>
                            <td><?= $row['nama_teh'] ?></td>
                            <td><?= $row['harga_teh'] ?></td>
                            <td>
                                <a href="form_teh.php?id_teh=<?= $row['id_teh'] ?>"> Edit</a> |
                                <a href="aksi.php?id_delete=<?= $row['id_teh'] ?>&action=delete_teh"> Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </table>

                <a href="form_teh.php">Tambah Data Teh</a>
            </div>
        </center>
</div>
</body>
</div>

</html>