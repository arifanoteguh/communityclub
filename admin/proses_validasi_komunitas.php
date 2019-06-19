<?php

	include '../koneksi.php';

	$komunitas_id = $_POST['komunitas_id'];

	if(isset($_POST['tolak'])){
		$query = mysqli_query($konek,"DELETE FROM komunitas WHERE komunitas_id = '$komunitas_id'");
		if($query){
			?><script>
				window.alert("Komunitas Telah Ditolak");
				window.location.href='pendaftar_komunitas.php';
			</script><?php
		}else{
			echo "tolak";
		}
	}elseif(isset($_POST['terima'])){
		$query = mysqli_query($konek,"UPDATE komunitas SET komunitas_status='Y' WHERE komunitas_id = '$komunitas_id'");
		if($query){
			?><script>
				window.alert("Komunitas Berhasil Divalidasi dan Sudah Terdaftar");
				window.location.href='pendaftar_komunitas.php';
			</script><?php
		}else{
			echo "terima";
		}
	}


?>