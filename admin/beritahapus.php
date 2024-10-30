<?php
	include "include/config.php";
	if(isset($_GET['hapus']))
	{
		$kodeberita = $_GET['hapus'];
		mysqli_query($connection, "delete from berita where beritaKODE = '$kodeberita'");
		echo "<script>alert('DATA BERHASIL DIHAPUS');
			document.location='berita.php'</script>";
	}
?>