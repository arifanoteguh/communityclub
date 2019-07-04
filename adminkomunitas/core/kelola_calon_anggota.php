<?php

include '../../koneksi.php';

$anggota_id = $_POST['anggota_id'];
$komunitas_id = $_POST['komunitas_id'];

if(isset($_POST['tambah'])){
	$query = mysqli_query($konek,"UPDATE anggota_komunitas SET status='y' WHERE anggota_id='$anggota_id' AND komunitas_id='$komunitas_id' ");
	if($query){
	?><script>
		window.alert("Anggota baru telah ditambahkan");
		window.location.href='../kelola_calon_anggota.php';
	</script><?php			
	}
}elseif(isset($_POST['hapus'])){
	$query = mysqli_query($konek,"DELETE FROM anggota_komunitas WHERE anggota_id='$anggota_id' AND komunitas_id='$komunitas_id' ");
	if($query){
	?><script>
		window.alert("Calon Anggota telah ditolak");
		window.location.href='../kelola_calon_anggota.php';
	</script><?php			
	}
}

?>