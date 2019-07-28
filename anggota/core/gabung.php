<?php
include '../../koneksi.php';


if (isset($_POST['gabung'])) {
	$anggota_id = $_POST['id'];
	$komunitas_id = $_POST['id_k'];

	$query = mysqli_query($konek, "INSERT INTO anggota_komunitas(komunitas_id, anggota_id, status) VALUES('$komunitas_id', '$anggota_id', 'n')");
	if(!$query){
		die("Gagal : ".mysqli_error($konek));
	}elseif($query){
	?><script>
		window.alert("Silahkan menunggu konfirmasi dari Komunitas :)");
		window.location.href='../profile.php';
	</script><?php
	}	
}

?>