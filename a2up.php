<?php
include_once('excel_reader2.php');
include_once('koneksi.php');
//timpa otomatis file lama dengan file baru yang di upload
mysqli_query($koneksi,"DELETE FROM a2");

$target = basename($_FILES['data_a2']['name']);
move_uploaded_file($_FILES['data_a2']['tmp_name'],$target);

//permission agar file bisa terbacaS
chmod($_FILES['data_a2']['name'],0777);

//mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['data_a2']['name'],false);

//hitung jumlah baris
$jumlah_baris = $data->rowcount($sheet_index=0);

$success = 0;
for ($i=2; $i<=$jumlah_baris; $i++) 
{
    $LAMA                         = $data->val($i, 1);
    $KODE                         = $data->val($i, 2);
    $NAMA                         = $data->val($i, 3);
    $BA                         = $data->val($i, 4);
    $CDSA                  = $data->val($i, 5);
    $PROVINSI                     = $data->val($i, 6);
    $KAB_KOTA                       = $data->val($i, 7);
    $THN_SALUR          = $data->val($i, 8);
    $JENIS_ANGS       = $data->val($i, 9);
    $KUALITAS      = $data->val($i, 10);
    $ANGS_AKHIR                  = $data->val($i, 11);
    $ANGSURAN                   = $data->val($i, 12);
    $GLJR                     = $data->val($i, 13);
    $ANGS_POKOK                         = $data->val($i, 14);
    $ANGS_JASA_PINJ                   = $data->val($i, 15);
    $ADJ_POKOK               = $data->val($i, 16);
    $ADJ_JASA                    = $data->val($i, 17);
    $KELEBIHAN                    = $data->val($i, 18);                            
    $PENGEMBALIAN                      = $data->val($i, 19);
    $PENDAPATAN                 = $data->val($i, 20);
    $C_USER                   = $data->val($i, 21);
    $C_DATE                       = $data->val($i, 22);

    if ($KODE !="" && $NAMA !="") 
    {
        mysqli_query($koneksi, "INSERT INTO a2 VALUES('',
        '$LAMA','$KODE','$NAMA','$BA','$CDSA','$PROVINSI','$KAB_KOTA','$THN_SALUR','$JENIS_ANGS',
        '$KUALITAS','$ANGS_AKHIR','$ANGSURAN','$GLJR','$ANGS_POKOK','$ANGS_JASA_PINJ',
        '$ADJ_POKOK','$ADJ_JASA','$KELEBIHAN','$PENGEMBALIAN','$PENDAPATAN','$C_USER','$C_DATE')");
    $success++;   
    }   
}

unlink($_FILES['data_a2']['name']);
if($success > 0)
{
    header("location:a2.php?upload=success");
}
else
{
    header("location:a2.php?upload=gagal");
}
?>