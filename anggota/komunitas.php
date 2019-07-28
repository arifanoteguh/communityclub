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

$anggota_id = $_SESSION['anggota_id'];
$komunitas_id = $_GET['id'];

$query = mysqli_query($konek,"SELECT * FROM komunitas WHERE komunitas_id='$komunitas_id'");

$jml_anggota = mysqli_num_rows(mysqli_query($konek,"SELECT anggota_komunitas.anggota_id FROM anggota_komunitas JOIN komunitas ON anggota_komunitas.komunitas_id=komunitas.komunitas_id WHERE anggota_komunitas.komunitas_id='$komunitas_id'"));

if($query){
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
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
	  		width: 50px;
	  		height: 50px;
	  		margin-top:10px;
	  	}
	  	.foto-anggota{
	  		border-radius:50%;
	  		width: 30px !important;
	  		height: 30px !important;
	  		margin-top:-5px !important;
	  		margin-right:-25px !important;
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
  	<div class="col-sm-7" style="background-color: #fff; padding-bottom:20px; padding-top: 20px;">
  		<div class="row">
  			<div class="col-sm-10"></div>
  		</div>
  		<div class="row">
  			<div class="col-sm-1"></div>
  			<div class="col-sm-2">
				<img src="<?php echo "../adminkomunitas/core/upload/logo/".$row['komunitas_logo'] ?>" width="100px">
  			</div>
  			<div class="col-sm-8">

			<?php
  				echo "<h4>".ucfirst($row['komunitas_nama'])."</h4>";
  				echo "<h4>".ucfirst($row['komunitas_alamat'])."</h4>";
  				echo "<h4>".ucfirst($row['komunitas_kontak'])."</h4>";
  				echo "<h4>".ucfirst($row['komunitas_jenis'])."</h4>";
  				echo ucfirst($row['komunitas_desk']);
			?>
  			</div>
  		</div>
  	</div>
  	<div class="col-sm-3" style="margin-left: 20px; background-color: #fff">
  		<div class="row">
  			<div class="col-sm-7" style="padding-top:15px;">
  				<h4>Anggota : <?php echo $jml_anggota; ?>
  				<?php
					$anggota_id = $_SESSION['anggota_id'];
					$query = mysqli_query($konek,"SELECT * FROM anggota_komunitas JOIN anggota ON anggota_komunitas.anggota_id = anggota.anggota_id WHERE anggota_komunitas.anggota_id='$anggota_id' AND status='y' AND anggota_komunitas.komunitas_id='komunitas_id' ORDER BY anggota.anggota_id LIMIT 3");
		        	if(!$query){
						die("Gagal Membaca : ".mysqli_error());
					}
					while($row=mysqli_fetch_array($query)){
  				?>
	  					<img src="<?php echo"core/upload/foto/".$row['anggota_foto'] ?>" class="foto-anggota">
		  		<?php
					}
  				?>
  				</h4>
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
	  			<h4>Kegiatan Komunitas</h4>
	  		</div>
  			<div class="col-sm-2" style="margin-left:-30px;">
  				<a href="list_kegiatan_komunitas.php?id=<?php echo $komunitas_id; ?>" class="btn btn-sm btn-success">Seluruh Kegiatan</a>
  			</div>
  		</div>

  		<?php
  			$jml_kegiatan = mysqli_num_rows(mysqli_query($konek,"SELECT kegiatan_id FROM kegiatan_komunitas WHERE komunitas_id='$komunitas_id' ORDER BY kegiatan_id"));
  			if($jml_kegiatan!=0){
  		?>

		  <div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      <li data-target="#myCarousel" data-slide-to="1"></li>
		      <li data-target="#myCarousel" data-slide-to="2"></li>
		    </ol>

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner" style="max-width:900px; height:300px !important;">
		      <?php

		      $query_kegiatan = mysqli_query($konek,"SELECT * FROM kegiatan_komunitas WHERE komunitas_id='$komunitas_id' ORDER BY kegiatan_id DESC LIMIT 3");
		      $i=0;
		      while ($kegiatan=mysqli_fetch_array($query_kegiatan)) {
		      	if($i==0){
			      ?>
			      <div class="item active">
			        <center><img src="<?php echo "../adminkomunitas/core/komunitas/kegiatan/".$komunitas_id."/".$kegiatan['foto_nama'] ?>" style="height: 300px;"></center>
			      </div>
			      <?php
			    }else{
			      ?>
			      <div class="item">
			        <center><img src="<?php echo "../adminkomunitas/core/komunitas/kegiatan/".$komunitas_id."/".$kegiatan['foto_nama'] ?>" style="height: 300px;"></center>
			      </div>
			      <?php
			    }
			    $i=$i+1;
			      ?>
		    <?php
		      }
		    ?>
		    </div>

		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right"></span>
		      <span class="sr-only">Next</span>
		    </a>
		  </div>
		  <?php
			}
		  ?>
  	</div>
  </div>
</div>

</body>
</html>

<?php
}
?>