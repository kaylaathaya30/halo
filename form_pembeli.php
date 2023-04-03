<?php
require "koneksi.php";

// $id_pembeli = $_GET['id_pembeli'];
$id_pembeli = $_GET['id_pembeli'] ?? 0;
// $id_pembeli = !empty($_GET['id_pembeli']) ? $_GET['id_pembeli'] : 0;

if ($id_pembeli > 0 ) {
    $row = getPembelibyID($id_pembeli);
    $id_pembeli = $row['id_pembeli'];
    $nama_pembeli = $row['nama_pembeli'];
    $alamat = $row['alamat'];
    $email = $row['email'];
    $form_action = "action.php?action=update_pembeli";
    $title = "Edit Data Pelanggan";
} else {
    $id_pembeli = '';
    $nama_pembeli = '';
    $alamat = '';
    $email = '';
    $form_action = "action.php?action=insert_pembeli";
    $title = "Tambah Data Pelanggan";
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
    <h2> Edit Data Pelanggan </h2>
    <form action="<?=$form_action?>" method="post">
        <input type="hidden" name="id_pembeli" value="<?=$id_pembeli?>" required/>
        <label for="nama_pembeli">Nama Pelanggan</label>
        <input type="text" id="nama_pembeli" name="nama_pembeli" value="<?=$nama_pembeli?>" required/><br>
        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="alamat" value="<?=$alamat?>" required/><br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?=$email?>" required/><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html> 