<?php
include '../../koneksi.php';

if(isset($_POST['masuk'])){
	if($_POST['user']=='' || $_POST['pass']==''){
		?><script>
			window.alert("Username atau Password Tidak Boleh Kosong");
			window.location.href='login.php';
		</script><?php
	}else{
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$user = stripslashes($user);
		$pass = stripslashes($pass);
		$user = mysql_real_escape_string($user);
		$pass = mysql_real_escape_string($pass);

		$query = mysqli_query($konek,"SELECT * FROM anggota WHERE anggota_user='$user' AND anggota_pass='$pass'");
		echo mysqli_error($konek);
		$row = mysqli_fetch_array($query);
		$rows =mysqli_num_rows($query);
		if($rows==1){
			session_start();
			$_SESSION['login_anggota']=$user;
			$_SESSION['anggota_id']=$row['anggota_id'];		
			?><script>
				window.location.href='../profile.php';
			</script><?php
		}else{
			?><script>
				window.alert("Username atau Password Salah");
				window.location.href='../login.php';
			</script><?php echo $user." ".$pass." ".$rows;
		}
		mysqli_close($konek);
	}
}
?>