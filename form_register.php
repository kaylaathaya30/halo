<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link rel="stylesheet" href="css/stylee.css" type="text/css" />
    <link 
    href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto+Condensed&display=swap" 
    rel="stylesheet"
    />
</head>
<body>
    <div class="container-login">
        <h2 style="margin-top: 100px">Form Register</h2>
        <form action="" method="post">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" name="nama" id="nama">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <label for="repeat_password">Ulangi Password:</label>
            <input type="password" name="repeat_password" id="repeat_password">
            <input type="submit" name="Register">
        </form>
        <p> Sudah Punya akun? <a href="form_login.php" target="blank">Login</a></p>
    </div>
</body>
</html>