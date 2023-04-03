<?php
    require "koneksi.php";

    $sql = "SELECT * FROM tb_pembeli";
    $result = mysqli_query ($conn, $sql);

?>

<!DOCTYPE html>
    <head>
    <div class="all">
    </head>

    <body>
    <center>
        <div class="box">
            <h2>DATA PELANGGAN</h2>
            <table border="0" cellspascing="0" cellpadding="4" border="0" width="78%" style="text-align: center; font-size: 15px; margin-bottom: 20px;">
            <tr>
                <th>ID Pelanggan</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>Email</th>
            </tr>    
            <tr>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <td class="center-align"><?= $row['id_pembeli']?></td>
                <td><?= $row['nama_pembeli']?></td>
                <td><?= $row['alamat']?></td>
                <td><?= $row['email']?></td>
            </tr>
            <?php endwhile; ?>
            </table>
        </div>
    </center>
    </body>
    </div>
</html>