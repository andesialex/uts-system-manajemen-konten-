    <fieldset>
	<legend></legend>

	<?php
	$carikode = mysqli_query($conn,"select max(kode_produk) from tb_produk") or die (mysql_error());
	$datakode = mysqli_fetch_array($carikode);
	if($carikode){
		$nilaikode = substr($datakode[0], 1);
		$kode = (int) $nilaikode;
		$kode =$kode + 1;
		$hasilkode = "M".str_pad($kode, 3, "0", STR_PAD_LEFT);
	} else {
		$hasilkode = "M001";
	}
	?>

	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Kode Produk</td>
				<td> : </td>
				<td><input type="text" name="kode_produk" value="<?php echo $hasilkode; ?>" /></td>
			</tr>
			<tr>
				<td>Nama produk</td>
				<td> : </td>
				<td><input type="text" name="nama_produk"/></td>
			</tr>
			<tr>
				<td>Lokasi</td>
				<td> : </td>
				<td><input type="text" name="lokasi"/></td>
			</tr>
			<tr>
				<td>No HP</td>
				<td> : </td>
				<td><input type="text" name="nope_petani"/></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td> : </td>
				<td><input type="text" name="harga"/></td>
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
				<td><input type="file" name="gambar_produk"/></td>
			</tr>
			<tr>
				<td></td>
				<td> : </td>
				<td><input type="submit" name="tambah" value="Tambah"/> <input type="reset" value="Reset"/></td>
			</tr>
		</table>
	</form>

	<?php
	$kode_produk = @$_POST['kode_produk'];
	$nama_produk = @$_POST['nama_produk'];
	$lokasi = @$_POST['lokasi'];
	$nope_petani = @$_POST['nope_petani'];
	$harga = @$_POST['harga'];
	$ketersediaan = @$_POST['ketersediaan'];

	$asal = @$_FILES['gambar_produk']['tmp_name'];
	$target = 'img/';
	$nama_gambar = @$_FILES['gambar_produk']['name'];

	$tambah_produk = @$_POST['tambah'];

	if($tambah_produk){
		if($kode_produk== "" || $nama_produk=="" || $lokasi== "" || $nope_petani=="" || $harga=="" ||$ketersediaan=="" || $nama_gambar=="" ){
			?>
			<script type="text/javascript">
			alert("Inputan tidak boleh ada yang kosong");
			</script>
			<?php	
		} else {
			$pindah = move_uploaded_file($asal, $target.$nama_gambar);
			if($pindah){
				mysqli_query($conn,"insert into tb_produk values ('$kode_produk', '$nama_produk', '$lokasi', '$nope_petani', '$harga', '$ketersediaan', '$nama_gambar')") or die(mysql_error());
				?>
				<script type="text/javascript">
				alert("tambah produk baru, berhasil!");
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
	?>
</fieldset>