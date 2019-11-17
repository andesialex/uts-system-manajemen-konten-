<?php
$kdinformasi = @$_GET['kdinformasi'];

mysqli_query($conn,"delete from tb_informasi where id = '$kdinformasi'") or die (mysql_error());
?>

<script type="text/javascript">
	window.location.href="?page=informasi";
</script>