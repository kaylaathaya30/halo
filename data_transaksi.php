<?php
    require "koneksi.php";

    $sql = "SELECT tb_transaksi.id_transaksi, tb_pembeli.nama_pembeli, tb_teh.nama_teh, tb_transaksi.harga_sekarang, tb_transaksi.jumlah, tb_transaksi.total_pembayaran FROM tb_teh INNER JOIN tb_transaksi ON tb_teh.id_teh = tb_transaksi.id_teh INNER JOIN tb_pembeli ON tb_pembeli.id_pembeli = tb_transaksi.id_pembeli ORDER by id_transaksi";
    $result = mysqli_query ($conn, $sql);
?>

<!DOCTYPE html>
    <head>
    <div class="all">
    </head>

    <body>
        <center>
        <div class="box">
            <h2>DATA PENJUALAN</h2>
            <table border="0" cellspascing="0" cellpadding="4" border="0" width="78%" style="text-align: center; font-size: 15px; margin-bottom: 20px;">
            <tr>
                <th>Id Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>Nama Teh</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total Harga</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) : 
                $total_pembayaran = $row['jumlah']*$row['harga_sekarang']    
            ?>    
            <tr>
                <td><?= $row['id_transaksi']?></td>
                <td><?= $row['nama_pembeli']?></td>
                <td><?= $row['nama_teh']?></td>
                <td><?= $row['jumlah']?></td>
                <td><?= $row['harga_sekarang']?></td>
                <td><?= $total_pembayaran ?></td>
            </tr>
            <?php endwhile; ?>
            </table>
        </div>
    </center>
    </body>
    </div>
</html>