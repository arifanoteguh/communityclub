<?php
	include '../koneksi.php';
  // Ini hapus ya kalo udah editnya
  session_start();
  // 
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
<html>
<head>
	<title> Kegiatan Komunitas</title>
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
	  		min-width: 120px;
	  		max-width: 1000px;
	  		min-height: 120px;
	  		max-height: 300px;
	  		margin-top:10px;
	  	}
	  	.box-kegiatan{
			width: 173px;
			height: 230px;
			background: #EDEDED;
			margin-left: 40px;
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

<div class="container">
	<div class="row">
		<div class="col-sm-12" style="border:0px solid;padding-top:10px;">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-3"><h3>Detail Kegiatan</h3></div>
        <div class="col-sm-5"></div>
        <div class="col-sm-2"><a href="kegiatan.php"><button style="margin-top:15px; margin-left: 100px;" class="btn btn-md btn-warning">Kembali</button></a></div>
      </div>
    </div>
  </div>

  <?php

  $komunitas_id = $_SESSION['komunitas_id'];
  $kegiatan_id = $_GET['id'];
  $query = mysqli_query($konek,"SELECT * FROM kegiatan_komunitas WHERE kegiatan_id='$kegiatan_id' AND komunitas_id='$komunitas_id'");

  if($query){

  	$row = mysqli_fetch_array($query);

  ?>

  <div class="row" style="margin-top:10px;">
  	<div class="col-sm-1"></div>
  	<div class="col-sm-10" style="background-color: #fff">
  		<center><h3><?php echo ucfirst($row['kegiatan_nama']) ?></h3>
  		<img src="<?php echo "core/komunitas/kegiatan/".$komunitas_id."/".$row['foto_nama'] ?>" class="foto-kegiatan"></center>
  		<hr size="2">
  		<h4>Tentang Kegiatan</h4>
  		<div class="col-sm-1"></div>
  		<div class="col-sm-11">
	  		<?php echo $row['deskripsi'] ?>
	  	</div>
  	</div>
  </div>

  <?php
	}
  ?>

</div>

</body>
</html>