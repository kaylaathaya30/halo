<?php 
session_start();
if(isset($_SESSION['status'])){
    header("Location: index.php");
}



?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Register</title>
    <link rel="stylesheet" type="text/css" href="styles/register.css">
</head>
<body>
    <div class="head">
        <header>
            <h1 class="judul"> KATHA TEA </h1>
            <h3 class="deskripsi"> Choose your best tea! </h3>
        </header>
    </div>
    <div class="registrasi">
        <h2>Form Register</h2>
        <form action="aksi.php?action=insert_user" method="post">
            <input type="hidden" name="id_user"/>
            <label for="nama">Nama Lengkap:</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap"><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email"><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"><br>
            <label for="password_repeat">Ulangi Password:</label>
            <input type="password" name="password_repeat" id="password_repeat"><br>
            <input type="hidden" name="role" value="user">
            <input type="submit" value="Register">
        </form>
    </div>
    <div class=konfir>
        <p> <b> Sudah Punya Akun? <a href="form_login.php" target="blank">Login</a> </b> </p>
    </div>
</body>
</html>