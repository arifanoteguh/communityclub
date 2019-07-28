<?php

	include '../../koneksi.php';

if(isset($_POST['hapus'])){
	$kegiatan_id = $_POST['kegiatan_id'];

	echo $kegiatan_id;

	$query = mysqli_query($konek,"DELETE FROM kegiatan_komunitas WHERE kegiatan_id = '$kegiatan_id'");
	if($query){
	?><script>
		window.alert("Kegiatan telah dihapus");
		window.location.href='../kegiatan.php';
	</script><?php	
	}
}

?>