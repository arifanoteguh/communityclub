<?php
include '../koneksi.php';

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

		$query = mysqli_query($konek,"SELECT * FROM admin WHERE admin_user='$user' AND admin_pass='$pass'");
		echo mysqli_error($konek);
		$rows =mysqli_num_rows($query);
		if($rows==1){
			session_start();
			$_SESSION['login_admin']=$user;		
			?><script>
				window.location.href='pendaftar_komunitas.php';
			</script><?php
		}else{
			?><script>
				window.alert("Username atau Password Salah");
				window.location.href='login.php';
			</script><?php
		}
		mysqli_close($konek);
	}
}
?>