<?php

	include '../koneksi.php';

	$komunitas_id = $_POST['komunitas_id'];

	if(isset($_POST['tolak'])){
		$query = mysqli_query($konek,"DELETE FROM komunitas_daftar WHERE komunitas_id = '$komunitas_id'");
		if($query){
			?><script>
				window.alert("Komunitas Telah Ditolak");
				window.location.href='pendaftar_komunitas.php';
			</script><?php
		}
	}elseif(isset($_POST['terima'])){
		$query = mysqli_query($konek,"INSERT INTO komunitas(komunitas_user, komunitas_pass, komunitas_logo, komunitas_logo_size, komunitas_logo_type, komunitas_nama, komunitas_jenis, komunitas_desk) SELECT komunitas_user, komunitas_pass, komunitas_logo, komunitas_logo_size, komunitas_logo_type, komunitas_nama, komunitas_jenis, komunitas_desk FROM komunitas_daftar WHERE komunitas_id = '$komunitas_id'");
		if($query){
			$query = mysqli_query($konek,"DELETE FROM komunitas_daftar WHERE komunitas_id = '$komunitas_id'");
			if($query){
				?><script>
					window.alert("Komunitas Berhasil Divalidasi dan Sudah Terdaftar");
					window.location.href='pendaftar_komunitas.php';
				</script><?php
			}
		}
	}

?>