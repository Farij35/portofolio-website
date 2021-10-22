<?php
$namaServer = "sql300.epizy.com";
$username = "epiz_30130916";
$password = "7oWX0GJrndEWB";
$namaDatabase = "epiz_30130916_portofolio";

//Membuat Koneksi
$conn = mysqli_connect($namaServer,$username,$password,$namaDatabase);

//Cek Koneksi
if(!$conn){
    die("Koneksi Gagal: ".mysqli_connect_error());
}

?>