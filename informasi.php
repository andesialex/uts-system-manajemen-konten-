<fieldset>
	<legend>tampil informasi</legend>

<div style="margin-bottom:15px;" align="right">
	<form action ="" method="post">
		<input type="text" name="inputan_pencarian" placeholder="masukan nama informasi..." style="width:200px; padding:5px;" />
		<input type="submit" name="cari_informasi" value="cari" style="padding:3px;" />
	</form>
</div>

	<table width="100%" border="3px" style="border-collapse:collapse;">
		<tr style="background-color:#fc0;">
			<th>judul</th>
			<th>gambar</th>
			<th>deskripsi</th>
			<th>opsi</th>	
		</tr>
		<?php
		$inputan_pencarian = @$_POST['inputan_pencarian'];
		$cari_informasi = @$_POST['cari_informasi'];
		if($cari_informasi){
			if($inputan_pencarian != ""){
				$sql = mysqli_query($conn,"select * from tb_informasi where judul like '%$inputan_pencarian%' or type like '%inputan_pencarian%'") or die (mysqli_error());
			} else {
				$sql = mysqli_query($conn,"select * from tb_informasi order by id desc") or die (mysql_error());
			}
		} else {
			$sql = mysqli_query($conn,"select * from tb_informasi order by id desc") or die (mysql_error());			
		}

		$cek = mysqli_num_rows($sql);
		if($cek < 1){
			?>
			<tr>
				<td colspan="7" align="center" style="padding:10px;">Data Tidak ditemukan!!</td>
			</tr>
			<?php
		} else { 
			while($data = mysqli_fetch_array($sql)){
			?>
				<tr>
					<td><?php echo $data['judul']; ?></td>
					<td align="center"><img src="img/<?php echo $data['gambar']; ?>" width="100px" /></td>	
					<td><?php echo $data['deskripsi']; ?></td>
					<td align="center">
						<a href="?page=informasi&action=edit&kdinformasi=<?php echo $data['id']; ?>"><button>Edit</button></a> 
						<a onclick="return confirm('Yakin Ingin menghapus data?')" href="?page=informasi&action=hapus&kdinformasi=<?php echo $data['id']; ?>"><button>Hapus</button></a>
					</td>
				</tr>
			<?php
			}
		}
		?>
	</table>

</fieldset>