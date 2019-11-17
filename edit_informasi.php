<fieldset>
	<legend>Edit Data</legend>

	<?php
	$kdinformasi = @$_GET['kdinformasi'];
	$sql = mysqli_query($conn,"select * from tb_informasi where id = '$kdinformasi'") or die (mysql_error());
	$data = mysqli_fetch_array($sql);
	?>

	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Id</td>
				<td> : </td>
				<td><input type="text" name="id" value="<?php echo $data['id']; ?>" disabled="disabled" /></td>
			</tr>
			<tr>
				<td>Judul</td>
				<td> : </td>
				<td><input type="text" name="judul" value="<?php echo $data['judul']; ?>" /></td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td>: </td>
				<td><input type="file" name="gambar" value="<?php echo $data['gambar']; ?>"/></td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td> : </td>
				<td><input type="text" name="deskripsi" value="<?php echo $data['deskripsi']; ?>" /></td>
			</tr>
			<tr>
				<td></td>
				<td> : </td>
				<td><input type="submit" name="edit" value="Edit"/> <input type="submit" name="batal" value="Batal" /></td>
			</tr>
		</table>
	</form>

	<?php
		
		$judul = @$_POST['judul'];
		$nama_gambar = @$_FILES['gambar']['name'];
		$deskripsi = @$_POST['deskripsi'];

		$asal = @$_FILES['gambar_produk']['tmp_name'];
		$target = 'img/';

		$edit_produk = @$_POST['edit'];

	if($edit_produk){
		if($judul== "" || $nama_gambar=="" || $deskripsi==""){
			?>
			<script type="text/javascript">
			alert("Inputan tidak boleh ada yang kosong");
			</script>
			<?php	
		} else {
			if ($nama_gambar ==""){
					mysqli_query($conn,"update tb_informasi set judul='$judul',  gambar='$nama_gambar', deskripsi='$deskripsi' where id = '$kdinformasi'") or die (mysql_error());
					?>
					<script type="text/javascript">
					alert("data berhasil di edit");
					window.location.href="?page=informasi";
					</script>
					<?php
			} else {
				$pindah = move_uploaded_file($asal, $target.$nama_gambar);
				if($pindah){
					mysqli_query($conn,"update tb_informasi set judul='$judul',  gambar='$nama_gambar', deskripsi='$deskripsi' where id = '$kdinformasi'") or die (mysql_error());
					?>
					<script type="text/javascript">
					alert("Data berhasil di edit");
					window.location.href="?page=informasi";
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


