<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\gaya2.css">
    <title>DATA ANGSUR</title>
</head>
<body>
<a href="index.php"><button>HALAMAN UTAMA</button></a>
    <center>
        <h1>
            UPLOADER DATA ANGSUR
        </h1>
    <form method="post" enctype="multipart/form-data"
    action="a2up.php">

    <b>Import Data Angsuran :</b>
    <input type="file" name="data_a2" required="required">
    <input type="submit" name="upload" value="upload">
    </form>
		
		<!-- Pembuatan Mesin Pencarian data (form) -->
		
	<h4>(untuk sementara hanya pencarian menggunakan nama)</h3>
		<form action="a2.php" method="get">
		<label>Search  :</label>
		
		<input type="text" name="cari">
		<input type="submit" value="Cari">
	</form>
	
		<!-- Selesai pembuatan form -->
	
	
<!--pop up berhasil/gagal upload-->
    <?php
    if(isset($_GET['upload']))
    {
        if($_GET['upload']=="success")
        {
            echo"<h3>Data berhasil diupload</h3>";
        }
        else
        {
            echo"<h3>Data gagal diupload</h3>";
        }
    }
    ?>
<br><br>
<form method="get">
			<label>masukkan tanggal</label>
			<input type="text" name="C_DATE">
			<input type="submit" value="FILTER">
		</form>
    <br>
    <table border="1">
<tr>
    <th>No</th>
	<th>Data</th>
	<th>Kode</th>
    <th>Nama</th>
    <th>BA</th>
	<th>CDSA</th>
	<th>PROVINSI</th>
	<th>KAB / KOTA</th>
	<th>Tahun Salur</th>
	<th>Jenis Angsuran</th>
	<th>Kualitas</th>
	<th>Angsurn Akhir</th>
	<th>GLJR</th>
	<th>Angsuran</th>
	<th>Angsuran Pokok</th>
	<th>Angs. Jasa pinjam</th>
	<th>Adj Pokok</th>
	<th>Adj Jasa</th>
	<th>Kelebihan </th>
	<th>Pengembalian</th>
	<th>Pendapatan</th>
	<th>User</th>
	<th>Tanggal</th>
	<th>hapus data</th>
</tr>
<?php
include_once('koneksi.php');
$no = 1;
$data_peminjaman = mysqli_query($koneksi, "SELECT * FROM a2");
while ($data = mysqli_fetch_assoc($data_peminjaman)) {
}
// Memasukkan Script pencarian
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	//pencarian data
	$data_peminjaman = mysqli_query($koneksi, "SELECT * FROM a2 WHERE NAMA LIKE '%".$cari."%'");
}else{
	//jika tidak ada  maka tampilkan seluruh data
	$data_peminjaman = mysqli_query($koneksi, "SELECT * FROM a2");		
}
while ($data = mysqli_fetch_array($data_peminjaman)) {
    // Finish Script pencarian?>
<tr>
<td><?= $no++; ?></td>
	<td><?= $data['LAMA']; ?></td>
    <td><?= $data['KODE']; ?></td>
    <td><?= $data['NAMA']; ?></td>
    <td><?= $data['BA']; ?></td>
	<td><?= $data['CDSA']; ?></td>
	<td><?= $data['PROVINSI']; ?></td>
	<td><?= $data['KAB_KOTA']; ?></td>
	<td><?= $data['THN_SALUR']; ?></td>
	<td><?= $data['JENIS_ANGS']; ?></td>
	<td><?= $data['KUALITAS']; ?></td>
	<td><?= $data['ANGS_AKHIR']; ?></td>
    <td><?= $data['GLJR']; ?></td>
	<td><?= $data['ANGSURAN']; ?></td>
	<td><?= $data['ANGS_POKOK']; ?></td>
	<td><?= $data['ANGS_JASA_PINJ']; ?></td>
	<td><?= $data['ADJ_POKOK']; ?></td>
	<td><?= $data['ADJ_JASA']; ?></td>
	<td><?= $data['KELEBIHAN']; ?></td>
	<td><?= $data['PENGEMBALIAN']; ?></td>
	<td><?= $data['PENDAPATAN']; ?></td>
	<td><?= $data['C_USER']; ?></td>
	<td><?= $data['C_DATE']; ?></td>
    <td><a href="hapus.php?KODE=<?php echo $data ['KODE']; ?>">Hapus</a></td>
</tr>
<?php
    } ?>
    </table>
    </center>
</body>
</html>