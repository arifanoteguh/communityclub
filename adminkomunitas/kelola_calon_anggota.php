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
	  		border-radius:50%;
	  		width: 120px;
	  		height: 120px;
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
	      color: #fff;
	     }

	     .head-bar{
	        margin-bottom: 30px;
	        background-color: #D52D30;
	        padding: 10px;
	     }

	     .fa-minus:hover,.fa-plus:hover{
	     	color: blue;
	     }
	</style>
</head>
<body>

  <div class="row head-bar">
    <div class="col-sm-1"></div>
    <a href="profile.php"><div class="col-sm-2">
      <img src="../assets/logo.png" width="30px" height="32px">
      Community Club
    </div></a>
    <div class="col-sm-6"></div>
    <a href="profile.php" style="cursor:pointer;"><div class="col-sm-1" style="margin-top:5px;">Profile</div></a>
    <a href="core/logout.php" style="cursor:pointer;"><div class="col-sm-1" style="margin-top:5px;">Keluar</div></a>
  </div>

<div class="container">
	<div class="row">
		<div class="col-sm-12" style="border:0px solid;padding-top:10px;">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-3"><h3>Anggota Komunitas</h3></div>
        <div class="col-sm-5"></div>
        <div class="col-sm-2"><a href="kelola_anggota.php"><button style="margin-top:15px; margin-left: 100px;" class="btn btn-md btn-warning">&nbsp;Kembali</button></a></div>
      </div>
    </div>
  </div>

  <div class="row" style="margin-top:10px;">
  	<div class="col-sm-1"></div>
  	<div class="col-sm-10" style="background-color: #fff">
  		<div class="col-sm-12" style="padding: 10px;">
  			<div class="row" style="margin: 10px;">

					<?php
						$komunitas_id = $_SESSION['komunitas_id'];
						$query = mysqli_query($konek,"SELECT * FROM anggota_komunitas JOIN anggota ON anggota_komunitas.anggota_id = anggota.anggota_id WHERE anggota_komunitas.komunitas_id='$komunitas_id' AND status='n' ORDER BY anggota.anggota_id");
			        	if(!$query){
							die("Gagal Membaca : ".mysqli_error());
						}
						while($row=mysqli_fetch_array($query)){
					?>

	  			<div class="col-sm-2 box-kegiatan">
	  				<div class="row" style="margin-top: 10px;">
		  				<div class="col-sm-12">
			  				<div class="col-sm-6"></div>
		  					<form method="post" action="core/kelola_calon_anggota.php" class="col-sm-1 float-left">
		  						<input type="hidden" name="komunitas_id" value="<?php echo $row['komunitas_id'] ?>">
		  						<input type="hidden" name="anggota_id" value="<?php echo $row['anggota_id'] ?>">
                               	<button type="submit" style="background:none; border:none;padding:0;" name="hapus"><span class="fa fa-minus"></span></button>
			  				</form>
		  					<form method="post" action="core/kelola_calon_anggota.php" class="col-sm-1 float-right">
		  						<input type="hidden" name="komunitas_id" value="<?php echo $row['komunitas_id'] ?>">
		  						<input type="hidden" name="anggota_id" value="<?php echo $row['anggota_id'] ?>">
                              	<button type="submit" name="tambah" style="background:none; border:none;padding:0;"><span class="fa fa-plus"></span></button>
			  				</form>
			  			</div>
		  			</div>
	  				<div class="col-sm-12">
	  					<img src="<?php echo"../anggota/core/upload/foto/".$row['anggota_foto'] ?>" class="foto-kegiatan">
	  				</div>
	  				<div class="col-sm-12" style="margin-top:20px;">
	  					<center><?php echo $row['anggota_nama'] ?></center>
	  				</div>
	  			</div>

				<?php
				}
				?>

	  		</div>
  		</div>
  	</div>
  </div>
</div>

</body>
</html>