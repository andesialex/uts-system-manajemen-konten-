<fieldset>
	<legend>tampil produk</legend>

<div style="margin-bottom:15px;" align="right">
	<form action ="" method="post">
		<input type="text" name="inputan_pencarian" placeholder="masukan nama produk..." style="width:200px; padding:5px;" />
		<input type="submit" name="cari_produk" value="cari" style="padding:3px;" />
	</form>
</div>

	<table width="100%" border="1px" style="border-collapse:collapse;">
		<tr style="background-color:#fc0;">
			<th>kode produk</th>
			<th>nama produk</th>
			<th>lokasi</th>
			<th>no hp</th>
			<th>harga</th>
			<th>ketersediaan</th>
			<th>gambar</th>
			<th>opsi</th>			
		</tr>
		<?php
		$inputan_pencarian = @$_POST['inputan_pencarian'];
		$cari_produk = @$_POST['cari_produk'];
		if($cari_produk){
			if($inputan_pencarian != ""){
				$sql = mysqli_query($conn,"select * from tb_produk where nama_produk like '%$inputan_pencarian%' or type like '%$inputan_pencarian%'") or die (mysql_error());
			} else {
				$sql = mysqli_query($coon,"select * from tb_produk") or die (mysql_error());
			}
		} else {
			$sql = mysqli_query($conn,"select * from tb_produk") or die (mysql_error());			
		}
			while($data = mysqli_fetch_array($sql)){
			?>
				<tr>
					<td><?php echo $data['kode_produk']; ?></td>
					<td><?php echo $data['nama_produk']; ?></td>
					<td><?php echo $data['lokasi']; ?></td>
					<td><?php echo $data['nope_petani']; ?></td>
					<td><?php echo $data['harga']; ?></td>
					<td><?php echo $data['ketersediaan']; ?></td>
					<td align="center"><img src="img/<?php echo $data['gambar_produk']; ?>" width="100px" /></td>		
					<td align="center">
						<a href="?page=produk&action=edit&kdproduk=<?php echo $data['kode_produk']; ?>"><button>Edit</button></a> 
						<a onclick="return confirm('Yakin Ingin menghapus data?')" href="?page=produk&action=hapus&kdproduk=<?php echo $data['kode_produk']; ?>"><button>Hapus</button></a>
					</td>
				</tr>
			<?php
			}
		?>
	</table>

</fieldset>