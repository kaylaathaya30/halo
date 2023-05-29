<?php
require "koneksi.php";

// $id_pembeli = $_GET['id_pembeli'] ?? 0 ;
// $id_pembeli = $_GET['id_pembeli'];
// $id_pembeli = !empty($_GET['id_pembeli']) ? $_GET['id_pembeli'] : 0;

// if(isset($_GET["id_pembeli"])){
//     $id_pembeli = $_GET["id_pembeli"];
// } else {
//     $id_pembeli = false;
// }



if (isset($_GET['id_pembeli']) && $_GET["id_pembeli"] > 0) {
    $id_pembeli = $_GET["id_pembeli"];
    $row = getPembelibyID($id_pembeli);

    $id_pembeli = $row['id_pembeli'];
    $nama_pembeli = $row['nama_pembeli'];
    $alamat = $row['alamat']; 
    $email = $row['email'];

    $form_action = "aksi.php?action=update_pembeli";
    $title = "Edit Data Pelanggan";
    $h2 = 'Edit Data Pembeli';
}
else{
    $id_pembeli = '';
    $nama_pembeli = '';
    $alamat = '';
    $email = '';
    $form_action = "aksi.php?action=insert_pembeli";
    $title = "Tambah Data Pembeli";
    $h2 = 'Tambah Data Pembeli';
}
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pembeli</title>
    <link rel="stylesheet" href="form.css" type="text/css" />
</head>

<body>
    <div class="head">
        <header>
            <h1 class="judul"> KATHA TEA </h1>
            <h3 class="deskripsi"> Choose your best tea! </h3>
        </header>
    </div>
    <div class="pembeli">
    <h2><?= $h2 ?></h2>
    <form action="<?= $form_action ?>" method="post">
        <input type="hidden" name="id_pembeli">
        <label for="nama_pembeli">Nama Pelanggan</label>
        <input type="text" id="nama_pembeli" name="nama_pembeli" value="<?=$nama_pembeli?>"><br>
        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="alamat" value="<?=$alamat?>"><br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?=$email?>"><br>
        <input type="submit" value="Simpan">
    </form>
    <div>
</body>
</html> 