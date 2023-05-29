<?php
    require "koneksi.php";

    if(isset($_GET["id_teh"])){
        $id_teh = $_GET["id_teh"];
    } else {
        $id_teh = false;
    }

    if ($id_teh > 0) {
        $row = getTehbyID($id_teh);
        $id_teh = $row['id_teh'];
        $nama_teh = $row['nama_teh'];
        $harga_teh = $row['harga_teh']; 
        $gambar = $row['gambar'];
        $form_action = "aksi.php?action=update_teh";
        $title = "Edit Data Teh";
    }
    else {
        $id_teh = '';
        $nama_teh = '';
        $harga_teh = '';
        $gambar = '';
        $form_action = "aksi.php?action=insert_teh";
        $title = "Tambah Data Teh";
    }
    
?>

<!DOCTYPE html> 
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Teh</title>
    <link rel="stylesheet" href="css/stylee.css" type="text/css" />
</head>

<body>
    <h2 style="margin-bottom:20px">Tambah Data Teh</h2>
    <form action= "<?=$form_action?>" method="post">
        <input type="hidden" name="id_teh" id="id_teh" value="<?=$id_teh?>" />
        <label for="nama_teh">Nama Teh :</label>
        <input type="text" name="nama_teh" id="nama_teh" value="<?=$nama_teh?>"/><br>
        <label for="harga_teh">Harga Teh :</label>
        <input type="number" name="harga_teh" id="harga_teh" value="<?=$harga_teh?>"/><br>
        <label for="gambar">Gambar Teh :</label>
        <input type="file" name="gambar" id="gambar" value="<?=$gambar?>"/><br>
        <input type="submit" value="Simpan"/>
    </form>
</body>
</html>
