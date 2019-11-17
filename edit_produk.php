<fieldset>
	<legend>Edit Data</legend>

	<?php
	$kdproduk = @$_GET['kdproduk'];
	$sql = mysqli_query($conn,"select * from tb_produk where kode_produk = '$kdproduk'") or die (mysql_error());
	$data = mysqli_fetch_array($sql);
	?>

	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Kode produk</td>
				<td> : </td>
				<td><input type="text" name="kode_produk" value="<?php echo $data['kode_produk']; ?>" disabled="disabled" /></td>
			</tr>
			<tr>
				<td>Nama produk</td>
				<td> : </td>
				<td><input type="text" name="nama_produk" value="<?php echo $data['nama_produk']; ?>" /></td>
			</tr>
			<tr>
				<td>Lokasi</td>
				<td> : </td>
				<td><input type="text" name="lokasi" value="<?php echo $data['lokasi']; ?>" /></td>
			</tr>
			<tr>
				<td>No Hp</td>
				<td> : </td>
				<td><input type="text" name="nope_petani" value="<?php echo $data['nope_petani']; ?>" /></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td> : </td>
				<td><input type="text" name="harga" value="<?php echo $data['harga']; ?>" /></td>
			</tr>
			<tr>
				<td>Ketersediaan</td>
				<td> : </td>
				<td>
				<select name="ketersediaan">
					<option value="">- pilih kesetersediaan -</option>
					<option value="tersedia">tersedia </option>
					<option value="terjual">terjual </option>
				</select>
				</td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td>: </td>
				<td><input type="file" name="gambar_produk" value="<?php echo $data['gambar_produk']; ?>"/></td>
			</tr>
			<tr>
				<td></td>
				<td> : </td>
				<td><input type="submit" name="edit" value="Edit"/> <input type="submit" name="batal" value="Batal" /></td>
			</tr>
		</table>
	</form>

	<?php
		
		$nama_produk = @$_POST['nama_produk'];
		$lokasi = @$_POST['lokasi'];
		$nope_petani = @$_POST['nope_petani'];
		$harga = @$_POST['harga'];
		$ketersediaan = @$_POST['ketersediaan'];
		$asal = @$_FILES['gambar_produk']['tmp_name'];
		$target = 'img/';
		$nama_gambar = @$_FILES['gambar_produk']['name'];
		$edit_produk = @$_POST['edit'];

	if($edit_produk){
		if($nama_produk=="" || $lokasi== "" || $nope_petani=="" || $harga=="" || $ketersediaan=="" || $nama_gambar=="" ){
			?>
			<script type="text/javascript">
			alert("Inputan tidak boleh ada yang kosong");
			</script>
			<?php	
		} else {
			if ($nama_gambar ==""){
					mysqli_query($conn,"update tb_produk set nama_produk='$nama_produk', lokasi='$lokasi', harga='$harga', ketersediaan='$ketersediaan', gambar_produk='$nama_gambar' where kode_produk = '$kdproduk'") or die (mysql_error());
					?>
					<script type="text/javascript">
					alert("data berhasil di edit");
					window.location.href="?page=produk";
					</script>
					<?php
			} else {
				$pindah = move_uploaded_file($asal, $target.$nama_gambar);
				if($pindah){
					mysqli_query($conn,"update tb_produk set nama_produk='$nama_produk', lokasi='$lokasi', harga='$harga', ketersediaan='$ketersediaan', gambar_produk='$nama_gambar' where kode_produk = '$kdproduk'") or die(mysql_error());
					?>
					<script type="text/javascript">
					alert("Data berhasil di edit");
					window.location.href="?page=produk";
					</script>
					<?php
				} else {
					?>
					<script type="text/javascript">
					alert("Gambar gagal di upload");
					</script>
					<?php
				}
			}
		}
	}
	?>

</fieldset>


