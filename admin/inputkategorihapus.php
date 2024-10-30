<?php
	include "include/config.php";
	if(isset($_GET['hapus']))
	{
		$kodekategori = $_GET['hapus'];
		mysqli_query($connection, "delete from kategoriwisata where kategoriKODE = '$kodekategori'");
		echo "<script>alert('DATA BERHASIL DIHAPUS');
			document.location='inputkategori.php'</script>";
	}
?>