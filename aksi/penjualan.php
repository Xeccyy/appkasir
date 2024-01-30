<?php
session_start();
include "../koneksi.php";
include "../function.php";
if ($_POST) {
    if ($_POST['aksi'] == 'tambah-keranjang-bybarcode') {
        $id_user = $_SESSION['id'];
        $Barcode = $_POST['Barcode'];
        $Jumlah = $_POST['Jumlah'];

        //Temukan Produk berdasarkan Barcode
        $sql1 = "SELECT * FROM produk WHERE Barcode='$Barcode'";
        $query1 = mysqli_query($koneksi, $sql1);
        $Produk = mysqli_fetch_array($query1);

        if (mysqli_num_rows($query1) >= 1) {
            // echo "Produk Ditemukan Di Database";
            $ProdukID = $Produk['ProdukID'];
            // Cek Keranjang Bila Produk Sudah Ada Hanya Mengupdate jumlah, Bila belum ada akan insert data
            $sql3 = "SELECT * FROM keranjang WHERE ProdukID=$ProdukID AND id_user=$id_user";
            $query3 = mysqli_query($koneksi, $sql3);
            $duplikat = mysqli_num_rows($query3);
            if ($duplikat == 0) {
                $sql2 = "INSERT INTO keranjang(KeranjangID,ProdukID,Jumlah,id_user) VALUES(DEFAULT,$ProdukID,$Jumlah,$id_user)";
            } else {
                $sql2 = "UPDATE keranjang SET Jumlah=Jumlah+$Jumlah WHERE ProdukID=$ProdukID AND id_user=$id_user";
            }
            // echo $sql2;
            mysqli_query($koneksi, $sql2);
            header('location:../index.php?p=tambah');
        } else {
            // echo "Produk Tidak Di Temukan Di Database";
            header('location:../index.php?p=tambah&err=produk_tidak_ditemukan');
        }
    }
     else if ($_POST['aksi']=='tambah-keranjang-bynama'){
        $ProdukID=$_POST['ProdukID'];
        $Jumlah=$_POST['Jumlah'];
        $id_user=$_SESSION['id'];
        $sql3 = "SELECT * FROM keranjang WHERE ProdukID=$ProdukID AND id_user=$id_user";
            $query3 = mysqli_query($koneksi, $sql3);
            $duplikat = mysqli_num_rows($query3);
            if ($duplikat == 0) {
                $sql2 = "INSERT INTO keranjang(KeranjangID,ProdukID,Jumlah,id_user) VALUES(DEFAULT,$ProdukID,$Jumlah,$id_user)";
            } else {
                $sql2 = "UPDATE keranjang SET Jumlah=Jumlah+$Jumlah WHERE ProdukID=$ProdukID AND id_user=$id_user";
            }
            // echo $sql2;
            mysqli_query($koneksi, $sql2);
            header('location:../index.php?p=tambah');
     }
        else if($_POST['aksi']=='simpan-penjualan'){
            $id_user=$_SESSION['id'];
            $PelangganID=$_POST['PelangganID'];
            $TanggalPenjualan=$_POST['TanggalPenjualan'];
            $TotalHarga=$_POST['TotalHarga'];

            $sql1="INSERT INTO penjualan(PenjualanID,TanggalPenjualan,TotalHarga,PelangganID) VALUES(DEFAULT,'$TanggalPenjualan',$TotalHarga,$PelangganID)";
            // echo $sql1;
            if(mysqli_query($koneksi,$sql1)){
                // echo "Simpan Penjualan Sukess";
                // Meengambil  PenjualanID dari tabel penjualan 
                $sql2="SELECT MAX(PenjualanID) AS LastID FROM penjualan";
                $query2=mysqli_query($koneksi,$sql2);
                $data=mysqli_fetch_array($query2);
                $PenjualanID=$data['LastID'];
                // echo $PenjualanID;
                 
                // Menyimpan Data Produk Yang Di Beli Ke Tabel Detailpenjualan yang Diambil dari tabel keranjang 
                $sql3="SELECT keranjang.*,produk.Harga FROM keranjang,produk WHERE keranjang.ProdukID=produk.ProdukID AND id_user=$id_user";
                // echo $sql3;

                $query3=mysqli_query($koneksi,$sql3);
                while($keranjang=mysqli_fetch_array($query3)){
                    $ProdukID=$keranjang['ProdukID'];
                    $Jumlah=$keranjang['Jumlah'];
                    $Harga=$keranjang['Harga'];

                    $sql4="INSERT INTO detailpenjualan(DetailID,PenjualanID,ProdukID,JumlahProduk,Harga) VALUES(DEFAULT,$PenjualanID,$ProdukID,$Jumlah,$Harga)";
                    echo $sql4."<br>";
                    mysqli_query($koneksi,$sql4);
                    
                    // Mengurangi Nilai Stok
                    $sql5="UPDATE produk SET Stok=Stok-$Jumlah WHERE ProdukID=$ProdukID";
                    mysqli_query($koneksi,$sql5);


                }
                // Perintah mengosongkan keranjang  
                mysqli_query($koneksi,"DELETE FROM keranjang WHERE id_user=$id_user");
                notifikasi($koneksi);
                header('location:../index.php?p=tambah');
                // echo $sql4;
            }
        }
     }

if ($_GET) {
    if ($_GET['aksi'] == 'hapus-keranjang') {
        $ProdukID = $_GET['ProdukID'];
        $id_user = $_SESSION['id'];
        $sql = "DELETE FROM keranjang WHERE ProdukID=$ProdukID AND id_user=$id_user";
        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);
        header('location:../index.php?p=tambah');
    }
    else if ($_GET['aksi'] == 'hapus') {
        $PenjualanID = $_GET['PenjualanID'];
        $sql1= "DELETE FROM penjualan WHERE PenjualanID=$PenjualanID";
        mysqli_query($koneksi, $sql1);
        $sql2= "DELETE FROM detailpenjualan WHERE PenjualanID=$PenjualanID";
        mysqli_query($koneksi, $sql2);
        notifikasi($koneksi);
        header('location:../index.php?p=histori');
    }
}
