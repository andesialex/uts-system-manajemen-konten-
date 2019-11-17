<?php
	@session_start();
	include "talk/koneksi.php";

	if(@$_SESSION['konsumen || petani']){
?>

<!DOCTYPE html>

<html>
<head>
	<title>Halaman Utama</title>
<style type="text/css">

body{
	font-family: arial;
	font-size: 14px;
}

#canvas{
	width: 960px;
	margin: 0 auto;
	border: 1px solid silver;
}

#header{
	font-size: 20px;
	padding: 20px;
}

#menu{
	background-color: #0dbd75;
} 

#menu ul{
	list-style: none;
	margin: 0;
	padding: 0;
}

#menu ul li.utama{ 
	display: inline-table;
}

#menu ul li:hover{
	background-color: #13d098;
}

#menu ul li a{
	display: block;
	text-decoration: none; 
	line-height: 40px; 
	padding: 0 10px;
	color: #fff;
}

.utama ul{
	display: none;
	position: absolute;
	z-index: 2;
}
.utama:hover ul{
	display: block;
}
.utama ul li{
	display: block;
	background-color: #13d098;
	width: 140px;
}

#isi{
	min-height: 400px;
	padding: 20px;
}

#footer{
	text-align: center;
	padding: 20px;
	background-color: #ccc;
}

</style>
</head>
<body>

<div id="canvas">
	<div id="header">
		<a href="index.html"><img src="img/1.png" width="300px" height="100px"></a>
	</div>
</div>

	<div id="menu">
		<ul>
			<li class="utama"><a href="?page=beranda">Beranda</a></li>
			<li class="utama"><a href="?page=tentangkami">Tentang Kami</a></li>
			<li class="utama"><a href="">Produk</a>
				<ul>
					<li><a href="?page=produk">Lihat Produk</a></li>
				</ul>
			</li>
			<li class="utama"><a href="?page=informasi">Informasi Pertanian</a>
				<ul>
					<li><a href="?page=informasi">Lihat Informasi</a></li>
				</ul></li>
			<li class="utama" style="float:right;"><a href="talk/logout.php">logout</a></li>
		</ul>
	</div>

	<div id="isi">
	<?php
	$page = @$_GET['page'];
	$action = @$_GET['action'];

	if($page == "beranda"){
		if($action==""){
			include "beranda.php";
		}
	} else if ($page == "tentangkami"){
		if($action==""){
			include "about.php";
		}
	} else if($page == "produk"){
		if($action==""){
			include "talk/produk.php";
		} else if ($action == "lihat_produk"){
			include "talk/lihat_produk.php";
	} else if($page == "informasi"){
		if($action==""){
			include "talk/informasi.php";
		} else if ($action == "lihat_informasi"){
			include "talk/lihat_informasi.php";
		}
	} else if ($page == ""){
		echo "Selamat Datang di Halaman Utama";
	} else {
		echo "404! halaman tidak ditemukan!!";
	}
	?>
</div>
	<div id="footer"> 
	Copyright 2019 - Andres sudrajat
	</div>
</div>
</body>
</html>

<?php
} else{
	header("location: login.php");
}
?>