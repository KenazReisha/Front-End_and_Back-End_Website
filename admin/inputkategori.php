<!doctype html>
<?php include "INCLUDE/head.php"?>    
    <body class="sb-nav-fixed">
        <?php include "INCLUDE/menunav.php"?>
        <div id="layoutSidenav">
            <?php include "INCLUDE/menu.php"?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Kategori Wisata</h1>
<?php
	include "include/config.php";
	if(isset($_POST["Simpan"])){
		$kategoriKODE = $_POST["inputKategoriKode"];
		$kategoriNAMA = $_POST["inputKategoriNama"];
		$kategoriKET = $_POST["inputKategoriKet"];
		$kategoriREFERENCE = $_POST["inputKategoriReference"];
		
		mysqli_query($connection, "insert into kategoriwisata values('$kategoriKODE', '$kategoriNAMA',
		'$kategoriKET', '$kategoriREFERENCE')");
		//header("location:inputkategori.php"); //biar balik ke tampilan yang semula setelah isi
	}
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <title>Wisata</title>
  </head>
  <body>
	<!-- ini bagian kerja saya-->
	<div class="col-sm-2"></div>
	<div class="col-sm-10">
	<form method="POST">
		<div class="form-group row">
			<label for="kategorikode" class="col-sm-2 col-form-label">Kategori Kode</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="kategorikode" name="inputKategoriKode" placeholder="Inputkan kode kategori">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="kategoriNAMA" class="col-sm-2 col-form-label">Kategori Nama</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="kategoriNAMA" name="inputKategoriNama" placeholder="Inputkan nama kategori">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="kategoriKET" class="col-sm-2 col-form-label">Kategori Keterangan</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="kategoriKET" name="inputKategoriKet" placeholder="Inputkan keterangan kategori">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="kategoriREFERENCE" class="col-sm-2 col-form-label">Referensi Kategori</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="kategoriREFERENCE" name="inputKategoriReference" placeholder="Inputkan referensi kategori">
			</div>
		</div>
		<div class="col-sm-3"></div>
		<div class="col-sm-7">
			<button type="reset" class="btn btn-secondary">Batal</button>
			<button type="submit" class="btn btn-success" value="Simpan" name="Simpan">Simpan</button>
		</div>
	</form>

	<div class="jumbotron mt-5">
                    <h2 class="display-5">Hasil Entri Data Kategori Wisata</h2>
                </div>

                <!--untuk membuat pencarian data-->
                <form method="POST">
                    <div class="form-group row mb-2">
                        <label for="Search" class="col-sm-3">Nama Kategori</label>
                        <div class="col-sm-6">
                            <input type="text" name="Search" class="form-control" id="Search"
                            value="<?php if(isset($_POST["Search"])){echo $_POST["Search"];
                            }?>" placeholder="Nama Kategori">
                        </div>
                        <input type="submit" name="kirim" class="col-sm-1 btn-primary" value="Search">
                    </div>
                </form>

                <!--end untuk pencarian data-->

                <br>
                
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Kategori</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Keterangan Kategori</th>
						<th scope="col">Referensi Kategori</th>
						<th colspan="2" style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $jumlahtampilan = 3;
                            $halaman = (isset($_GET['page']))? $_GET['page'] : 1;
                            $mulaitampilan = ($halaman - 1) * $jumlahtampilan;


                            if(isset($_POST["kirim"])){
                                $Search = $_POST["Search"];
                                $query = mysqli_query($connection, "select * from kategoriwisata where kategoriNAMA like'%".$Search."%';");
                            } else{
                                $query = mysqli_query($connection, "select * from kategoriwisata
                                limit $mulaitampilan, $jumlahtampilan;");
                                
                            }
                            $nomor = 1;
                            
                            while($row = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td>
                                <?php echo $mulaitampilan + $nomor;?>
                            </td>
                            <td><?php echo $row['kategoriKODE']; ?></td>
                            <td><?php echo $row['kategoriNAMA']; ?></td>
                            <td><?php echo $row['kategoriKET']; ?></td>
							<td><?php echo $row['kategoriREFERENCE']; ?></td>

							<td width="5px">
                                <a href="inputkategoriedit.php?ubah=<?php echo $row["kategoriKODE"] ?>" class="btn btn-success btn-sm" title="EDIT">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </td>
                            <td width="5px">
                                <a href="inputkategorihapus.php?hapus=<?php echo $row["kategoriKODE"] ?>" class="btn btn-danger btn-sm" title="HAPUS">
                                <i class="bi bi-trash3"></i>
                            </td>
                            <?php 
                                $nomor += 1;
                        
                                }
                            ?>
                            
                        </tr>
                    </tbody>
                </table>
            <!--pagination-->
            <?php 
                $query = mysqli_query($connection, "SELECT * FROM kategoriwisata");
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
	<!-- end kerja saya -->
  </body>
  </main>
                <?php include "INCLUDE/footer.php"?>
            </div>
        </div>
		<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <?php include "INCLUDE/jsscript.php"?>
</html>