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
			width: 98%;
			min-height: 50px;
			background: #EDEDED;
			margin-left: 10px !important;
			border: 1px solid rgba(255, 255, 255, 0);
			padding: 10px;
	  	}
	  	.box-kegiatan:hover{
	  		border:1px solid #D52D30;
	  		/*border-radius: 5%;*/
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

<div class="container">
	<div class="row">
		<div class="col-sm-12" style="border:0px solid;padding-top:10px;">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-3"><h3>Info Kegiatan Komunitas</h3></div>
        <div class="col-sm-5"></div>
      </div>
    </div>
  </div>

  <div class="row" style="margin-top:10px;">
  	<div class="col-sm-1"></div>
  	<div class="col-sm-10" style="background-color: #fff">

  		<?php

		$batas=6;
		$halaman = @$_GET['halaman'];
		if(empty($halaman)){
		    $posisi = 0;
		    $halaman = 1;
		}else{
		    $posisi = ($halaman - 1) * $batas;
		}

  		$komunitas_id = $_GET['id'];

  		$query = mysqli_query($konek, "SELECT * FROM kegiatan_komunitas JOIN komunitas ON kegiatan_komunitas.komunitas_id=komunitas.komunitas_id WHERE kegiatan_komunitas.komunitas_id='$komunitas_id' ORDER BY kegiatan_komunitas.kegiatan_id desc limit $posisi,$batas");	
		if(!$query){
			die("Gagal : ".mysql_error());
		}

  		$no=1+$posisi;
  		
  		while ($row=mysqli_fetch_array($query)) {
  		$no++;
  		?>
  		<a href="detail_kegiatan_komunitas.php?id=<?php echo $row['kegiatan_id']; ?>">
  		<div class="row box-kegiatan" style="margin-top:10px;">
  			<div class="col-sm-12">
  				<img class="logo-kegiatan" src=<?php echo "../adminkomunitas/core/upload/logo/".$row['komunitas_logo'] ?>>
  				<b><?php echo $row['komunitas_nama']; ?></b> - 
  				<?php echo $row['kegiatan_nama'] ?>
  			</div>
  		</div>
  		</a>
	  	<?php
	  	} 

		  $paging2 = mysqli_query($konek,"SELECT * FROM kegiatan_komunitas");
		  $jmldata = mysqli_num_rows($paging2);
		  $jmlhalaman = ceil($jmldata/$batas);
		  ?>
		  <div class="col-sm-12">
			  <center><ul class='pagination'>
				  <?php
				  for($i=1; $i<=$jmlhalaman; $i++){
				      if($i != $halaman){
				          ?><li><a href="kegiatan_komunitas.php?halaman=<?php echo $i ?>"><?php echo $i ?></a></li><?php
				      }else{
				          ?><li class='active'><a href='#'><b><?php echo $i ?></b></a></li><?php
				      }
				  }
				  ?>
			  </ul></center>
		  </div>
	</div>
</body>