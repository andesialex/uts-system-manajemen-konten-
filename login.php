<?php
	@session_start();
	include "talk/koneksi.php";

	if(@$_SESSION['admin']){
		header("location: index_user.php");
	} else if (@$_SESSION['konsumen']){
		header("location: index_konsumen.php");
	} else {
?>

<!DOCTYPE html>
<html>
<head>
	<title>FARMERS TALK</title>
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
 
<div id="utama">
	<div id="judul">
		Selamat Datang di Farmers Talk
	</div>

	<div id="inputan">
		<form action="" method="post">
			<div>
				<input type="text" name="user" placeholder="username" class="lg" />
			</div>
			<div style="margin-top:10px;">
				<input type="password" name="pass" placeholder="password" class="lg" />
			</div>
			<div style="margin-top:10px;">
				<input type="submit" name="login" value="login" class="btn" />
				<span style='margin-left:130px;'>
					<a href='register.php'class="btn-right">Registrasi</a>
				</span>
			</div>
		</form>

		<?php
		$user = @$_POST['user'];
		$pass = @$_POST['pass'];
		$login = @$_POST['login'];

		if ($login) {
			if($user == "" || $pass== ""){
				?> <script type="text/javascript">alert("username/password tdk boleh kosong");</script> <?php
			} else {
				$sql = mysqli_query($conn,"select * from tb_login where username = '$user' and password = md5('$pass')") or die(mysql_error());
				$data = mysqli_fetch_array($sql);
				$cek = mysqli_num_rows($sql);
				if($cek >= 1){
					if($data['level']=="admin"){
						@$_SESSION['admin']= $data['kode_user'];
						header("location: index_user.php");
					} else if ($data['level']== "konsumen"){
						@$_SESSION['konsumen']= $data['kode_user'];
						header("location: index_konsumen.php");
					}
				} else {
						?> <script type="text/javascript">alert("login gagal, cobalagi!!");</script> <?php
				}
			}
		}
		?>
	</div>
</div>

</body>
</html>

<?php
}
?>