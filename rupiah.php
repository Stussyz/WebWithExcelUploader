<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\gaya.css">
    <title>DATA ANGSURAN RUPIAH</title>
</head>
<body>
<a href="index.php"><button>HALAMAN UTAMA</button></a>
    <center>
        <h1>
            UPLOADER DATA ANGSURAN RUPIAH
        </h1>
    <form method="post" enctype="multipart/form-data"
    action="rupiahuploader.php">

    <b>Import Data Pinjaman :</b>
    <input type="file" name="data_rupiah" required="required">
    <input type="submit" name="upload" value="upload">
    </form>
	<br>
	<br>
	
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

    <br>
    <table border="1">
<tr>
    <th>No</th>
	<th>Month Salur</th>
    <th>Tahun 2009</th>
    <th>Tahun 2010</th>
    <th>Tahun 2011</th>
    <th>Tahun 2014</th>
    <th>Tahun 2015</th>
    <th>Tahun 2016</th>
    <th>Tahun 2017</th>
    <th>Tahun 2018</th>
    <th>Tahun 2019</th>
    <th>Tahun 2020</th>
    <th>Tahun 2021</th>
    <th>Total</th>
	

</tr>
<?php
include_once('koneksi.php');
$no = 1;
$data_rupiah = mysqli_query($koneksi, "SELECT * FROM angsur_rupiah");
while ($data = mysqli_fetch_assoc($data_rupiah)) {
    ?>       
<tr>
    <td><?= $no++; ?></td>
	<td><?= $data['MONTH_SALUR']; ?></td>
    <td><?= $data['TH_2009']; ?></td>
    <td><?= $data['TH_2010']; ?></td>
    <td><?= $data['TH_2011']; ?></td>
    <td><?= $data['TH_2014']; ?></td>
    <td><?= $data['TH_2015']; ?></td>
    <td><?= $data['TH_2016']; ?></td>
    <td><?= $data['TH_2017']; ?></td>
    <td><?= $data['TH_2018']; ?></td>
    <td><?= $data['TH_2019']; ?></td>
    <td><?= $data['TH_2020']; ?></td>
    <td><?= $data['TH_2021']; ?></td>
    <td><?= $data['TOTAL']; ?></td>
    
</tr>
<?php
}
?>
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