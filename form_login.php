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
    <title>Form Login</title>
    <link rel="stylesheet" href="styles/register.css" type="text/css" />
    <link 
    href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto+Condensed&display=swap" 
    rel="stylesheet"
    />
</head>
<body>
    <div class="headd">
        <header>
            <h1 class="judul"> KATHA TEA </h1>
            <h3 class="deskripsi"> Choose your best tea! </h3>
        </header>
    </div>
    <div class="login">
        <h2>Form Login</h2>
        <form action="aksi.php?action=login_user" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email"><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"><br>
            <input type="submit" value="Login">
        </form>
    </div>
    <div class=konfir>
        <p> <b> Belum Punya Akun? <a href="form_register.php" target="blank">Register</a> </b> </p>
    </div>
</body>
</html>