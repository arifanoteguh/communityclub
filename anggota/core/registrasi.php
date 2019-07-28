<?php
include '../../koneksi.php';

if(isset($_POST['kirim'])){

	$anggota_user = $_POST['user_anggota'];
	$anggota_pass = $_POST['pass_anggota'];
	$anggota_nama = $_POST['nama_anggota'];
	$anggota_ttl = $_POST['ttl_anggota'];
	$anggota_bio = $_POST['bio_anggota'];

	//anggota baru atau bukan
	$query = mysqli_num_rows(mysqli_query($konek,"SELECT * FROM anggota WHERE anggota_user='$anggota_user' "));
	if(!$query == 0){
		?><script>
			window.alert("Username telah digunakan");
			window.history.back();
		</script><?php
	}

	//Upload Foto/Gambar
	$rand_digit=rand(00000,99999);
	$target_dir = "upload/foto/";
	if(!file_exists($target_dir)){
		mkdir($target_dir,0777,true);
	}
	$nama_file = $rand_digit.$_FILES['upfoto']['name'];
	$target_file = $target_dir.basename($nama_file);
	$ukuran_file = $_FILES['upfoto']['size'];
	$tipe_file = $_FILES['upfoto']['type'];	
	$tmp_file = $_FILES['upfoto']['tmp_name'];
	$tgl = date('Y-m-d');

	if(empty($anggota_user) || empty($anggota_pass) || empty($anggota_nama) || empty($anggota_bio) || empty($anggota_ttl) || empty($nama_file)){
		?><script>
			window.alert("Semua Data Harus Diisi");
			window.history.back();
		</script><?php
	}else{
			if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg"){ 
				if($ukuran_file<=20000000){
					if(move_uploaded_file($tmp_file,$target_file)){
						$query = mysqli_query($konek,"INSERT INTO anggota(anggota_user, anggota_pass, anggota_nama, anggota_foto, anggota_foto_size, anggota_foto_tipe, anggota_ttl, anggota_bio) VALUES('$anggota_user', '$anggota_pass', '$anggota_nama', '$nama_file', '$ukuran_file', '$tipe_file', '$anggota_ttl', '$anggota_bio')");
						if($query){
						?><script>
							window.alert("Selamat kamu telah berhasil menjadi Anggota, Silahkan tunggu update selanjutnya :)");
							window.location.href='../login.php';
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
		echo mysqli_error($konek);
	}
	mysqli_close($konek);
}
?>