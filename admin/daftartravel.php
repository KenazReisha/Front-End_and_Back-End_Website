<!DOCTYPE html>
<html lang="en">
<?php include "INCLUDE/head.php"?>    
    <body class="sb-nav-fixed">
        <?php include "INCLUDE/menunav.php"?>
        <div id="layoutSidenav">
            <?php include "INCLUDE/menu.php"?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Travel</h1>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Travel</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

<?php 
	include "include/config.php";
	$datadestinasi = mysqli_query($connection, "select * from destinasi");
?>


<body>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">Daftar Data Travel</h1>
			</div>
		</div>

		<form method="POST"> <!--pencarian nama travel-->
            <div class="mb-3 row">
                <label for="Search" class="col-sm-2 col-form-label">Nama Travel</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="Search" id="Search" placeholder="Nama Travel"
                    value="<?php if(isset($_POST["Search"])){echo $_POST["Search"];
                    }?>">
                </div>
                <input type="submit" class="col-sm-1 btn btn-primary" value="Search" name="kodetravel">
            </div>
        </form>


	<table class="table table-dark table-striped">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>Kode Travel</th>
				<th>Nama Travel</th>
				<th>Rute Travel</th>
				<th>Foto Kendaraan Travel</th>
                <th>Tempat Destinasi</th>
			</tr>			
		</thead>

		<tbody>
            <?php 
			$jumlahtampilan = 3;
			$halaman = (isset($_GET['page']))? $_GET['page'] : 1;
			$mulaitampilan = ($halaman - 1) * $jumlahtampilan;

            if(isset($_POST["kodetravel"])){
                $Search = $_POST["Search"];
                $query = mysqli_query($connection, "select * from travel, destinasi where travel.destinasikode = destinasi.destinasikode AND travelNAMA like'%".$Search."%';");
            }
            else{
                $query = mysqli_query($connection, "select * from travel, destinasi where travel.destinasikode = destinasi.destinasikode
				limit $mulaitampilan, $jumlahtampilan;");
                
            }
            $nomor = 1;
            
            while($row = mysqli_fetch_array($query)){ ?>
				<tr>
					<td><?php echo $mulaitampilan + $nomor;?></td>
					<td><?php echo $row['travelKODE'];?></td>
					<td><?php echo $row['travelNAMA'];?></td>
					<td><?php echo $row['travelRUTE'];?></td>
					<td>
						<?php if(is_file("images/".$row['travelKENDARAAN']))
						{ ?>
							<img src="images/<?php echo $row['travelKENDARAAN']?>" width="80">
						<?php } else
							echo "<img src='images/noimage.png' width='80'>"
						?>
					</td>

                    <td><?php echo $row['destinasiNAMA'];?></td>
				</tr>
			<?php $nomor = $nomor + 1;?>
			<?php }	?>
		</tbody>
		
	</table>
					<!--pagination-->
					<?php 
                        $query = mysqli_query($connection, "SELECT * FROM travel");
                        $jumlahrecord = mysqli_num_rows($query);
                        $jumlahpage = ceil($jumlahrecord / $jumlahtampilan);
                    ?>

                    <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="?page=<?php $nomorhal=1;
                        echo $nomorhal?>">Previous</a></li>
                        <?php for($nomorhal=1; $nomorhal<=$jumlahpage; $nomorhal++){ ?>

                        <li class="page-item">
                            <?php if($nomorhal!=$halaman) {?>
                                <a class="page-link" href="?page=<?php echo $nomorhal ?>"><?php echo $nomorhal ?></a>
                            <?php } else{ ?>
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="?page=<?php echo $nomorhal;?>"><?php echo $nomorhal ?></a>
                                </li>
                            <?php } ?>
                        </li>
                        <?php } ?>

                        <li class="page-item"><a class="page-link" href="?page=<?php echo $nomorhal - 1; ?>">Next</a></li>
                    </ul>
                    </nav>
	</div>

	<div class="col-sm-1"></div>
</body>
</main>
                <?php include "INCLUDE/footer.php"?>
            </div>
        </div>
        <?php include "INCLUDE/jsscript.php"?>
</html>