<?php
  include '../koneksi.php';
  session_start();
  if(!isset($_SESSION['login_anggota'])){ //LOGIN
    ?><script>
      window.alert("Harap Login!");
      window.location.href="login.php";
    </script>
  <?php
  }
  
  $anggota_id = $_SESSION['anggota_id'];
  $query = mysqli_query($konek,"SELECT * FROM anggota WHERE anggota_id='$anggota_id'");
  if($query){
    $row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
	<title> Edit Profile</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<script src="../bootstrap/js/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>

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

<div class="container">
	<div>
		<form action="core/edit_profile.php" method="post" enctype="multipart/form-data">
		<div class="col-sm-12" style="border:0px solid;padding:20px;">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-11"><h2><font color="#000">Edit Profile</font></h2></div>
      </div>
			<div class="row">
				<div class="col-sm-1">
				</div>
				<div class="col-sm-4">
					<div class="panel panel-primary">
						<div class="panel-heading" style="background-color:#e32929; border-color:#e32929">Foto Preview</div>
						<div class="panel-body"><img id="prv" src="<?php echo "core/upload/foto/".$row['anggota_foto'] ?>" class="img-responsive" style="width:100%" alt="Image"></div>
					</div>
					<span class="btn btn-default btn-file">
						Pilih Foto <input type="file" name="upfoto" onchange="readURL(this);" accept="image/*">
					</span>
				</div>
				<div class="col-sm-6">
					<input type="text" disabled="" name="user_anggota" placeholder="Username" class="form-control" value="<?php echo $row['anggota_user'] ?>"><br>
					<input type="password" name="pass_anggota" placeholder="Password" class="form-control" value="<?php echo $row['anggota_pass'] ?>"><br>
					<input type="text" name="nama_anggota" placeholder="Nama" class="form-control" value="<?php echo $row['anggota_nama'] ?>"><br>
          <input type="text" name="ttl_anggota" placeholder="Tanggal Lahir" onfocus="(this.type='date')" class="form-control"  value="<?php echo $row['anggota_ttl'] ?>"><br>
          <textarea name="bio_anggota" placeholder="Bio" style="height:100px;" class="form-control"><?php echo $row['anggota_bio'] ?></textarea><br>
					<div class="form-group" style="text-align:right;">
						<input type="submit" name="kirim" class="btn btn-danger btn-md" value="Simpan">
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>

</body>
</html>
<?php
}
?>