<?php
include_once('excel_reader2.php');
include_once('koneksi.php');
//timpa otomatis file lama dengan file baru yang di upload
mysqli_query($koneksi,"DELETE FROM angsur_rupiah");

$target = basename($_FILES['data_mitra']['name']);
move_uploaded_file($_FILES['data_mitra']['tmp_name'],$target);

//permission agar file bisa terbacaS
chmod($_FILES['data_mitra']['name'],0777);

//mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['data_mitra']['name'],false);

//hitung jumlah baris
$jumlah_baris = $data->rowcount($sheet_index=0);

$success = 0;
for ($i=2; $i<=$jumlah_baris; $i++) 
{
    $MONTH_SALUR                   = $data->val($i, 1);
    $T_2009                         = $data->val($i, 2);
    $T_2010                         = $data->val($i, 3);
    $T_2011                         = $data->val($i, 4);
    $T_2014                         = $data->val($i, 5);
    $T_2015                         = $data->val($i, 6);
    $T_2016                         = $data->val($i, 7);
    $T_2017                         = $data->val($i, 8);
    $T_2018                         = $data->val($i, 9);
    $T_2019                         = $data->val($i, 10);
    $T_2020                         = $data->val($i, 11);
    $T_2021                         = $data->val($i, 12);
    $GRAND_TOTAL                         = $data->val($i, 13);
   
    {
        mysqli_query($koneksi, "INSERT INTO mtr VALUES('',
        '$MONTH_SALUR','$T_2009','$T_2010','$T_2011','$T_2014','$T_2015','$T_2016','$T_2017','$T_2018','$T_2019','$T_2020','$T_2021','$GRAND_TOTAL')");
    $success++;   
    }   
}

unlink($_FILES['data_mitra']['name']);
if($success > 0)
{
    header("location:mitra.php?upload=success");
}
else
{
    header("location:mitra.php?upload=gagal");
}
?>