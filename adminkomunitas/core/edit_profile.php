<?php

include '../../koneksi.php';

if(isset($_POST['kirim'])){

	$komunitas_id = $_POST['komunitas_id'];
	$komunitas_kontak = $_POST['kontak_komunitas'];
	$komunitas_jenis = $_POST['jenis_komunitas'];
	$komunitas_alamat = $_POST['alamat_komunitas'];
	$komunitas_desk = $_POST['deskripsi_komunitas'];

	if(!empty($_FILES['upfoto']['name'])) {
		//Upload Foto/Gambar
		$rand_digit=rand(00000,99999);
		$target_dir = "upload/logo/";
		if(!file_exists($target_dir)){
			mkdir($target_dir,0777,true);
		}
		$nama_file = $rand_digit.$_FILES['upfoto']['name'];
		$target_file = $target_dir.basename($nama_file);
		$ukuran_file = $_FILES['upfoto']['size'];
		$tipe_file = $_FILES['upfoto']['type'];	
		$tmp_file = $_FILES['upfoto']['tmp_name'];
		$tgl = date('Y-m-d');
	}

	if(empty($komunitas_desk)){
		?><script>
			window.alert("Deskripsi Tidak Bisa Kosong");
			window.history.back();
		</script><?php
	}else{
			if(!empty($_FILES['upfoto']['name'])){
				if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg"){ 
					if($ukuran_file<=20000000){
						if(move_uploaded_file($tmp_file,$target_file)){
							$query = mysqli_query($konek,"UPDATE komunitas SET komunitas_desk='$komunitas_desk', komunitas_logo='$nama_file', komunitas_logo_size='$ukuran_file', komunitas_logo_type='$tipe_file', komunitas_jenis='$komunitas_jenis', komunitas_kontak='$komunitas_kontak', komunitas_alamat='$komunitas_alamat' WHERE komunitas_id='$komunitas_id'");
							if($query){
							?><script>
								window.alert("Profile telah diupdate");
								window.location.href='../profile.php';
							</script><?php
							}
						}
					}else{
							?><script>
								window.alert("Ukuran Foto Tidak Boleh Lebih Dari 20MB");
								window.history.back();
							</script><?php	
					}
				}else{
					?><script>
						window.alert("Hanya Bisa Mengupload File Gambar");
						window.history.back();
					</script><?php	
				}
			}else{
				$query = mysqli_query($konek,"UPDATE komunitas SET komunitas_desk='$komunitas_desk', komunitas_jenis='$komunitas_jenis', komunitas_kontak='$komunitas_kontak', komunitas_alamat='$komunitas_alamat' WHERE komunitas_id='$komunitas_id'");
				if($query){
				?><script>
					window.alert("Profile telah diupdate");
					window.location.href='../profile.php';
				</script><?php
				}
			}
		echo mysqli_error($konek);
	}
	mysqli_close($konek);
}
?>