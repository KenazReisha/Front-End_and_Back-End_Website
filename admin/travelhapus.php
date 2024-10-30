<?php
	include "include/config.php";
	if(isset($_GET['hapus']))
	{
		$kodetravel = $_GET['hapus'];
		mysqli_query($connection, "delete from travel where travelKODE = '$kodetravel'");
		echo "<script>alert('DATA BERHASIL DIHAPUS');
			document.location='travel.php'</script>";
	}
?>