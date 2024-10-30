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
	if(isset($_POST['Simpan']))
	{
		$travelKODE = $_POST['inputkode'];
		$travelNAMA = $_POST['inputnama'];
        $travelRUTE = $_POST['inputrute'];
		$kodedestinasi = $_POST['kodedestinasi'];

		$namafile = $_FILES['file']['name'];
		$file_tmp = $_FILES["file"]["tmp_name"];

		$ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

		// PERIKSA EKSTEN FILE HARUS JPG ATAU jpg
		if(($ekstensifile == "jpg") or ($ekstensifile == "JPG"))
		{
			move_uploaded_file($file_tmp, 'images/'.$namafile); //unggah file ke folder images
		}
        mysqli_query($connection, "insert into travel value ('$travelKODE', '$travelNAMA', '$travelRUTE', '$namafile',
            '$kodedestinasi')");

	}

	$datadestinasi = mysqli_query($connection, "select * from destinasi");
?>


<body>

<div class="row">
<div class="col-sm-1"></div>

<div class="col-sm-10">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Input Data Travel</h1>
		</div>
	</div>

	<form method="POST" enctype="multipart/form-data">
		<div class="mb-3 row">
			<label for="kodetravel" class="col-sm-2 col-form-label">Kode Travel</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="kodetravel" name="inputkode" placeholder="Kode Travel" maxlength="4">
			</div>
		</div>

		<div class="mb-3 row">
			<label for="namatravel" class="col-sm-2 col-form-label">Nama Travel</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="namatravel" name="inputnama" placeholder="Nama Travel">
			</div>
		</div>

        <div class="mb-3 row">
			<label for="rutetravel" class="col-sm-2 col-form-label">Rute Travel</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="rutetravel" name="inputrute" placeholder="Rute Travel">
			</div>
		</div>

		<div class="mb-3 row">
			<label for="namadestinasi" class="col-sm-2 col-form-label">Kode Destinasi</label>
			<div class="col-sm-10">
			<select class="form-control" id="namadestinasi" name="kodedestinasi">
				<?php while($row = mysqli_fetch_array($datadestinasi))
				{ ?>
					<option value="<?php echo $row["destinasiKODE"]?>">
						<?php echo $row["destinasiKODE"]?>
						<?php echo $row["destinasiNAMA"]?>
					</option>
				<?php } ?>				

			</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="file" class="col-sm-2 col-form-label">Foto Kendaraan Travel</label>
			<div class="col-sm-10">
				<input type="file" id="file" name="file">
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<input type="submit" name="Simpan" class="btn btn-primary" value="Simpan">
				<input type="submit" name="Batal" class="btn btn-secondary" value="Batal">
			</div>	
		</div>
	</form>

</div>

<div class="col-sm-1"></div>
</div>

<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">Hasil Entri Data Travel</h1>
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
                <th>Kode Destinasi</th>
				<th colspan="2" style="text-align: center">Action</th>
			</tr>			
		</thead>

		<tbody>
			<?php 
			$jumlahtampilan = 3;
			$halaman = (isset($_GET['page']))? $_GET['page'] : 1;
			$mulaitampilan = ($halaman - 1) * $jumlahtampilan;

                            if(isset($_POST["kodetravel"])){
                                $Search = $_POST["Search"];
                                $query = mysqli_query($connection, "select * from travel where travelNAMA like'%".$Search."%';");
                            }
                            else{
                                $query = mysqli_query($connection, "select * from travel
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

                    <td><?php echo $row['destinasiKODE'];?></td>

					<td>
						<a href="traveledit.php?edit=<?php echo $row['travelKODE']?>" class="btn btn-success btn-sm" title="EDIT">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
						</a>
					</td>

					<td>
						<a href="travelhapus.php?hapus=<?php echo $row['travelKODE']?>" class="btn btn-danger btn-sm" title="DELETE">
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
						</a>
						
					</td>
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

	
</div>


</body>
</main>
                <?php include "INCLUDE/footer.php"?>
            </div>
        </div>
        <?php include "INCLUDE/jsscript.php"?>
</html>