<?php
include_once('excel_reader2.php');
include_once('koneksi.php');
//timpa otomatis file lama dengan file baru yang di upload
mysqli_query($koneksi,"DELETE FROM angsur_rupiah");

$target = basename($_FILES['data_rupiah']['name']);
move_uploaded_file($_FILES['data_rupiah']['tmp_name'],$target);

//permission agar file bisa terbacaS
chmod($_FILES['data_rupiah']['name'],0777);

//mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['data_rupiah']['name'],false);

//hitung jumlah baris
$jumlah_baris = $data->rowcount($sheet_index=0);

$success = 0;
for ($i=2; $i<=$jumlah_baris; $i++) 
{
    $MONTH_SALUR                   = $data->val($i, 1);
    $TH_2009                         = $data->val($i, 2);
    $TH_2010                         = $data->val($i, 3);
    $TH_2011                         = $data->val($i, 4);
    $TH_2014                         = $data->val($i, 5);
    $TH_2015                         = $data->val($i, 6);
    $TH_2016                         = $data->val($i, 7);
    $TH_2017                         = $data->val($i, 8);
    $TH_2018                         = $data->val($i, 9);
    $TH_2019                         = $data->val($i, 10);
    $TH_2020                         = $data->val($i, 11);
    $TH_2021                         = $data->val($i, 12);
    $TOTAL                         = $data->val($i, 13);
   
    {
        mysqli_query($koneksi, "INSERT INTO angsur_rupiah VALUES('',
        '$MONTH_SALUR','$TH_2009','$TH_2010','$TH_2011','$TH_2014','$TH_2015','$TH_2016','$TH_2017','$TH_2018','$TH_2019','$TH_2020','$TH_2021','$TOTAL')");
    $success++;   
    }   
}

unlink($_FILES['data_rupiah']['name']);
if($success > 0)
{
    header("location:rupiah.php?upload=success");
}
else
{
    header("location:rupiah.php?upload=gagal");
}
?>