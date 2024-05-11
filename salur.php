<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\gaya2.css">
    <title>DATA SALUR</title>
</head>
<body>
<a href="index.php"><button>HALAMAN UTAMA</button></a>
    <center>
        <h1>
            UPLOADER DATA SALUR
        </h1>
    <form method="post" enctype="multipart/form-data"
    action="saluruploader.php">

    <b>Import Data Pinjaman :</b>
    <input type="file" name="data_peminjaman" required="required">
    <input type="submit" name="upload" value="upload">
    </form>
	<br>
	<br>
	
	<!-- Pembuatan Mesin Pencarian data (form) -->
	
	<h4>(untuk sementara hanya pencarian menggunakan nama)</h3>
	<form action="salur.php" method="get">
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
<br><br><br>
<form method="get">
			<label>masukkan tanggal</label>
			<input type="text" name='TGL_MULAI'>
			<input type="submit" value="FILTER">
		</form>
    <br>
    <table border="1">
		<!--ini merupakan kolom yang tidak terhubung secara langsung dengan database-->
<tr>
    <th>No</th>
	<th>Lama</th>
	<th>Kode</th>
    <th>Nama</th>
    <th>Alamat</th>
	<th>KODE SEKTOR</th>
	<th>SUB SEKTOR</th>
	<th>Cluster</th>
	<th>KODE BENTUK USAHA</th>
	<th>KODE TYPE PENYALURAN</th>
	<th>KODE JENIS PENYALURAN</th>
	<th>Jenis Usaha</th>
	<th>NO SIUP</th>
	<th>BA</th>
	<th>CDSA</th>
	<th>PROVINSI</th>
	<th>Kab / Kota</th>
	<th>KECAMATAN</th>
	<th>KELURAHAN</th>
	<th>TGL PENGJ</th>
	<th>PNG KE</th>
	<th>PNJ KE</th>
	<th>GENDER</th>
	<th>No Telp</th>
    <th>No HP</th>
	<th>PENGAJUAN</th>
	<th>SDM</th>
	<th>JUMLAH ASSET</th>
	<th>JUMLAH OMZET</th>
	<th>NAMA USAHA</th>
	<th>ALAMAT USAHA</th>
	<th>KEC USAHA</th>
	<th>PROV USAHA</th>
	<th>KAB KOTA USAHA</th>
	<th>TELP USAHA</th>
	<th>HP USAHA</th>
	<th>TGL SURVEY</th>
    <th>TGL USULAN</th>
	<th>USULAN TREG</th>
	<th>TGL PENETAPAN</th>
	<th>Tanggal SP3K</th>
	<th>Tanggal Transfer</th>
	<th>TGL CLR</th>
	<th>NO SP3K</th>
	<th>Pokok Pinjaman</th>
	<th>Jasa Pinjaman</th>
	<th>Total Pinjaman</th>
	<th>PERDANG</th>
	<th>LAMA PNJ</th>
	<th>GRC PRD</th>
	<th>Tanggal Mulai</th>
	<th>Tanggal Lunas</th>
	<th>Jenis Agunan</th>
	<th>Agunan</th>

</tr>
<!--ini merupakan pemanggilan data diatas menggunakan include koneksi-->
<?php
include_once('koneksi.php');
$no = 1;
$data_peminjaman = mysqli_query($koneksi, "SELECT * FROM appcdc2");
while ($data = mysqli_fetch_assoc($data_peminjaman)) {
}
// Memasukkan Script pencarian
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	//pencarian data
	$data_peminjaman = mysqli_query($koneksi, "SELECT * FROM appcdc2 WHERE NAMA LIKE '%".$cari."%'");
}else{
	//jika tidak ada  maka tampilkan seluruh data
	$data_peminjaman = mysqli_query($koneksi, "SELECT * FROM appcdc2");		
}
while ($data = mysqli_fetch_array($data_peminjaman)) {
    // Finish Script pencarian?>




    <td><?= $no++; ?></td>
	<td><?= $data['LAMA']; ?></td>
    <td><?= $data['KODE']; ?></td>
    <td><?= $data['NAMA']; ?></td>
    <td><?= $data['ADDR']; ?></td>
	<td><?= $data['C_KODE_SEKTOR']; ?></td>
	<td><?= $data['SUB_SEKTOR']; ?></td>
	<td><?= $data['CLUSTER']; ?></td>
	<td><?= $data['C_KODE_BENTUK_USAHA']; ?></td>
	<td><?= $data['C_KODE_TYPE_PENYALURAN']; ?></td>
	<td><?= $data['C_KODE_JENIS_PENYALURAN']; ?></td>
    <td><?= $data['JENIS_USAHA']; ?></td>
	<td><?= $data['NO_SIUP']; ?></td>
	<td><?= $data['BA']; ?></td>
	<td><?= $data['CDSA']; ?></td>
	<td><?= $data['PROVINSI']; ?></td>
	<td><?= $data['KAB_KOTA']; ?></td>
	<td><?= $data['KECAMATAN']; ?></td>
	<td><?= $data['KELURAHAN']; ?></td>
	<td><?= $data['TGL_PENGJ']; ?></td>
	<td><?= $data['PNG_KE']; ?></td>
	<td><?= $data['PNJ_KE']; ?></td>
	<td><?= $data['GENDER']; ?></td>
	<td><?= $data['NO_TLP']; ?></td>
	<td><?= $data['NO_HP']; ?></td>
	<td><?= $data['PENGAJUAN']; ?></td>
	<td><?= $data['SDM']; ?></td>
	<td><?= $data['JML_ASSET']; ?></td>
	<td><?= $data['JML_OMZET']; ?></td>
	<td><?= $data['NAMA_USAHA']; ?></td>
	<td><?= $data['ALAMAT_USAHA']; ?></td>
	<td><?= $data['KEC_USAHA']; ?></td>
	<td><?= $data['PROV_USAHA']; ?></td>
	<td><?= $data['KAB_KOTA_USAHA']; ?></td>
	<td><?= $data['TELP_USAHA']; ?></td>
	<td><?= $data['HP_USAHA']; ?></td>
	<td><?= $data['TGL_SURVEY']; ?></td>
	<td><?= $data['TGL_USULAN']; ?></td>
	<td><?= $data['USULAN_TREG']; ?></td>
	<td><?= $data['TGL_PENETAPAN']; ?></td>
	<td><?= $data['TGL_SP3K']; ?></td>
	<td><?= $data['TGL_TRF']; ?></td>
	<td><?= $data['TGL_CLR']; ?></td>
	<td><?= $data['NO_SP3K']; ?></td>
	<td><?= $data['POKOK_PINJ']; ?></td>
	<td><?= $data['JASA_PINJ']; ?></td>
	<td><?= $data['TOTAL_PINJ']; ?></td>
	<td><?= $data['PERD_ANG']; ?></td>
	<td><?= $data['LAMA_PNJ']; ?></td>
	<td><?= $data['GRC_PRD']; ?></td>
	<td><?= $data['TGL_MULAI']; ?></td>
	<td><?= $data['TGL_LUNAS']; ?></td>
	<td><?= $data['JENIS_AGUNAN']; ?></td>
	<td><?= $data['AGUNAN']; ?></td>
</tr>
<?php
    } ?>



    </table>
    </center>

    <!-- CHART JS-->
    <div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

    <script type="text/javascript" src="chartjs/Chart.js"></script>
    <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["BRONZE", "SILVER", "GOLD", "PLATINUM"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_bronze = mysqli_query($koneksi,"select * from appcdc2 where CLUSTER='BRONZE'");
					echo mysqli_num_rows($jumlah_bronze);
					?>, 
					<?php 
					$jumlah_silver = mysqli_query($koneksi,"select * from appcdc2 where CLUSTER='SILVER'");
					echo mysqli_num_rows($jumlah_silver);
					?>, 
					<?php 
					$jumlah_gold = mysqli_query($koneksi,"select * from appcdc2 where CLUSTER='GOLD'");
					echo mysqli_num_rows($jumlah_gold);
					?>, 
					<?php 
					$jumlah_platinum = mysqli_query($koneksi,"select * from appcdc2 where CLUSTER='PLATINUM'");
					echo mysqli_num_rows($jumlah_platinum);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.6)',
					'rgba(54, 162, 235, 0.6)',
					'rgba(255, 206, 86, 0.6)',
					'rgba(75, 192, 192, 0.6)'
					],
					borderColor: [
					'rgba(255, 16, 64, 2)',
					'rgba(54, 162, 235, 2)',
					'rgba(217, 255, 10, 2)',
					'rgba(75, 192, 192, 2)'
					],
					borderWidth: 1.5
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>