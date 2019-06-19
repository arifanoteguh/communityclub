<?php
include '../../koneksi.php';

if(isset($_POST['kirim'])){

	$komunitas_user = $_POST['user_komunitas'];
	$komunitas_pass = $_POST['pass_komunitas'];
	$komunitas_nama = $_POST['nama_komunitas'];
	$komunitas_jenis = $_POST['jenis_komunitas'];
	$komunitas_deskripsi = $_POST['deskripsi_komunitas'];

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

	if(empty($komunitas_user) || empty($komunitas_pass) || empty($komunitas_nama) || empty($komunitas_jenis) || empty($komunitas_jenis) || empty($nama_file)){
		?><script>
			window.alert("Semua Data Harus Diisi");
			window.history.back();
		</script><?php
	}else{
			if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg"){ 
				if($ukuran_file<=20000000){
					if(move_uploaded_file($tmp_file,$target_file)){
						$query = mysqli_query($konek,"INSERT INTO komunitas(komunitas_user, komunitas_pass, komunitas_nama, komunitas_logo, komunitas_logo_size, komunitas_logo_type, komunitas_jenis, komunitas_desk, komunitas_status) VALUES('$komunitas_user', '$komunitas_pass', '$komunitas_nama', '$nama_file', '$ukuran_file', '$tipe_file', '$komunitas_jenis', '$komunitas_deskripsi', 'N')");
						if($query){
						?><script>
							window.alert("Komunitas berhasil didaftarkan, silahkan menunggu 2-3 hari untuk hasil validasinya");
							window.location.href='../../index.php';
						</script><?php	
						}
					}
				}else{
						?><script>
							window.alert("Ukuran Logo Tidak Boleh Lebih Dari 20MB");
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