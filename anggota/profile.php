<?php
  include '../koneksi.php';
  // include 'core/login.php';
  session_start();
  if(!isset($_SESSION['login_anggota'])){ //LOGIN
    ?><script>
      window.alert("Harap Login!");
      window.location.href="login.php";
    </script>
    <?php
  }

$komunitas_id = $_SESSION['anggota_id'];

$query = mysqli_query($konek,"SELECT * FROM anggota WHERE anggota_id='$komunitas_id'");

$jml_anggota = mysqli_num_rows(mysqli_query($konek,"SELECT anggota_komunitas.anggota_id FROM anggota_komunitas JOIN komunitas ON anggota_komunitas.komunitas_id=komunitas.komunitas_id"));

if($query){
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title> Profile </title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<script src="../bootstrap/js/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>

  <!-- Font Awesome -->
  <link href="../admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<style type="text/css">
	  	body{
	  		background-color:#EDEDED;

	      overflow-x: hidden;
	  	}
	  	.foto-kegiatan{
	  		border-radius:50%;
	  		width: 50px;
	  		height: 50px;
	  		margin-top:10px;
	  	}
	  	.logo-kegiatan{
	  		border-radius:50%;
	  		width: 50px !important;
	  		height: 50px !important;
	  	}
	  	.box-kegiatan{
			width: 100px !important;
			height: 100px !important;
			background: #EDEDED;
			margin-left: 10px !important;
			border: 1px solid rgba(255, 255, 255, 0);
	  	}
	  	.box-kegiatan:hover{
	  		border:1px solid #D52D30;
	  		border-radius: 5%;
	  		cursor: pointer;
	  	}
	  	.btn-file {
	      position: relative;
	      overflow: hidden;
	  		background-color: #d9534f;
	  		border-color:#ac2925;
	  		color:white;
	      }
	  	.btn-file:hover {
	  		background-color: #e32929;
	  		border-color:#ac2925;
	  		color:white;
	  	}
	      .btn-file input[type=file] {
	          position: absolute;
	          top: 0;
	          right: 0;
	          min-width: 100%;
	          min-height: 100%;
	          font-size: 100px;
	          text-align: right;
	          filter: alpha(opacity=0);
	          opacity: 0;
	          outline: none;
	          background: white;
	          cursor: inherit;
	          display: block;
	      }
	      .navbar{
	        font-size: 10pt;
	        margin-bottom: 50px;
	        border-radius: 0;
	      }
	      .glyphicon.glyphicon-log-in,
	      .glyphicon.glyphicon-plus{
	        font-size: 15px;
	      }
	      .glyphicon.glyphicon-search{
	        color: #ecf0f1;
	      }
	      .glyphicon.glyphicon-search:hover{
	        color: #ffffff;
	      }
	  	
	  	.panel.panel-primary{
	        border-color: #e32929;
	  	}
		   
	     a,a:hover{
	      color: #000;
	     }

	     .head-bar{
	        margin-bottom: 30px;
	        background-color: #D52D30;
	        padding: 10px;
	        color: #fff
	     }

	     .fa-minus:hover,.fa-edit:hover{
	     	color: blue;
	     }
	</style>
</head>
<body>

  <div class="row head-bar">
    <div class="col-sm-1"></div>
    <a href="profile.php" style="color:white;"><div class="col-sm-2">
      <img src="../assets/logo.png" width="30px" height="32px">
      Community Club
    </div></a>
    <div class="col-sm-6"></div>
    <a href="profile.php" style="cursor:pointer;color:white;"><div class="col-sm-1" style="margin-top:5px;">Profile</div></a>
    <a href="core/logout.php" style="cursor:pointer;color:white;"><div class="col-sm-1" style="margin-top:5px;">Keluar</div></a>
  </div>

  <div class="row" style="margin-top:10px;">
  	<div class="col-sm-1"></div>
  	<div class="col-sm-7" style="background-color: #fff; padding-bottom:20px">
  		<div class="row">
  			<div class="col-sm-10"></div>
  			<div class="col-sm-2" style="padding-top: 20px;">
  				<a href="edit_profile.php" class="btn btn-sm btn-success">Edit Profile</a>
  			</div>
  		</div>
  		<div class="row">
  			<div class="col-sm-4" style="margin-top:-30px; margin-left: 5px;">
				<img src="<?php echo "core/upload/foto/".$row['anggota_foto'] ?>" width="200px">
  			</div>
  			<div class="col-sm-4" style="margin-left:-60px; margin-top:-35px;">

			<?php
  				echo "<h4>".ucfirst($row['anggota_nama'])."</h4>";
  				echo "<h4>".ucfirst($row['anggota_bio'])."</h4>";
			?>
  			</div>
  		</div>
  	</div>
  	<div class="col-sm-3" style="margin-left: 20px; background-color: #fff">
  		<div class="row">
  			<div class="col-sm-12" style="padding-top:15px;">
  				<form method="post" action="cari.php">
  				<input type="text" name="komunitas_cari" class="form-control" placeholder="Cari Komunitas">
  				<input type="submit" name="cari" value="Cari" class="btn btn-md btn-success" style="float: right; margin-top:10px; margin-bottom:15px;">
  				</form>
  			</div>
  		</div>
  		<div class="row">

  		</div>
  	</div>
  </div>
  <div class="row" style="margin-top:10px">
  	<div class="col-sm-1"></div>
  	<div class="col-sm-7" style="background-color: #fff; padding-bottom:20px">
  		<div class="row" style="padding-top: 20px;">
  			<div class="col-sm-10">
	  			<h4>Info Komunitas</h4>
	  		</div>
  			<div class="col-sm-2">
  				<a href="kegiatan_komunitas.php" class="btn btn-sm btn-success">Info Lengkap</a>
  			</div>
  		</div>
  		<?php

  		$anggota_id = $_SESSION['anggota_id'];

  		$query = mysqli_query($konek, "SELECT * FROM kegiatan_komunitas JOIN komunitas ON kegiatan_komunitas.komunitas_id=komunitas.komunitas_id JOIN anggota_komunitas ON komunitas.komunitas_id=anggota_komunitas.komunitas_id WHERE anggota_komunitas.anggota_id='$anggota_id' ORDER BY kegiatan_komunitas.kegiatan_id desc limit 5");

  		while ($row=mysqli_fetch_array($query)) {
  		?>
  		<div class="row" style="margin-top:10px;">
  			<div class="col-sm-12">
  				<img class="logo-kegiatan" src=<?php echo "../adminkomunitas/core/upload/logo/".$row['komunitas_logo'] ?>>
  				<b><?php echo $row['komunitas_nama']; ?></b> - 
  				<?php echo $row['kegiatan_nama'] ?>
  			</div>
  		</div>
	  	<?php } ?>
  	</div>
  	<div class="col-sm-3" style="margin-left: 20px; background-color: #fff; margin-top:-130px; padding-bottom: 10px; padding-top: 15px">
		<div class="col-sm-9">
  			<h4>Komunitas Terdaftar</h4>
  		</div>
		<div class="col-sm-2">
			<a href="komunitas_tergabung.php" class="btn btn-sm btn-success">Semua</a>
		</div>
  		<?php

  		$anggota_id = $_SESSION['anggota_id'];

  		$query = mysqli_query($konek, "SELECT * FROM komunitas JOIN anggota_komunitas ON komunitas.komunitas_id=anggota_komunitas.komunitas_id WHERE anggota_komunitas.anggota_id='$anggota_id' AND anggota_komunitas.status='y'");

  		while ($row=mysqli_fetch_array($query)) {
  		?>
  		<div class="row" style="margin-top:10px;">
  			<div class="col-sm-12">
  				<div class="col-sm-3">
					<div class="foto-kegiatan" style="background-image: url('<?php echo "../adminkomunitas/core/upload/logo/".$row['komunitas_logo'] ?>'); background-size: 50px; background-repeat: no-repeat; background-position: center;"></div>
				</div>
				<div class="col-sm-8" style="margin-top:20px; margin-left:-20px;">
	  				<b><?php echo $row['komunitas_nama']; ?></b>
	  			</div>
  			</div>
  		</div>
	  	<?php } ?>
  	</div>
  </div>
</div>

</body>
</html>

<?php
}
?>