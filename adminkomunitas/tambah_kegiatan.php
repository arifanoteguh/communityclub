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


<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#prv').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<div class="container">
	<div>
		<div class="col-sm-12" style="border:0px solid;padding:20px;">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-9"><h2>Tambah Kegiatan</h2></div>
        <div class="col-sm-2"><a href="kegiatan.php"><button style="margin-top:15px; margin-left: -10px;" class="btn btn-md btn-warning">Kembali</button></a></div>
      </div>

		<form action="core/tambah_kegiatan.php" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-1">
				</div>
				<div class="col-sm-4">
					<div class="panel panel-primary">
						<div class="panel-heading" style="background-color:#e32929; border-color:#e32929">Foto Preview</div>
						<div class="panel-body"><img id="prv" src="../assets/pict_default.png" class="img-responsive" style="width:100%" alt="Image"></div>
					</div>
					<span class="btn btn-default btn-file">
						Pilih Foto <input type="file" name="upfoto" onchange="readURL(this);" accept="image/*">
					</span>
				</div>
				<div class="col-sm-6">
					<input type="hidden" name="komunitas_id" value="<?php echo $_SESSION['komunitas_id'] ?>">
					<input type="text" name="kegiatan" placeholder="Nama Kegiatan" class="form-control"><br>
          			<input type="text" name="tgl" placeholder="Tanggal Kegiatan" onfocus="(this.type='date')" class="form-control"><br>
					<textarea name="deskripsi" placeholder="Deskripsi Kegiatan" style="height:180px;" class="form-control"></textarea><br>
					<div class="form-group" style="text-align:right;">
						<input type="submit" name="kirim" class="btn btn-danger btn-md" value="Tambah">
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>

</body>
</html>