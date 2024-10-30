<?php
	include "include/config.php";
	if(isset($_GET['hapus']))
	{
		$kodemusik = $_GET['hapus'];
		mysqli_query($connection, "delete from musik where musikKODE = '$kodemusik'");
		echo "<script>alert('DATA BERHASIL DIHAPUS');
			document.location='musik.php'</script>";
	}
?>