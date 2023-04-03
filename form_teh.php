<?php 
require "koneksi.php";

$id_teh = $_GET["id_teh"] ?? 0 ; 

if ($id_teh > 0) {
    $row = getTehbyID($id_teh);
    $id_teh = $row['id_teh'];
    $nama_teh = $row['nama_teh'];
    $harga_teh = $row['harga_teh'];

    $form_action = "action.php?action=update_teh";
    $title = "Edit Data Teh";
}
else {
    $id_teh = '';
    $nama_teh = '';
    $harga_teh = '';    
    $form_action = 'action.php?action=insert_teh';
    $title = "Tambah Data Teh";    
}
?>

<!DOCTYPE html> 
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Penjualan</title>
    <link rel="stylesheet" href="css/stylee.css" type="text/css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto+Condensed&display=swap"
      rel="stylesheet"
    />
</head>

<body>
    <h2 style="margin-bottom:20px"><?=$title; ?></h2>
    <form action="<?=$form_action?>" method="post">
        <input type="hidden" name="id_teh" value="<?=$id_teh?>" />
        <label for="nama_teh">Nama Teh</label>
        <input type="text" name="nama_teh" value="<?=$nama_teh?>"/><br>
        <label for="harga_teh">Harga Teh</label>
        <input type="number" name="harga_teh" value="<?=$harga_teh?>"/><br>
        <input type="submit" value="Simpan"/>
    </form>
</body>
</html>
