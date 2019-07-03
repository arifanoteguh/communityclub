<?php
	include '../koneksi.php';
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
	<title></title>
</head>
<body>

<a href="tambah_kegiatan.php"><button>Tambah Kegiatan</button></a><br><br>

<table border="1">
	<thead>
		<th>Foto</th>
		<th>Kegiatan</th>
		<th>Deskripsi</th>
		<th>Option</th>
	</thead>
	<tbody>
		<?php
			$query = mysqli_query($konek,"SELECT * FROM kegiatan_komunitas WHERE komunitas_id = '$komunitas_id' order by komunitas_id asc");
        	if(!$query){
				die("Gagal Membaca : ".mysqli_error());
			}
			while($row=mysqli_fetch_array($query)){
		?>
		<tr>
			<td><img src="<?php echo "core/komunitas/kegiatan/".$row['komunitas_id']."/".$row['foto_nama'] ?>" width="100px"></td>
			<td><?php echo $row['kegiatan_nama'] ?></td>
			<td><?php echo $row['deskripsi'] ?></td>
			<td>
				<form action="edit_kegiatan.php" method="post" enctype="multipart/form-data" name="form1">
					<input type="hidden" name="kegiatan_id" value="<?php echo $row['kegiatan_id'] ?>">
					<input type="submit" value="Edit" name="kirim">
				</form>
				<form action="core/hapus_kegiatan.php" method="post" name="form2">
					<input type="hidden" name="kegiatan_id" value="<?php echo $row['kegiatan_id'] ?>">
					<input type="submit" value="Hapus" name="hapus">
				</form>
			</td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>

</body>
</html>