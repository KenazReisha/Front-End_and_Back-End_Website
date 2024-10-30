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
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Wisata</title>
  </head>
  <body>
  <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">

            <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Daftar Kategori Wisata</h1>
                    </div>
                </div>

                <!--untuk membuat pencarian data-->
                <form method="POST">
                    <div class="form-group row mb-2">
                        <label for="Search" class="col-sm-3">Nama Kategori</label>
                        <div class="col-sm-6">
                            <input type="text" name="Search" class="form-control" id="Search"
                            value="<?php if(isset($_POST["Search"])){echo $_POST["Search"];
                            }?>" placeholder="Nama kategori">
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $jumlahtampilan = 3;
                            $halaman = (isset($_GET['page']))? $_GET['page'] : 1;
                            $mulaitampilan = ($halaman - 1) * $jumlahtampilan;

                            if(isset($_POST["kirim"])){
                                $Search = $_POST["Search"];
                                $query = mysqli_query($connection, "select * from kategoriwisata where kategoriNAMA like'%".$Search."%';;");
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
            </div> <!-- penutup dari class-row-sm-10-->
        </div> <!-- penutup dari row -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  </body>
  </main>
                <?php include "INCLUDE/footer.php"?>
            </div>
        </div>
		<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <?php include "INCLUDE/jsscript.php"?>
</html>