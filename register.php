<!DOCTYPE html>
<html>
<head>
	<title> halaman register</title>
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
	<div id="utama" style="margin-top:10%;">
		<div id="judul">
			Register FARMERS TALK
		</div>

	<div id="inputan">
		<form action="" method="post">
			<div>
				<input type="text" name="username" placeholder="username" class"lg" />
			</div>
			<div style="margin-top:10px;">
				<input type "password" name="password" placeholder="password" class "lg" />
			</div>
			<div style="margin-top:10px;">
				<input type="text" name="nama_lengkap" placeholder="nama lengkap" class "lg" />
			</div>
			<div style="margin-top:10px;">
				<select name="jenis_kelamin">
					<option value=""> pilih jenis kelamin </option>
					<option value="laki-laki">laki-laki </option>
					<option value="perempuan">perempuan </option>
				</select>
			</div>
			<div style="margin-top:10px;">
				<textarea name='alamat' class="lg" placeholder='alamat'></textarea>
			</div>
			<div style="margin-top:10px;">
				<input type="submit" name="register" value"Register" class"btn" />
				<span style='margin-left:120px;'>
					<a href='login.php' class="btn-right">Login</a>
				</span>
			</div>
		</form>
		<?php
		include "talk/koneksi.php";
		if(@$_POST['register']){
			$username = @$_POST['username'];
			$pasword = @$_POST['password'];
			$nama_lengkap = @$_POST['nama_lengkap'];
			$jenis_kelamin = @$_POST['jenis_kelamin'];
			$alamat = @$_POST['alamat'];

			if($username == '' || $password == '' || $nama_lengkap == '' || $jenis_kelamin == '' || $alamat == '') {
				?> <script type="text/javascript"> alert('inputan tdk boleh ada yang kosong');</script><?php
			} else {
				$sql_insert = mysqli_query($conn,"insert into loginn values ('', '$username', md5('$password'), '$nama_lengkap, '$jenis_kelamin', '$alamat', 'konsumen')");
				if($sql_insert){
					?><script type="text/javascript">alert('pendaftaran berhasil, silahkan login');</script> <?php
				}
			}
		}
		}
		?>
	</div>
</div>

</body>