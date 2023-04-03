<?php
 require "koneksi.php";

 $id_transaksi = $_GET['id_transaksi'] ?? 0 ;

 if($id_transaksi > 0) {
    $row = getTransactionbyID($id_transaksi);
    $id_transaksi = $row['id_transaksi'];
    $id_pembeli = $row['id_pembeli'];
    $id_teh = $row['id_teh'];
    $nama_pembeli = $row['nama_pembeli'];
    $nama_teh = $row['nama_teh'];
    $jumlah = $row['jumlah'];
    $form_action = "action.php?action=update_transaksi";
    $title = "Edit Data Transaksi";
 } else {
    $id_transaksi = '';
    $id_pembeli = '';
    $id_teh = '';
    $nama_pembeli = '';
    $nama_teh = '';
    $jumlah = '';
    $form_action = "action.php?action=insert_transaksi";
    $title = "Tambah Data Transaksi";
 }

?>

<!DOCTYPE html> 
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Penjualan</title>
    <link rel="stylesheet" href="css/bootstrap-grid.css" type="text/css" />
    <link rel="stylesheet" href="css/stylee.css" type="text/css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto+Condensed&display=swap"
      rel="stylesheet"
    />
</head>
<body>
    <div class="container">
    <h2 style="margin-bottom:20px"><?=$title; ?></h2>
    <form action="<?=$form_action?>" method="post">
        <input type="hidden" name="id_transaksi" value="<?=$id_transaksi?>">
        <!-- pilih nama pelanggan -->
        <label for="nama_pembeli">Nama Pelanggan</label>
        <select name="id_pembeli" id="nama_pembeli">
            <option disabled selected>Pilih nama pelanggan...</option>
            <?php foreach (fetchCustomers() as $options) {
                //tanda (?) untuk if, tanda (:) untuk else
                $selected = $options['id_pembeli']==$id_pembeli ? 'selected': '';
            ?>
            <option value = "<?=$options['id_pemmbeli']?>" <?=$selected?>>
                <?=$options['nama_pembeli']?>
            </option>
            <?php } ?>
        </select>
        <!-- pilih nama teh -->
        <label for="nama_teh">Nama Teh</label>
        <select name="id_teh" id="nama_teh">
            <option disabled selected>Pilih nama teh...</option>
            <?php foreach (fetchBooks() as $options) { 
                $selected = $options['id_teh']==$id_teh ? 'selected' : '';
            ?>
            <option value="<?=$options['id_teh']?>" <?=$selected?>>
                <?=$options['nama_teh']?>
            </option>
            <?php } ?>
        </select>
        <!-- input jumlah -->
        <label for="jumlah">jumlah</label>
        <input type="number" id="jumlah" name="jumlah" value="<?=$jumlah?>">
        <input type="submit" value="Simpan">
    </form>
</body>
</html