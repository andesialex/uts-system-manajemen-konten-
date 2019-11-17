<?php
$kdproduk = @$_GET['kdproduk'];

mysqli_query($conn,"delete from tb_produk where kode_produk = '$kdproduk'") or die (mysql_error());
?>

<script type="text/javascript">
	window.location.href="?page=produk";
</script>