<?php
  include '../koneksi.php';
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
  		background-color:#000;

      overflow-x: hidden;
  	}
    body::after{
      content: "";
      background-image:url("../assets/bg1.jpg");
      background-size: 100%;
      background-repeat: no-repeat;
      opacity: 0.3;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      position: absolute;
      z-index: -1; 
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
        margin-top: 10px;
        margin-bottom: 30px;
     }
	</style>

<script type="text/javascript">
$(document).ready(function()
{
 $(".country").change(function()
 {
  var id=$(this).val();
  var dataString = 'id='+ id;
 
  $.ajax
  ({
   type: "POST",
   url: "get_state.php",
   data: dataString,
   cache: false,
   success: function(html)
   {
      $(".state").html(html);
   } 
   });
  });
 
});
</script>
</head>
<body>

  <div class="row head-bar">
    <div class="col-sm-1"></div>
    <a href="../index.php"><div class="col-sm-2">
      <img src="../assets/logo.png" width="30px" height="32px">
      Community Club
    </div></a>
    <div class="col-sm-6"></div>
    <a href="login.php"><div class="col-sm-1">Masuk</div></a>
    <a href="registrasi.php"><div class="col-sm-1">Daftar</div></a>
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
		<form action="core/registrasi.php" method="post" enctype="multipart/form-data">
		<div class="col-sm-12" style="border:0px solid;padding:20px;">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-11"><h2><font color="#fff">Daftar</font></h2></div>
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
					<input type="text" name="user_komunitas" placeholder="Username" class="form-control"><br>
					<input type="password" name="pass_komunitas" placeholder="Password" class="form-control"><br>
					<input type="text" name="nama_komunitas" placeholder="Nama Komunitas" class="form-control"><br>
					<!-- <select name="jenis_komunitas"> -->
						<input type="text" list="jenis" class="form-control country" placeholder="Jenis Komunitas" name="jenis_komunitas">
              <datalist id="jenis">
                <?php
                  $query = mysqli_query($konek,"SELECT * FROM jenis_komunitas order by jenis_id asc");
                  if(!$query){
                    die("Gagal Membaca : ".mysqli_error());
                  }
                  while($row=mysqli_fetch_array($query)){
                ?>
                    <option value="<?php echo ucfirst($row['jenis_komunitas']) ?>">
                <?php
                  }
                ?>
              </datalist>
					<br>
					<textarea name="deskripsi_komunitas" placeholder="Deskripsi Komunitas" style="height:180px;" class="form-control"></textarea><br>
					<div class="form-group" style="text-align:right;">
						<input type="submit" name="kirim" class="btn btn-danger btn-md" value="Daftar">
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>

</body>
</html>