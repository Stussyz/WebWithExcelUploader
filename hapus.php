<?php
include "koneksi.php";

$KODE = $_GET ['KODE'];
//action dari button hapus
$hapus = mysqli_query($koneksi, "DELETE from appcdc2 where KODE ='$KODE'");

if ($hapus) {
    echo"<script> alert ('Data berhasil dihapus')</script>";
    header("refresh:0;index.php");
}else{
    echo "<script> alert ('Data gagal dihapus')</script>";
    header("refresh:0;index.php");
}
?>