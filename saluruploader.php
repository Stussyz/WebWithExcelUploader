<?php
include_once('excel_reader2.php');
include_once('koneksi.php');
//timpa otomatis file lama dengan file baru yang di upload
mysqli_query($koneksi,"DELETE FROM appcdc2");

$target = basename($_FILES['data_peminjaman']['name']);
move_uploaded_file($_FILES['data_peminjaman']['tmp_name'],$target);

//permission agar file bisa terbacaS
chmod($_FILES['data_peminjaman']['name'],0777);

//mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['data_peminjaman']['name'],false);

//hitung jumlah baris
$jumlah_baris = $data->rowcount($sheet_index=0);

$success = 0;
for ($i=2; $i<=$jumlah_baris; $i++) 
{
    $LAMA                         = $data->val($i, 1);
    $KODE                         = $data->val($i, 2);
    $NAMA                         = $data->val($i, 3);
    $ADDR                         = $data->val($i, 4);
    $C_KODE_SEKTOR                  = $data->val($i, 5);
    $SUB_SEKTOR                     = $data->val($i, 6);
    $CLUSTER                        = $data->val($i, 7);
    $C_KODE_BENTUK_USAHA          = $data->val($i, 8);
    $C_KODE_TYPE_PENYALURAN       = $data->val($i, 9);
    $C_KODE_JENIS_PENYALURAN      = $data->val($i, 10);
    $JENIS_USAHA                  = $data->val($i, 11);
    $NO_SIUP                      = $data->val($i, 12);
    $BA                           = $data->val($i, 13);
    $CDSA                         = $data->val($i, 14);
    $PROVINSI                     = $data->val($i, 15);
    $KAB_KOTA                     = $data->val($i, 16);
    $KECAMATAN                    = $data->val($i, 17);
    $KELURAHAN                    = $data->val($i, 18);                            
    $TGL_PENGJ                      = $data->val($i, 19);
    $PNG_KE                       = $data->val($i, 20);
    $PNJ_KE                       = $data->val($i, 21);
    $GENDER                       = $data->val($i, 22);
    $NO_TLP                       = $data->val($i, 23);
    $NO_HP                        = $data->val($i, 24);
    $PENGAJUAN                    = $data->val($i, 25);
    $SDM                          = $data->val($i, 26);
    $JML_ASSET                    = $data->val($i, 27);
    $JML_OMZET                    = $data->val($i, 28);
    $NAMA_USAHA                   = $data->val($i, 29);
    $ALAMAT_USAHA                 = $data->val($i, 30);
    $KEC_USAHA                    = $data->val($i, 31);
    $PROV_USAHA                   = $data->val($i, 32);
    $KAB_KOTA_USAHA               = $data->val($i, 33);
    $TELP_USAHA                   = $data->val($i, 34);
    $HP_USAHA                     = $data->val($i, 35);
    $TGL_SURVEY                   = $data->val($i, 36);
    $TGL_USULAN                   = $data->val($i, 37);
    $USULAN_TREG                  = $data->val($i, 38);
    $TGL_PENETAPAN                = $data->val($i, 39);
    $TGL_SP3K                     = $data->val($i, 40);
    $TGL_TRF                      = $data->val($i, 41);
    $TGL_CLR                      = $data->val($i, 42);
    $NO_SP3K                      = $data->val($i, 43);
    $POKOK_PINJ                   = $data->val($i, 44);
    $JASA_PINJ                    = $data->val($i, 45);
    $TOTAL_PINJ                   = $data->val($i, 46);
    $PERD_ANG                     = $data->val($i, 47);
    $LAMA_PNJ                     = $data->val($i, 48);
    $GRC_PRD                      = $data->val($i, 49);
    $TGL_MULAI                    = $data->val($i, 50);
    $TGL_LUNAS                    = $data->val($i, 51);
    $JENIS_AGUNAN                 = $data->val($i, 52);
    $AGUNAN                       = $data->val($i, 53);

    if ($KODE !="" && $NAMA !="") 
    {
        mysqli_query($koneksi, "INSERT INTO appcdc2 VALUES('',
        '$LAMA','$KODE','$NAMA','$ADDR','$C_KODE_SEKTOR','$SUB_SEKTOR','$CLUSTER','$C_KODE_BENTUK_USAHA','$C_KODE_TYPE_PENYALURAN',
        '$C_KODE_JENIS_PENYALURAN','$JENIS_USAHA','$NO_SIUP','$BA','$CDSA','$PROVINSI',
        '$KAB_KOTA','$KECAMATAN','$KELURAHAN','$TGL_PENGJ','$PNG_KE','$PNJ_KE','$GENDER','$NO_TLP','$NO_HP',
        '$PENGAJUAN','$SDM','$JML_ASSET','$JML_OMZET','$NAMA_USAHA','$ALAMAT_USAHA','$KEC_USAHA',
        '$PROV_USAHA','$KAB_KOTA_USAHA','$TELP_USAHA','$HP_USAHA','$TGL_SURVEY','$TGL_USULAN','$USULAN_TREG',
        '$TGL_PENETAPAN','$TGL_SP3K','$TGL_TRF','$TGL_CLR','$NO_SP3K','$POKOK_PINJ','$JASA_PINJ','$TOTAL_PINJ',
        '$PERD_ANG','$LAMA_PNJ','$GRC_PRD','$TGL_MULAI','$TGL_LUNAS','$JENIS_AGUNAN','$AGUNAN')");
    $success++;   
    }   
}

unlink($_FILES['data_peminjaman']['name']);
if($success > 0)
{
    header("location:salur.php?upload=success");
}
else
{
    header("location:salur.php?upload=gagal");
}
?>