<?php
    
function conn(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "db_toko_teh";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if(!$conn){
        die(" Koneksi Gagal: ".mysqli_connect_error());
    }
    return $conn;
}

function getTea(){
        $conn = conn();
        $sql = "SELECT * FROM tb_teh";
        $result = mysqli_query($conn,$sql);
        $rows = array();
        while ($row = mysqli_fetch_array($result)){
            $rows[] = $row;
        }
        return $rows;
    }

function getPembeli(){
    $conn = conn();
    $sql = "SELECT * FROM tb_pembeli";
    $result = mysqli_query($conn,$sql);
    $rows = array();
    while ($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows;
}

function getTransaksi(){
    $conn = conn();
    $sql = "SELECT tb_transaksi.id_transaksi, tb_pembeli.nama_pembeli, tb_teh.nama_teh, tb_transaksi.harga_sekarang, tb_transaksi.jumlah, tb_transaksi.total_pembayaran FROM tb_teh INNER JOIN tb_transaksi ON tb_teh.id_teh = tb_transaksi.id_teh INNER JOIN tb_pembeli ON tb_pembeli.id_pembeli = tb_transaksi.id_pembeli ORDER by id_transaksi";
    $result = mysqli_query($conn,$sql);
    $rows = array();
    while ($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows;
}

// Register & Login
function insertUser($nama_lengkap, $email, $password){
    $conn = conn();
    $sql = "INSERT INTO tb_user VALUE ('', '$nama_lengkap', '$email', '$password')";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getUserByEmail($email){
    $conn = conn();
    $sql = "SELECT * FROM tb_user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}

function cekLogin($email, $password){
    $conn = conn();
    $sql = "SELECT * FROM tb_user WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// Teh
function insertTeh($gambar, $nama_teh, $harga_teh){
    $conn = conn();
    $sql = "INSERT INTO tb_teh (gambar, nama_teh, harga_teh) VALUES ('$gambar', '$nama_teh', '$harga_teh')";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getTehbyID($id_teh){
    $conn = conn();
    $sql = "SELECT * FROM tb_teh WHERE id_teh = '$id_teh'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}

function updateTeh($id_teh, $gambar, $nama_teh, $harga_teh){
    $conn = conn();
    $sql = "UPDATE tb_teh SET gambar ='$gambar', nama_teh ='$nama_teh', harga_teh ='$harga_teh' WHERE id_teh ='$id_teh'";
    $result = mysqli_query($conn, $sql); 
    return $result;
}

function deleteTeh($id_teh) {
    $conn = conn();
    $sql = "DELETE FROM tb_teh WHERE id_teh = '$id_teh'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// Pembeli
function insertPembeli($nama_pembeli, $alamat, $email){
    $conn = conn();
    $sql = "INSERT INTO tb_pembeli VALUES ('','$nama_pembeli', '$alamat', '$email')";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getPembelibyID($id_pembeli){
    $conn = conn();
    $sql = "SELECT * FROM tb_pembeli WHERE id_pembeli = '$id_pembeli'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function updatePembeli($id_pembeli, $nama_pembeli, $alamat, $email){
    $conn = conn();
    $sql = "UPDATE tb_pembeli SET nama_pembeli ='$nama_pembeli', alamat ='$alamat', email ='$email' WHERE id_pembeli ='$id_pembeli'";
    $result = mysqli_query($conn, $sql); 
    return $result;
}

function deletePembeli($id_pembeli) {
    $conn = conn();
    $sql = "DELETE FROM tb_pembeli WHERE id_pembeli = '$id_pembeli'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// Transaksi
function insertTransaksi($id_transaksi, $id_pembeli, $id_teh, $jumlah, $harga_sekarang, $total_pembayaran){
    $conn = conn();
    $sql = "INSERT INTO tb_transaksi VALUES ('', '$id_pembeli', '$id_teh', '$jumlah', '$harga_sekarang', '$total_pembayaran')";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getTransaksibyID($id_transaksi){
    $conn = conn();
    $sql = "SELECT tb_transaksi.id_transaksi, tb_pembeli.id_pembeli, tb_teh.id_teh, tb_pembeli.nama_pembeli, tb_teh.nama_teh, tb_transaksi.jumlah, tb_transaksi.harga_sekarang, tb_transaksi.total_pembayaran FROM tb_pembeli INNER JOIN tb_transaksi ON tb_pembeli.id_pembeli = tb_transaksi.id_pembeli INNER JOIN tb_teh ON tb_teh.id_teh = tb_transaksi.id_teh WHERE tb_transaksi.id_transaksi = '$id_transaksi'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}

function getHargaTeh($id_teh){
    $conn = conn();
    $sql = "SELECT harga_teh FROM tb_teh WHERE id_teh = '$id_teh'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}

function updateTransaksi($id_transaksi, $id_pembeli, $id_teh, $jumlah, $harga_sekarang, $total_pembayaran){
    $conn = conn();
    $sql = "UPDATE tb_transaksi SET id_pembeli = '$id_pembeli', id_teh = '$id_teh', jumlah = '$jumlah', harga_sekarang = '$harga_sekarang', total_pembayaran = '$total_pembayaran' WHERE id_transaksi = '$id_transaksi'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function deleteTransaksi($id_transaksi) {
    $conn = conn();
    $sql = "DELETE FROM tb_transaksi WHERE id_transaksi = '$id_transaksi'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function fetchTehs(){
    $conn = conn();
    $sql = "SELECT id_teh, nama_teh, harga_teh FROM tb_teh";
    $result = mysqli_query($conn, $sql);
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $options;
}

function fetchpembeli(){
    $conn = conn();
    $sql = "SELECT id_pembeli, nama_pembeli FROM tb_pembeli";
    $result = mysqli_query($conn, $sql);
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $options;
}

?>
