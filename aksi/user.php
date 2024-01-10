<?php
session_start();
include "../koneksi.php";
include "../function.php";

if ($_POST) {
    if ($_POST['aksi'] == 'tambah') {
        $nama = $_POST['nama'];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $akses = $_POST["hak_akses"];

        $sql = "INSERT INTO user (id_user,nama,username,password,hak_akses) VALUES (DEFAULT,'$nama','$username','$password','$hak_akses')";
        // ECHO $sql; // cek perintah
        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);
        header('location:../index.php?p=user');
    } else if ($_POST['aksi'] == 'ubah') {
        $id_user = $_POST['id_user'];
        $nama = $_POST['nama'];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $akses = $_POST["hak_akses"];

        $sql = "UPDATE user SET nama='$nama',
            username='$username', password='$password', hak_akses='$akses'
            WHERE id_user=$id_user";
        // ECHO $sql; // cek perintah
        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);
        header('location:../index.php?p=user');
    }
    else if($_POST['aksi']=='login'){
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql="SELECT * FROM user WHERE username='$username' AND password='$password'";
        $query=mysqli_query($koneksi,$sql);
        $ketemu=mysqli_num_rows($query);
        if($ketemu>=1){
            $user=mysqli_fetch_array($query);
            $_SESSION['user']=$user['username'];
            $_SESSION['nama']=$user['nama'];
            $_SESSION['id']=$user['id'];
            $_SESSION['akses']=$user['hak_akses'];
            $_SESSION['menu']=$user='MANAJEMEN';
            $_SESSION['status_proses']='';

            header('location:../index.php');
        }  else {
            header('location:../login.php?msg=err');
        }
    }
}

if ($_GET) {
    if ($_GET['aksi'] == 'hapus') {
        $id_user = $_GET['id_user'];
        $sql = "DELETE FROM user WHERE id_user=$id_user"; // Hard Delete
        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);
        header('location:../index.php?p=user');
    } 
}
