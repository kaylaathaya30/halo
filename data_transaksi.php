<?php
    require "koneksi.php";

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
                <th>Aksi</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach (getTransaksi() as $row) : 
                $total_pembayaran = $row['jumlah']*$row['harga_sekarang']   
            ?>    
            <tr>
                <td><?= $row['id_transaksi']?></td>
                <td><?= $row['nama_pembeli']?></td>
                <td><?= $row['nama_teh']?></td>
                <td><?= $row['jumlah']?></td>
                <td><?= $row['harga_sekarang']?></td>
                <td><?= $total_pembayaran ?></td>
                <td>
                    <a href="form_transaksi.php?id_transaksi=<?= $row['id_transaksi']?>"> Edit</a> |
                    <a href="form_transaksi.php?id_transaksi=<?= $row['id_transaksi']?>&action=delete_transaksi"> Delete</a>
                </td>
            </tr>
            <?php $no++?>
            <?php endforeach; ?>
            </table>

            <a href="form_transaksi.php">Tambah Data Transaksi</a>
        </div>
    </center>
    </body>
    </div>
</html>