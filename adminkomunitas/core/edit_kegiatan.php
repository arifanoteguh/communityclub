<?php

include '../../koneksi.php';

if(isset($_POST['kirim'])){

	$komunitas_id = $_POST['komunitas_id'];
	$kegiatan_id = $_POST['kegiatan_id'];
	$kegiatan_nama = $_POST['kegiatan'];
	$kegiatan_desk = $_POST['deskripsi'];

	if(!empty($_FILES['upfoto']['name'])) {
		//Upload Foto/Gambar
		$rand_digit=rand(00000,99999);
		$target_dir = "komunitas/kegiatan/".$komunitas_id."/";
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

	if(empty($komunitas_id) || empty($kegiatan_nama) || empty($kegiatan_desk)){
		?><script>
			window.alert("Semua Data Harus Diisi");
			window.history.back();
		</script><?php
	}else{
			if(!empty($_FILES['upfoto']['name'])){
				if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg"){ 
					if($ukuran_file<=20000000){
						if(move_uploaded_file($tmp_file,$target_file)){
							$query = mysqli_query($konek,"UPDATE kegiatan_komunitas SET kegiatan_nama='$kegiatan_nama', deskripsi='$kegiatan_desk', foto_nama='$nama_file', foto_size='$ukuran_file', foto_tipe='$tipe_file' WHERE kegiatan_id='$kegiatan_id'");
							if($query){
							?><script>
								window.alert("Kegiatan telah diupdate");
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
				$query = mysqli_query($konek,"UPDATE kegiatan_komunitas SET kegiatan_nama='$kegiatan_nama', deskripsi='$kegiatan_desk' WHERE kegiatan_id='$kegiatan_id'");
				if($query){
				?><script>
					window.alert("Kegiatan telah diupdate");
					window.location.href='../profile.php';
				</script><?php
				}
			}
		echo mysqli_error($konek);
	}
	mysqli_close($konek);
}
?>