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
	<title></title>
</head>
<body>

<?php

if (isset($_POST['kirim'])) {
	$kegiatan_id = $_POST['kegiatan_id'];
	$komunitas_id = $_SESSION['komunitas_id'];

	$query = mysqli_query($konek,"SELECT * FROM kegiatan_komunitas WHERE komunitas_id='$komunitas_id' AND kegiatan_id='$kegiatan_id'");
	if($query){
		$row = mysqli_fetch_array($query);
?>

Form
<form method="post" action="core/edit_kegiatan.php" enctype="multipart/form-data">
	<input type="hidden" name="komunitas_id" value="<?php echo $_SESSION['komunitas_id'] ?>">
	<input type="hidden" name="kegiatan_id" value="<?php echo $row['kegiatan_id'] ?>">
	<input type="file" name="upfoto" accept="image/*"><br>
	<input type="text" name="kegiatan" placeholder="Nama Kegiatan" value="<?php echo $row['kegiatan_nama'] ?>"><br>
	<textarea name="deskripsi"><?php echo $row['deskripsi'] ?></textarea><br>

	<input type="submit" name="kirim" value="Edit">
</form>

<?php
	}
}

?>

</body>
</html>