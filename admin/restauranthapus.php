<?php
	include "include/config.php";
	if(isset($_GET['hapus']))
	{
		$koderestaurant = $_GET['hapus'];
		mysqli_query($connection, "delete from restaurant where restaurantKODE = '$koderestaurant'");
		echo "<script>alert('DATA BERHASIL DIHAPUS');
			document.location='restaurant.php'</script>";
	}
?>