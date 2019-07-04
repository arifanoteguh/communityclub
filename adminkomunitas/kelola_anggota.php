<?php
include '../koneksi.php';
  session_start();
  if(!isset($_SESSION['login_komunitas'])){ //LOGIN
    ?><script>
      window.alert("Komunitas Harap Login!");
      window.location.href="login.php";
    </script>
    <?php
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>	</title>
</head>
<body>

<div style="border:1px solid; width: 20%; min-height: 300px; float: left; margin-right: 20px;">
	<ul>
		<li><a href="kelola_anggota.php">List Anggota</a></li>
		<li><a href="kelola_calon_anggota.php">Pendaftar</a></li>
	</ul>
</div>
<div style="border:1px solid; width: 70%; min-height: 300px; float: left">
	<table border="1">
		<thead>
			<tr>
				<th>Foto</th>
				<th>Nama</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$komunitas_id = $_SESSION['komunitas_id'];
			$query = mysqli_query($konek,"SELECT * FROM anggota_komunitas JOIN anggota ON anggota_komunitas.anggota_id = anggota.anggota_id WHERE anggota_komunitas.komunitas_id='$komunitas_id' AND status='y' ORDER BY anggota.anggota_id");
        	if(!$query){
				die("Gagal Membaca : ".mysqli_error());
			}			
			while ($row=mysqli_fetch_array($query)) {
			?>
			<tr>
				<td>Foto</td>
				<td><?php echo $row['anggota_nama'] ?></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>

</body>
</html>