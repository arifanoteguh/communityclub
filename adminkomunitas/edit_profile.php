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
	<title> Registrasi Komunitas</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<script src="../bootstrap/js/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>

	<style type="text/css">
  	body{
  		background-color:#EDEDED;
      overflow-x: hidden;
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
        color: #fff
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

<?php
  
  $komunitas_id = $_SESSION['komunitas_id'];
  $query = mysqli_query($konek,"SELECT * FROM komunitas WHERE komunitas_id='$komunitas_id'");
  if($query){
    $row = mysqli_fetch_array($query);
?>

<div class="container">
	<div>
		<form action="core/edit_profile.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="komunitas_id" value="<?php echo $komunitas_id ?>">
		<div class="col-sm-12" style="border:0px solid;padding:20px;">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-11"><h3><font color="#000">Edit Profile</font></h3></div>
      </div>
			<div class="row">
				<div class="col-sm-1">
				</div>
				<div class="col-sm-4">
					<div class="panel panel-primary">
						<div class="panel-heading" style="background-color:#e32929; border-color:#e32929">Logo Preview</div>
						<div class="panel-body"><img id="prv" src="../assets/pict_default.png" class="img-responsive" style="width:100%" alt="Image"></div>
					</div>
					<span class="btn btn-default btn-file">
						Pilih Logo <input type="file" name="upfoto" onchange="readURL(this);" accept="image/*">
					</span>
				</div>
				<div class="col-sm-6">
					<input type="text" name="nama_komunitas" placeholder="Nama Komunitas" class="form-control" value="<?php echo $row['komunitas_nama'] ?>"><br>
          <input type="text" name="kontak_komunitas" placeholder="Kontak Komunitas" class="form-control" value="<?php echo $row['komunitas_kontak'] ?>"><br>
					<input type="text" list="jenis" class="form-control country" placeholder="Jenis Komunitas" name="jenis_komunitas" value="<?php echo $row['komunitas_jenis'] ?>">
            <datalist id="jenis">
              <?php
                $query2 = mysqli_query($konek,"SELECT * FROM jenis_komunitas order by jenis_id asc");
                if(!$query2){
                  die("Gagal Membaca : ".mysqli_error());
                }
                while($dlist=mysqli_fetch_array($query2)){
              ?>
                  <option value="<?php echo ucfirst($dlist['jenis_komunitas']) ?>">
              <?php
                }
              ?>
            </datalist>
					<br>
					<textarea name="alamat_komunitas" placeholder="Alamat Komunitas" style="height:180px;" class="form-control"><?php echo $row['komunitas_alamat'] ?></textarea><br>
          <textarea name="deskripsi_komunitas" placeholder="Deskripsi Komunitas" style="height:180px;" class="form-control"><?php echo $row['komunitas_desk'] ?></textarea><br>
					<div class="form-group" style="text-align:right;">
						<input type="submit" name="kirim" class="btn btn-danger btn-md" value="Edit Profile">
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>

<?php
  }
?>

</body>
</html>