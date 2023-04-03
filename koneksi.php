<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "db_toko_teh";
    $conn = mysqli_connect ($servername, $username, $password, $database);

    if(!$conn){
        die(" Koneksi Gagal: ".mysqli_connect_error());
    }
?>