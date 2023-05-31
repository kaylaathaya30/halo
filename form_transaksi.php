<?php
    require "koneksi.php";

    if(isset($_GET["id_transaksi"])){
        $id_transaksi = $_GET["id_transaksi"];
    } else {
        $id_transaksi = false;
    }

    if ($id_transaksi > 0) {
        $row = getTransaksibyID($id_transaksi);
        $id_transaksi = $row['id_transaksi'];
        $id_pembeli = $row['id_pembeli'];
        $id_teh = $row['id_teh']; 
        $nama_pembeli = $row['nama_pembeli'];
        $nama_teh = $row['nama_teh'];
        $jumlah = $row['jumlah'];

        $form_action = "aksi.php?action=update_transaksi";
        $title = "Edit Data Transaksi";
        $h2 = "Edit Form Data Transaksi";
    }
    else {
        $id_transaksi = '';
        $id_pembeli = '';
        $id_teh = '';
        $nama_pembeli = '';
        $nama_teh = '';
        $jumlah = '';

        $form_action = "aksi.php?action=insert_transaksi";
        $title = "Tambah Data Teh";
        $h2 = "Tambah Form Data Transaksi";
    }
    
?>

<!DOCTYPE html> 
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Penjualan</title>
    <link rel="stylesheet" href="styles/form.css" type="text/css" />
</head>
<body>
    <div class="head">
        <header>
            <h1 class="judul"> KATHA TEA </h1>
            <h3 class="deskripsi"> Choose your best tea! </h3>
        </header>
    </div>
    <div class="transaksi">
    <h2 style="margin-bottom:20px"><?php $h2 ?></h2>
    <form action= "<?=$form_action?>" method="post">
        <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?= $id_transaksi ?>">
        <!-- pilih nama pelanggan -->
        <label for="nama_pembeli">Nama Pelanggan</label>
        <select name="id_pembeli" id="nama_pembeli">
            <option disabled selected>Pilih nama pelanggan...</option>
            <?php foreach (fetchpembeli() as $options) {
                //tanda (?) untuk if, tanda (:) untuk else
                $selected = $options['id_pembeli']==$id_pembeli ? 'selected': '';
            ?>
            <option value = "<?=$options['id_pembeli']?>" <?=$selected?>>
                <?=$options['nama_pembeli']?>
            </option>
            <?php } ?>
        </select>

        <!-- pilih nama teh -->
        <br>
        <label for="nama_teh">Nama Teh</label>
        <select name="id_teh" id="nama_teh">
            <option disabled selected>Pilih nama teh...</option>
            <?php foreach (fetchTehs() as $options) { 
                $selected = $options['id_teh']==$id_teh ? 'selected' : '';
            ?>
            <option value="<?=$options['id_teh']?>" <?=$selected?>>
                <?=$options['nama_teh']?>
            </option>
            <?php } ?>
        </select>

        <!-- input jumlah -->
        <br>
        <label for="jumlah">Jumlah</label>
        <input type="number" id="jumlah" name="jumlah" value="<?=$jumlah?>"> <br>
        <input type="submit" value="Simpan">
    </form>
    </div>
</body>
</html>