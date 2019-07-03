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

if (isset($_POST['edit'])) {
	$komunitas_id = "2";

	$query = mysqli_query($konek,"SELECT * FROM komunitas WHERE komunitas_id='$komunitas_id'");
	if($query){
		$row = mysqli_fetch_array($query);
?>

Form
<form method="post" action="core/edit_profile.php" enctype="multipart/form-data">
	<input type="hidden" name="komunitas_id" value="<?php echo $komunitas_id ?>">
	<input type="file" name="upfoto" accept="image/*"><br>
	<textarea name="deskripsi"><?php echo $row['komunitas_desk'] ?></textarea><br>

	<input type="submit" name="kirim" value="Edit">
</form>

<?php
	}
}

?>

</body>
</html>