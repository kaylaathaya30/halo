<?php
    require "koneksi.php";

    $sql = "SELECT * FROM tb_teh";
    $result = mysqli_query ($conn, $sql);

?>

<!DOCTYPE html>
    <head>
    <div class="all">
    </head>

    <body>
        <center>
        <div class="box">
            <h2>DATA TEH</h2>
            <table border="0" cellspascing="0" cellpadding="4" border="0" width="78%" style="text-align: center; font-size: 15px; margin-bottom: 20px;">
            <tr>
                <th>ID Teh</th>
                <th>Gambar</th>
                <th>Nama Teh</th>
                <th>Harga per-pack</th>
            </tr>    
            <tr>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <td class="center-align"><?= $row['id_teh']?></td>
                <td><img src="teh/<?= $row['gambar']; ?>" width="150px"></td>
                <td><?= $row['nama_teh']?></td>
                <td><?= $row['harga_teh']?></td>
            </tr>
            <?php endwhile; ?>
            </table>
        </div>
        </center>
    </div>
    </body>
    </div>
</html>