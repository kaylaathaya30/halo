<?php
session_start();
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
        $result = updateTeh($_POST['id_teh'], $_POST['gambar'], $_POST['nama_teh'], $_POST['harga_teh']);
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
        $result = deleteTeh($_GET['id_delete']);
        if ($result) {
            $msg = "Hapus Teh Berhasil";
            header("location: data_teh.php?message=" . $msg);
        } else {
            $msg = "Hapus Teh Gagal";
            header("location: data_teh.php?message=" . $msg);
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
            header("location: data_pembeli.php?message=" . $msg);
        } else {
            $msg = "Edit Pelanggan Gagal";
            header("location: data_pembeli.php?message=" . $msg);
        }
        break;
    //aksi untuk delete data pelanggan
    case 'delete_pembeli':
        $result = deletePembeli($_GET['id_delete']);
        if ($result) {
            $msg = "Hapus Pelanggan Berhasil";
            header("location: data_pembeli.php?message=" . $msg);
        } else {
            $msg = "Hapus Pelanggan Gagal";
            header("location: data_pembeli.php?message=" . $msg);
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
            header("location: data_transaksi.php?message=" . $msg);
        } else {
            $msg = "Edit Transaksi Gagal";
            header("location: data_transaksi.php?message=" . $msg);
        }
        break;       
    //aksi untuk delete data transaksi
    case 'delete_transaksi':
        $result = deleteTransaksi($_GET['id_delete']);
        if ($result) {
            $msg = "Hapus Transaksi Berhasil";
            header("location: data_transaksi.php?message=" . $msg);
        } else {
            $msg = "Hapus Transaksi Gagal";
            header("location: data_transaksi.php?message=" . $msg);
        }
        break; 
    //aksi untuk insert data user
    case 'insert_user':
        $nama_lengkap = htmlspecialchars(ucwords($_POST['nama_lengkap']));
        $email = htmlspecialchars(strtolower($_POST['email']));
        $password = htmlspecialchars($_POST['password']);
        $password_repeat = htmlspecialchars($_POST['password_repeat']);
        $role = $_POST['role'];
        
        $user = getUserByEmail($email);
        if ($user) { 
            $msg = "Email sudah terdaftar"; 
            $loc = "form_register.php";
        } else if ($password != $password_repeat) {
            $msg = "Password Tidak Sama";
            $loc = "form_register.php";
        } else {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $result = insertUser($nama_lengkap, $email, $password, $role);
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
        $email = strtolower($_POST['email']);    
        $password = $_POST['password'];

        $user = getUserByEmail($email);
        $userpass = $user['password'];
        if (password_verify($password, $userpass)) {

            $_SESSION['status'] = true;
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
            
            $msg = "Login Berhasil";
            header("location: index.php?message=" . $msg);
        } else {
            $msg = "Login Gagal";
            header("location: form_login.php?message=" . $msg);
        }
 }

if (!empty($msg)){
    echo "<script>
        alert('$msg');
        location.href = '$loc';
    </script>";
}

?>