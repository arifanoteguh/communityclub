<!DOCTYPE html>
<html>
<head>
	<title> Landing Page </title>
</head>
<body>

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<style type="text/css">
		body{
			background-image:url("assets/bg1.jpg");
			background-size: 100%;
			background-repeat: no-repeat;

			overflow-x: hidden;
		}
		.headlight{
			position: absolute;
			width: 557px;
			height: 68px;
			margin-top: 30%;

			font-style: normal;
			font-weight: normal;
			font-size: 48px;
			line-height: 56px;
			display: flex;
			align-items: center;

			color: #FFFFFF;
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
	        margin-bottom: 70px;
	     }
	    /* End of Navbar Color */
	</style>
</head>
<body>

  <div class="row head-bar">
    <div class="col-sm-1"></div>
    <a href="index.php"><div class="col-sm-2">
      <img src="assets/logo.png" width="30px" height="32px">
      Community Club
    </div></a>
    <div class="col-sm-6"></div>
    <a href="login.php"><div class="col-sm-1">Masuk</div></a>
    <a href="adminkomunitas/registrasi.php"><div class="col-sm-1">Daftar</div></a>
  </div>

<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-5"><font class="headlight">Sebuah tempat untuk mencari komunitas  yang kamu butuhkan</font></div>
	<div class="col-sm-2"><button style="margin-top:93%" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">Bergabung Sekarang</button></div>
</div>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Daftar Sebagai :</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
        		<div class="col-sm-6">
		        	<a href="adminkomunitas/registrasi.php"><button class="btn btn-danger btn-lg">Komunitas</button></a>			
        		</div>
        		<div class="col-sm-6">        			
		        	<a href="anggota/registrasi.php"><button class="btn btn-danger btn-lg">Anggota</button></a>
        		</div>
        	</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</body>
</html>