<!doctype html>
<?php include "INCLUDE/head.php"?>    
    <body class="sb-nav-fixed">
        <?php include "INCLUDE/menunav.php"?>
        <div id="layoutSidenav">
            <?php include "INCLUDE/menu.php"?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Berita</h1>
<?php
    include "include/config.php";
    if(isset($_POST["Simpan"])){
        $beritaKODE = $_POST["kodeberita"];
        $beritaNAMA = $_POST["namaberita"];
        $beritaKET = $_POST["keteranganberita"];
        $kategoriKODE = $_POST["kodekategori"];

        mysqli_query($connection, "update berita set beritaKODE='$beritaKODE', beritaNAMA='$beritaNAMA',
		beritaKET='$beritaKET', kategoriKODE='$kategoriKODE' WHERE beritaKODE='$beritaKODE'");

        echo "<script>document.location='berita.php'</script>";
    }

    $datakategori = mysqli_query($connection,"select * from kategoriwisata");

    //Menerima kiriman data dari berita.php
    $kodekategori = $_GET['edit'];
    $editkategori = mysqli_query($connection, "select * from berita where beritaKODE = '$kodekategori'");
    $rowedit = mysqli_fetch_array($editkategori);

    $editKATEGORI = mysqli_query($connection, "select * from berita, kategoriwisata where beritaKODE= '$kodekategori' and berita.kategoriKODE = kategoriwisata.kategoriKODE");

    $rowedit2 = mysqli_fetch_array($editKATEGORI);
?>

<html>
    <head>
        <title>Berita</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    </head>

    <body>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <form method="POST">
                    <div class="mb-3 row">
                        <label for="kodeberita" class="col-sm-2 col-form-label">Kode Berita</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kodeberita" id="kodeberita" placeholder="Kode Berita"
                            value="<?php echo $rowedit["beritaKODE"]?>" readonly>
                        </div>
                    </div>
                
                    <div class="mb-3 row"> <!-- 3 spasi / baris ke bawah (margin bottom), mt (margin top)-->
                        <label for="namaberita" class="col-sm-2 col-form-label">Nama Berita</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="namaberita" id="namaberita" placeholder="Nama Berita"
                            value="<?php echo $rowedit["beritaNAMA"]?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="keteranganberita" class="col-sm-2 col-form-label">Keterangan Berita</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="keteranganberita" id="keteranganberita" placeholder="Keterangan Berita"
                            value="<?php echo $rowedit["beritaKET"]?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="kodekategori" class="col-sm-2 col-form-label">Kode Kategori</label>
                        <div class="col-sm-10">
                        <select class="form-control" id="kodekategori" name="kodekategori">
                        <option value="<?php echo $rowedit["kategoriKODE"]?>">
                                <?php echo $rowedit["kategoriKODE"]?>
                                <?php echo $rowedit2["kategoriNAMA"]?>
                            </option>
                                <?php while($row = mysqli_fetch_array($datakategori)){?>
                                <option value="<?php echo $row["kategoriKODE"]?>">
                                    <?php echo $row["kategoriKODE"]?>
                                    <?php echo $row["kategoriNAMA"]?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success" value="Simpan" name="Simpan">Edit</button>
                            <button type="reset" class="btn btn-secondary">Batal</button>
                        </div>
                    </div>
                </form>

                <div class="jumbotron mt-5">
                    <h2 class="display-5">Hasil Entri Data Berita</h2>
                </div>

                <!--untuk membuat pencarian data-->
                <form method="POST">
                    <div class="form-group row mb-2">
                        <label for="Search" class="col-sm-3">Nama Berita</label>
                        <div class="col-sm-6">
                            <input type="text" name="Search" class="form-control" id="Search"
                            value="<?php if(isset($_POST["Search"])){echo $_POST["Search"];
                            }?>" placeholder="Nama Berita">
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
                        <th scope="col">Kode Berita</th>
                        <th scope="col">Nama Berita</th>
                        <th scope="col">Keterangan Berita</th>
                        <th scope="col">Kode Kategori</th>
                        <th colspan="2" style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                            if(isset($_POST["kirim"])){
                                $Search = $_POST["Search"];
                                $query = mysqli_query($connection, "select * from berita where beritaNAMA like'%".$Search."%';");
                            } 
                            else{
                                $query = mysqli_query($connection, "select * from berita;");
                                
                            }
                            $nomor = 1;
                            
                            while($row = mysqli_fetch_array($query)){

                        ?>
                        <tr>
                            <td>
                                <?php echo $nomor;?>
                            </td>
                            <td><?php echo $row['beritaKODE']; ?></td>
                            <td><?php echo $row['beritaNAMA']; ?></td>
                            <td><?php echo $row['beritaKET']; ?></td>
                            <td><?php echo $row['kategoriKODE']; ?></td>
                            <td width="5px">
                                <a href="beritaedit.php?edit=<?php echo $row["beritaKODE"] ?>" class="btn btn-success btn-sm" title="EDIT">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </td>
                            <td>
                                <a href="beritahapus.php?hapus=<?php echo $row["beritaKODE"] ?>" class="btn btn-danger btn-sm" title="HAPUS">
                                <i class="bi bi-trash3"></i>
                            </td>
                            <?php 
                                $nomor += 1;
                        
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- penutup dari class-row-sm-10-->
        </div> <!-- penutup dari row -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    </body>
                </main>
                <?php include "INCLUDE/footer.php"?>
            </div>
        </div>
        <?php include "INCLUDE/jsscript.php"?>
    </body>
</html>