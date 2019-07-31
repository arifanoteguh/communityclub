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

  function potong_caption($x,$length){
    if(strlen($x)<=$length){
      echo $x;
    }
    else{
      $y=substr($x,0,$length)."...";
      echo $y; 
   }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title> Cari </title>
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
	  		width: 130px;
	  		height: 130px;
	  		margin-top:10px;
	  	}
	  	.logo-kegiatan{
	  		border-radius:50%;
	  		width: 130px !important;
	  		height: 130px !important;
	  	}
	  	.box-kegiatan{
	  		width: 47%;
			height: 200px;
			background: #EDEDED;
			margin-left: 10px !important;
			border: 1px solid rgba(255, 255, 255, 0);
			padding: 10px;
	  	}
	  	.box-kegiatan:hover{
	  		border:1px solid #D52D30;
	  		border-radius: 10px;
	  		cursor: pointer;
	  		background-color: #fff;
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
	      text-decoration: none;
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
		<div class="col-sm-12" style="border:0px solid;margin-top: -20px;">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-3"><h3>Cari Komunitas</h3></div>
        <div class="col-sm-5"></div>
      </div>
    </div>
  </div>

<div class="row" style="margin-top:10px;">
  	<div class="col-sm-1"></div>
  	<div class="col-sm-10" style="background-color: #fff; padding-top: 25px;">
		<form method="post" action="cari.php">
			<div class="col-sm-6">
				<input type="text" name="komunitas_cari" class="form-control" placeholder="Nama Komunitas">
			</div>
			<div class="col-sm-6">
			<input type="text" list="jenis" class="form-control" placeholder="Jenis Komunitas" name="jenis_komunitas" autocomplete="off">
	              <datalist id="jenis">
	                <?php
	                  $query = mysqli_query($konek,"SELECT * FROM jenis_komunitas order by jenis_id asc");
	                  if(!$query){
	                    die("Gagal Membaca : ".mysqli_error());
	                  }
	                  while($row=mysqli_fetch_array($query)){
	                ?>
	                    <option value="<?php echo ucfirst($row['jenis_komunitas']) ?>" style="width: 100%;">
	                <?php
	                  }
	                ?>
	              </datalist>
	        </div>

		<input type="submit" name="cari" value="Cari" class="btn btn-md btn-success" style="float: right; margin-top:10px; margin-bottom:15px;">

		<!-- <a href="cari_detail.php"><span class="btn btn-md btn-success" style="float: left; margin-top:10px; margin-bottom:15px;">Cari Berdasarkan Interest</span></a> -->
		</form>
  	</div>
</div>

  <div class="row" style="margin-top:10px;">
  	<div class="col-sm-1"></div>
  	<div class="col-sm-10" style="background-color: #fff; padding-top: 25px;">

  		<?php

  		$anggota_id=$_SESSION['anggota_id'];

		$batas=4;
		$halaman = @$_GET['halaman'];
		if(empty($halaman)){
		    $posisi = 0;
		    $halaman = 1;
		}else{
		    $posisi = ($halaman - 1) * $batas;
		}

		if(!empty($_POST['komunitas_cari']) && !empty($_POST['jenis_komunitas'])){
	  		$dicari = $_POST['komunitas_cari'];
	  		$dicari2 = $_POST['jenis_komunitas'];
	  		$query = mysqli_query($konek, "SELECT *, komunitas.komunitas_id AS kom_id FROM komunitas LEFT JOIN anggota_komunitas ON komunitas.komunitas_id=anggota_komunitas.komunitas_id WHERE (komunitas_nama LIKE '%$dicari%' OR komunitas_jenis LIKE '%$dicari%' OR komunitas_desk LIKE '%$dicari%' OR komunitas_jenis LIKE '%$dicari2%') AND komunitas_status='y' GROUP BY kom_id limit $posisi,$batas");	
	  	}elseif(empty($_POST['komunitas_cari']) && empty($_POST['jenis_komunitas'])){
	  		$query = mysqli_query($konek, "SELECT *, komunitas.komunitas_id AS kom_id FROM komunitas LEFT JOIN anggota_komunitas ON komunitas.komunitas_id=anggota_komunitas.komunitas_id WHERE komunitas_status='y' GROUP BY kom_id limit $posisi,$batas");	
	  	}elseif(empty($_POST['jenis_komunitas']) && !empty($_POST['komunitas_cari'])){
	  		$dicari = $_POST['komunitas_cari'];
	  		$query = mysqli_query($konek, "SELECT *, komunitas.komunitas_id AS kom_id FROM komunitas LEFT JOIN anggota_komunitas ON komunitas.komunitas_id=anggota_komunitas.komunitas_id WHERE (komunitas_nama LIKE '%$dicari%' OR komunitas_jenis LIKE '%$dicari%' OR komunitas_desk LIKE '%$dicari%') AND komunitas_status='y' GROUP BY kom_id limit $posisi,$batas");
	  	}elseif(!empty($_POST['jenis_komunitas']) && empty($_POST['komunitas_cari'])){
	  		$dicari2 = $_POST['jenis_komunitas'];
	  		$query = mysqli_query($konek, "SELECT *, komunitas.komunitas_id AS kom_id FROM komunitas LEFT JOIN anggota_komunitas ON komunitas.komunitas_id=anggota_komunitas.komunitas_id WHERE komunitas_jenis LIKE '%$dicari2%' AND komunitas_status='y' GROUP BY kom_id limit $posisi,$batas");	
	  	}
  		
		if(!$query){
			die("Gagal : ".mysqli_error($konek));
		}

  		$no=1+$posisi;
  		
  		while ($row=mysqli_fetch_array($query)) {
  		$no++;
  		?>
  		<a href="komunitas.php?id=<?php echo $row['kom_id']; ?>">
  		<div class="col-sm-6 box-kegiatan" style="margin-top:10px;">
  			<div class="col-sm-5">
				<div class="foto-kegiatan" style="background-image: url('<?php echo "../adminkomunitas/core/upload/logo/".$row['komunitas_logo'] ?>'); background-size: 130px; background-repeat: no-repeat; background-position: center;"></div>
  			</div>
  			<div class="col-sm-7" style="margin-top:-15px;">
  				<div class="row" style="min-height: 150px;">
	  				<h3><?php echo $row['komunitas_nama']; ?></h3>
	  				<b><?php echo $row['komunitas_jenis']; ?></b><br>
	  				<?php potong_caption($row['komunitas_desk'],80) ?>
	  			</div>
	  			<div class="row" style="float: right;">
					<form method="post" action="core/gabung.php">
						<?php
						if ($row['status']=='n') { ?>
							<input type="hidden" name="id" value="<?php echo $_SESSION['anggota_id'] ?>">
							<input type="hidden" name="id_k" value="<?php echo $row['kom_id'] ?>">
							<input type="submit" name="gabung" class="btn btn-sm btn-success" value="Menunggu Konfirmasi" disabled>
						<?php
						}elseif($row['status']==''){ ?>
							<input type="submit" name="gabung" class="btn btn-sm btn-success" value="Gabung"><input type="hidden" name="id" value="<?php echo $_SESSION['anggota_id'] ?>">
							<input type="hidden" name="id_k" value="<?php echo $row['kom_id'] ?>">
						<?php } ?>
						<a href="komunitas.php?id=<?php echo $row['kom_id']; ?>" class="btn btn-sm btn-success">Lihat</a>
					</form>
				</div>
  			</div>
  		</div>
  		</a>
	  	<?php
	  	} 


		if(!empty($_POST['komunitas_cari'])){
	  		$dicari = $_POST['komunitas_cari'];
	  		$paging2 = mysqli_query($konek, "SELECT *, komunitas.komunitas_id AS kom_id FROM komunitas LEFT JOIN anggota_komunitas ON komunitas.komunitas_id=anggota_komunitas.komunitas_id WHERE (komunitas_nama LIKE '%$dicari%' OR komunitas_jenis LIKE '%$dicari%' OR komunitas_desk LIKE '%$dicari%') AND (anggota_id='$anggota_id' OR anggota_id IS NULL) AND status='y'");	
	  	}else{
	  		$paging2 = mysqli_query($konek, "SELECT *, komunitas.komunitas_id AS kom_id FROM komunitas LEFT JOIN anggota_komunitas ON komunitas.komunitas_id=anggota_komunitas.komunitas_id WHERE anggota_id='$anggota_id' OR anggota_id IS NULL AND status='y'");	
	  	}

		  $jmldata = mysqli_num_rows($paging2);
		  $jmlhalaman = ceil($jmldata/$batas);
		  ?>
		  <div class="col-sm-12">
			  <center><ul class='pagination'>
				  <?php
				  for($i=1; $i<=$jmlhalaman; $i++){
				      if($i != $halaman){
				          ?><li><a href="cari.php?halaman=<?php echo $i ?>"><?php echo $i ?></a></li><?php
				      }else{
				          ?><li class='active'><a href='#'><b><?php echo $i ?></b></a></li><?php
				      }
				  }
				  ?>
			  </ul></center>
		  </div>
	</div>
</body>