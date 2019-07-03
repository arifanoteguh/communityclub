<?php
  include '../koneksi.php';
  // include 'core/login.php';
  session_start();
  if(!isset($_SESSION['login_komunitas'])){ //LOGIN
    ?><script>
      window.alert("Komunitas Harap Login!");
      window.location.href="login.php";
    </script>
    <?php
  }

$komunitas_id = $_SESSION['komunitas_id'];

$query = mysqli_query($konek,"SELECT * FROM komunitas WHERE komunitas_id='$komunitas_id'");

if($query){
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<center>
	<img src="<?php echo "core/upload/logo/".$row['komunitas_logo'] ?>" width="100px">
	<div style="border:1px solid; width: 60%; min-height: 300px;">
		<h4>Deskripsi</h4>
		<form method="post" action="edit_profile.php">
			<input type="submit" name="edit" value="edit">
		</form>
		<?php echo $row['komunitas_desk'] ?>
			
	</div><br>
	<div style="border:1px solid; width: 60%; min-height: 200px;">
		<h4>Kegiatan</h4>
		<?php include 'kegiatan.php'; ?>
	</div>
	<a href="core/logout.php"><input type="submit" name="logout" value="Logout"></a>
</center>


</body>
</html>

<?php
}
?>