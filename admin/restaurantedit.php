<!doctype html>
<html>
<?php include "INCLUDE/head.php"?>    
    <body class="sb-nav-fixed">
        <?php include "INCLUDE/menunav.php"?>
        <div id="layoutSidenav">
            <?php include "INCLUDE/menu.php"?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Restaurant</h1>
    <?php
        include "include/config.php";
        if(isset($_POST["Simpan"])){
            $restaurantKODE = $_POST["koderestaurant"];
            $restaurantNAMA = $_POST["namarestaurant"];
            $restaurantALAMAT = $_POST["alamatrestaurant"];
            $destinasiKODE = $_POST["kodedestinasi"];

            $namafile = $_FILES['file']['name'];
            $file_tmp = $_FILES["file"]["tmp_name"];

            $ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

            // PERIKSA EKSTEN FILE HARUS JPG ATAU jpg
            if(($ekstensifile == "jpg") or ($ekstensifile == "JPG"))
            {
                move_uploaded_file($file_tmp, 'images/'.$namafile); //unggah file ke folder images
                mysqli_query($connection, "update restaurant set restaurantKODE = '$restaurantKODE', restaurantNAMA='$restaurantNAMA', restaurantALAMAT='$restaurantALAMAT',
                restaurantFOTO='$namafile', destinasiKODE='$destinasiKODE' WHERE restaurantKODE = '$restaurantKODE'");
            }

            mysqli_query($connection, "update restaurant set restaurantKODE = '$restaurantKODE', restaurantNAMA='$restaurantNAMA', restaurantALAMAT='$restaurantALAMAT',
            destinasiKODE='$destinasiKODE' WHERE restaurantKODE = '$restaurantKODE'");

            echo "<script>document.location='restaurant.php'</script>";
        }
        $datadestinasi = mysqli_query($connection,"select * from destinasi");

        //Menerima kiriman data dari restaurant.php
        $koderestaurant = $_GET['edit'];
        $editrestaurant = mysqli_query($connection, "select * from restaurant where restaurantKODE = '$koderestaurant'");
        $rowedit = mysqli_fetch_array($editrestaurant);

        $editKATEGORI = mysqli_query($connection, "select * from restaurant, destinasi where restaurantKODE= '$koderestaurant' and restaurant.destinasiKODE = destinasi.destinasiKODE");

        $rowedit2 = mysqli_fetch_array($editKATEGORI);
    ?>


    <head>
        <title>Restaurant</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    </head>

    <body>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="koderestaurant" class="col-sm-2 col-form-label">Kode Restaurant</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="koderestaurant" id="koderestaurant" placeholder="Kode Restaurant" maxlength="4"
                            value="<?php echo $rowedit["restaurantKODE"]?>" readonly>
                        </div>
                    </div>
                
                    <div class="mb-3 row"> <!-- 3 spasi / baris ke bawah (margin bottom), mt (margin top)-->
                        <label for="namarestaurant" class="col-sm-2 col-form-label">Nama Restaurant</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="namarestaurant" id="namarestaurant" placeholder="Nama Restaurant"
                            value="<?php echo $rowedit["restaurantNAMA"]?>">
                        </div>
                    </div>

                    <div class="mb-3 row"> <!-- 3 spasi / baris ke bawah (margin bottom), mt (margin top)-->
                        <label for="alamatrestaurant" class="col-sm-2 col-form-label">Alamat Restaurant</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamatrestaurant" id="alamatrestaurant" placeholder="Alamat Restaurant"
                            value="<?php echo $rowedit["restaurantALAMAT"]?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="kodedestinasi" class="col-sm-2 col-form-label">Kode Destinasi</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="kodedestinasi" name="kodedestinasi">
                            <option value="<?php echo $rowedit["destinasiKODE"]?>">
                                <?php echo $rowedit["destinasiKODE"]?>
                                <?php echo $rowedit2["destinasiNAMA"]?>
                            </option>
                                <?php while($row = mysqli_fetch_array($datadestinasi)){?>
                                <option value="<?php echo $row["destinasiKODE"]?>">
                                    <?php echo $row["destinasiKODE"]?>
                                    <?php echo $row["destinasiNAMA"]?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="file" class="col-sm-2 col-form-label">Foto Restaurant</label>
                        <div class="col-sm-10">
                            <input type="file" id="file" name="file">
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
                    <h2 class="display-5">Hasil Entri Data Restaurant</h2>
                </div>

                <!--untuk membuat pencarian data-->
                <form method="POST">
                    <div class="form-group row mb-2">
                        <label for="Search" class="col-sm-3">Nama Restaurant</label>
                        <div class="col-sm-6">
                            <input type="text" name="Search" class="form-control" id="Search"
                            value="<?php if(isset($_POST["Search"])){echo $_POST["Search"];
                            }?>" placeholder="Nama Restaurant">
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
                        <th scope="col">Kode Restaurant</th>
                        <th scope="col">Nama Restaurant</th>
                        <th scope="col">Alamat Restaurant</th>
                        <th scope="col">Foto Restaurant</th>
                        <th scope="col">Kode Destinasi</th>
                        <th colspan="2" style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if(isset($_POST["kirim"])){
                                $Search = $_POST["Search"];
                                $query = mysqli_query($connection, "select * from restaurant where restaurantNAMA like'%".$Search."%';");
                            } else{
                                $query = mysqli_query($connection, "select * from restaurant;");
                                
                            }
                            $nomor = 1;
                            
                            while($row = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td>
                                <?php echo $nomor;?>
                            </td>
                            <td><?php echo $row['restaurantKODE']; ?></td>
                            <td><?php echo $row['restaurantNAMA']; ?></td>
                            <td><?php echo $row['restaurantALAMAT']; ?></td>
                            <td><?php if(is_file("images/".$row['restaurantFOTO']))
                                { ?>
                                    <img src="images/<?php echo $row['restaurantFOTO']?>" width="80">
                                <?php } else
                                    echo "<img src='images/noimage.png' width='80'>"
                                ?></td>
                            <td><?php echo $row['destinasiKODE']; ?></td>

                            <td width="5px">
                                <a href="restaurantedit.php?edit=<?php echo $row["restaurantKODE"] ?>" class="btn btn-success btn-sm" title="EDIT">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </td>
                            <td width="5px">
                                <a href="restauranthapus.php?hapus=<?php echo $row["restaurantKODE"] ?>" class="btn btn-danger btn-sm" title="HAPUS">
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