<?php
require "koneksi.php";
$aksi = $_GET['action'];

switch ($aksi) {
    // aksi untuk insert ke data teh
    case 'insert_teh':
        //insertTeh($nama_teh,$harga_teh)
        $nama_teh = $_POST['nama_teh'];
        $harga_teh = $_POST['harga_teh'];
        $gambar = $_POST['gambar'];
        $result = insertTeh($gambar, $nama_teh, $harga_teh);
        if ($result) {
            $msg = "Tambah Teh Berhasil";
            $loc = "index.php?page=data_teh";
        } else {
            $msg = "Tambah Teh Gagal";
            $loc = "index.php?page=data_teh";
        }
        break;

    // aksi untuk edit data teh
    case 'update_teh':
        // $id_teh = $_POST['id_teh'];
        // $nama_teh = $_POST['nama_teh'];
        // $harga_teh = $_POST['harga_teh'];
        // $result = updateTeh($id_teh, $nama_teh, $harga_teh);
        $result = updateTeh($_POST['id_teh'], $_POST['nama_teh'], $_POST['harga_teh'], $_POST['gambar']);
        if ($result) {
            $msg = "Edit Teh Berhasil";
            $loc = "index.php?page=data_teh";
        } else {
            $msg = "Edit Teh Gagal";
            $loc = "index.php?page=data_teh";
        }
        break;
    //aksi untuk delete data teh
    case 'delete_teh':
        $result = deleteTeh($_GET['id_teh']);
        if ($result) {
            $msg = "Hapus Teh Berhasil";
            $loc = "index.php?page=data_teh";
        } else {
            $msg = "Hapus Teh Gagal";
            $loc = "index.php?page=data_teh";
        }
        break;
    //aksi untuk insert data pelanggan
    case 'insert_pembeli':
        $result = insertPembeli($_POST['nama_pembeli'], $_POST['alamat'], $_POST['email']);
        if ($result) {
            $msg = "Tambah Pelanggan Berhasil";
            $loc = "index.php?page=data_pembeli";
        } else {
            $msg = "Tambah Pelanggan Gagal";
            $loc = "index.php?page=data_pembeli";
        }
        break;
    //aksi untuk edit data pelanggan
    case 'update_pembeli':
        $result = updatePembeli($_POST['id_pembeli'], $_POST['nama_pembeli'], $_POST['alamat'], $_POST['email']);
        if ($result) {
            $msg = "Edit Pelanggan Berhasil";
            $loc = "index.php?page=data_pembeli";
        } else {
            $msg = "Edit Pelanggan Gagal";
            $loc = "index.php?page=data_pembeli";
        }
        break;
    //aksi untuk delete data pelanggan
    case 'delete_pembeli':
        $result = deletePembeli($_GET['id_pembeli']);
        if ($result) {
            $msg = "Hapus Pelanggan Berhasil";
            $loc = "index.php?page=data_pembeli";
        } else {
            $msg = "Hapus Pelanggan Gagal";
            $loc = "index.php?page=data_pembeli";
        }
        break;
    //aksi untuk insert data transaksi
    case 'insert_transaksi':
        $id_teh = $_POST['id_teh'];
        $row = getHargaTeh($id_teh);
        $harga_teh = $row['harga_teh'];
        $total_pembayaran = $harga_teh * $_POST['jumlah'];
        $result = insertTransaksi($_POST['id_pembeli'], $_POST['id_teh'], $_POST['jumlah'], $harga_teh, $total_pembayaran);
        if ($result) {
            $msg = "Tambah Transaksi Berhasil";
            $loc = "index.php?page=data_transaksi";
        } else {
            $msg = "Tambah Transaksi Gagal";
            $loc = "index.php?page=data_transaksi";
        }
        break;
    //aksi untuk edit data transaksi
    case 'update_transaksi':
        $id_teh = $_POST['id_teh'];
        $row = getHargaTeh($id_teh);
        $harga_teh = $row['harga_teh'];
        $total_pembayaran = $harga_teh * $_POST['jumlah'];
        $result = updateTransaksi($_POST['id_transaksi'], $_POST['id_pembeli'], $_POST['id_teh'], $_POST['jumlah'], $harga_teh, $total_pembayaran);
        if ($result) {
            $msg = "Edit Transaksi Berhasil";
            $loc = "index.php?page=data_transaksi";
        } else {
            $msg = "Edit Transaksi Gagal";
            $loc = "index.php?page=data_transaksi";
        }
        break;       
    //aksi untuk delete data transaksi
    case 'delete_transaksi':
        $result = deleteTransaksi($_GET['id_transaksi']);
        if ($result) {
            $msg = "Hapus Transaksi Berhasil";
            $loc = "index.php?page=data_transaksi";
        } else {
            $msg = "Hapus Transaksi Gagal";
            $loc = "index.php?page=data_transaksi";
        }
        break; 
    //aksi untuk insert data user
    case 'insert_user':
        $nama_lengkap = $_POST['nama_lengkap'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_repeat = $_POST['password_repeat'];
        $user = getUserByEmail($email);
        if ($user) { 
            $msg = "Email sudah terdaftar"; 
            $loc = "form_register.php";
        } else if ($password != $password_repeat) {
            $msg = "Password Tidak Sama";
            $loc = "form_register.php";
        } else {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $result = insertUser($nama_lengkap, $email, $password);
            if ($result) {
                $msg = "Tambah User Berhasil";
                $loc = "form_login.php";
            } else {
                $msg = "Tambah User Gagal";
                $loc = "form_register.php";
            }
        }
        break; 
    //aksi untuk login
    case 'login_user':
        $email = $_POST['email'];    
        $password = md5($_POST['password']);
        $user = getUserByEmail($email);
        $userpass = $user ['password'];
        if (password_verify($pasword, $userpass)) {
            $_SESSION['email'] = $user['email'];
            $msg = "Login Berhasil";
            $loc = "index.php";
        } else {
            $msg = "Login Gagal";
            $loc = "form_login.php";
        }
 }

if (!empty($msg)){
    echo "<script>
        alert('$msg');
        location.href = '$loc';
    </script>";
}

?>