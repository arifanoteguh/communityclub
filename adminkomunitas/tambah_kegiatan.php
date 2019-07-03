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

Form
<form method="post" action="core/tambah_kegiatan.php" enctype="multipart/form-data">
	<input type="hidden" name="komunitas_id" value="<?php echo $_SESSION['komunitas_id'] ?>">
	<input type="file" name="upfoto" accept="image/*"><br>
	<input type="text" name="kegiatan" placeholder="Nama Kegiatan"><br>
	<textarea name="deskripsi"></textarea><br>

	<input type="submit" name="kirim">
</form>

</body>
</html>