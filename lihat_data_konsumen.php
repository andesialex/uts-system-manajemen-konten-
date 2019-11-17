<fieldset>
	<legend>tampil data user</legend>

<div style="margin-bottom:15px;" align="right">
	<form action ="" method="post">
		<input type="text" name="inputan_pencarian" placeholder="masukan nama informasi..." style="width:200px; padding:5px;" />
		<input type="submit" name="cari_informasi" value="cari" style="padding:3px;" />
	</form>
</div>

	<table width="100%" border="1px" style="border-collapse:collapse;">
		<tr style="background-color:#fc0;">
			<th>nama lengkap</th>
			<th>jenis kelamin</th>
			<th>alamat</th>		
		</tr>
		<?php
		$inputan_pencarian = @$_POST['inputan_pencarian'];
		$cari_informasi = @$_POST['cari_informasi'];
				$login = @$_POST['print'];
		if($cari_informasi){
			if($inputan_pencarian != ""){
				$sql = mysqli_query($conn,"select * from tb_login where judul like '%$inputan_pencarian%' or type like '%inputan_pencarian%'") or die (mysql_error());
			} else {
				$sql = mysqli_query($conn,"select * from tb_login") or die (mysql_error());
			}
		} else {
			$sql = mysqli_query($conn,"select * from tb_login") or die (mysql_error());			
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
					<td align="center"><?php echo $data['nama_lengkap']; ?></td>
					<td align="center"><?php echo $data['jenis_kelamin']; ?></td>
					<td align="center"><?php echo $data['alamat']; ?></td>
				</tr>
			<?php
			}
		}
		?>
	</table>

	<div style="padding-top:10px;">
		<a href="laporan/cetak.php" target="_blank"><button>cetak</button></a>
	<div/>		
</fieldset>