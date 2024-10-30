<!DOCTYPE html>
<html>
<!--tambahin ini-->
<?php
include "admin/include/config.php";
$kategoridropdown = mysqli_query($connection, "select * from kategoriwisata");
$beritadropdown = mysqli_query($connection, "select * from berita");
$traveldropdown = mysqli_query($connection, "select * from travel");
$musikdropdown = mysqli_query($connection, "select * from musik");

$sql3 = mysqli_query($connection, "select * from hotel");
$jumlah3 = mysqli_num_rows($sql3);

$sql4 = mysqli_query($connection, "select * from oleholeh");
$jumlah4 = mysqli_num_rows($sql4);

$sql5 = mysqli_query($connection, "select * from restaurant");
$jumlah5 = mysqli_num_rows($sql5);

if (isset($_POST["Simpan"])) {
    $saranKODE = $_POST["inputkode"];
    $saranNAMA = $_POST["inputnama"];
    $saranEMAIL = $_POST["inputemail"];
    $saranKOMENTAR = $_POST["inputkomen"];

    mysqli_query($connection, "insert into saran values('$saranKODE', '$saranNAMA',
		'$saranEMAIL', '$saranKOMENTAR')");
    header("location:index.php"); //biar balik ke tampilan yang semula setelah isi
}

?>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="admin/css/footer.css">
    <link rel="stylesheet" type="text/css" href="admin/css/author.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <!-- menu, sampai sebelum jelajahi lebih lanjut -->
    <div class="background" style="background: #808e9b">
        <div class="container-fluid" style="width: 1200px; background: white;">
            <!-- nav bar-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#" style="font-family: Lucida Handwriting;">Pesona Indonesia</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <!-- Drop Down 1 -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Kategori Wisata
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php
                                    if (mysqli_num_rows($kategoridropdown) > 0) {
                                        while ($row = mysqli_fetch_array($kategoridropdown)) { ?>
                                            <li><a class="dropdown-item" href="#"><?php echo $row["kategoriNAMA"]; ?></a></li>
                                    <?php }
                                    }
                                    ?>
                                </ul>
                            </li>

                            <!-- Drop Down 2 -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Berita
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php
                                    if (mysqli_num_rows($beritadropdown) > 0) {
                                        while ($row = mysqli_fetch_array($beritadropdown)) { ?>
                                            <li><a class="dropdown-item" href="#"><?php echo $row["beritaNAMA"]; ?></a></li>
                                    <?php }
                                    }
                                    ?>
                                </ul>
                            </li>

                            <!-- Drop Down 3 -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Travel
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php
                                    if (mysqli_num_rows($traveldropdown) > 0) {
                                        while ($row = mysqli_fetch_array($traveldropdown)) { ?>
                                            <li><a class="dropdown-item" href="#"><?php echo $row["travelNAMA"] ?></a></li>
                                    <?php }
                                    }
                                    ?>
                                </ul>
                            </li>
                            <!-- Drop Down 4 -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Alat Musik
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php
                                    if (mysqli_num_rows($musikdropdown) > 0) {
                                        while ($row = mysqli_fetch_array($musikdropdown)) { ?>
                                            <li><a class="dropdown-item" href="#"><?php echo $row["musikNAMA"]; ?></a></li>
                                    <?php }
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> <!--end nav-->

            <!--image slide-->
            <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="admin/images/lombok2.png" class="d-block w-100" alt="Foto tidak ada">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Lombok</h5>
                            <p>Pemandangan Lombok</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="admin/images/palembang2.png" class="d-block w-100" alt="Foto tidak ada">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Palembang</h5>
                            <p>Jembatan Ampera Palembang</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="admin/images/bali3.jpg" class="d-block w-100" alt="Foto tidak ada">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Bali</h5>
                            <p>Pemandangan Bali</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div> <!--end image slide-->

            <!-- banner 1 -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="d-flex">
                            <div class="flex-shrink-0"></div>
                            <div class="flex-grow-1" style="background: #d2dae2; margin-top:10px; padding: 10px 0 10px 0;">
                                <h1 style="text-align:center; font-family: Lucida Handwriting;">
                                    Pesona Indonesia</h1>
                                <p style="text-align:center;"> Indonesia memikat dengan keindahan alamnya, dari pantai eksotis hingga hutan hujan tropis. Budayanya yang beragam tercermin dalam tradisi, seni, dan arsitektur. Destinasi bersejarah seperti Borobudur dan Prambanan menambah pesona, sementara keramahan masyarakat membuat setiap kunjungan tak terlupakan. Sebuah negara dengan kekayaan alam dan budaya yang menginspirasi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <!--buat destinasi berita-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8" style="background: #d2dae2; margin-left: 20px; margin-right:60px; padding-top:20px;">
                        <h2 style="font-family: Lucida Handwriting;">Berita Pesona Destinasi Indonesia</h2>
                        <br>
                        <!-- tambahin ini -->
                        <?php
                        $jumlahtampilan = 3;
                        $halaman = (isset($_GET['page'])) ? $_GET['page'] : 1;
                        $mulaitampilan = ($halaman - 1) * $jumlahtampilan;

                        $destinasi = mysqli_query($connection, "select * from destinasi, kategoriwisata 
                            where destinasi.kategoriKODE = kategoriwisata.kategoriKODE limit $mulaitampilan, $jumlahtampilan;");
                        if (mysqli_num_rows($destinasi) > 0) {
                            while ($row = mysqli_fetch_array($destinasi)) { ?>

                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img style="margin-right: 10px; width:100px; height: 100px; border-radius: 10px;" <?php if (is_file("admin/images/" . $row['destinasiFOTO'])) { ?> src="admin/images/<?php echo $row['destinasiFOTO'] ?>" width="100" <?php } ?> alt="No Image">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5> <?php echo $row["destinasiNAMA"]; ?> <small class="text-muted">
                                                <i> Kategori <?php echo $row["kategoriNAMA"]; ?> </i></small> </h5>
                                        <p style="text-align: justify;"> <?php echo $row["destinasiKET"]; ?> </p>
                                        <a href="#" class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                                <br>
                        <?php }
                        }
                        ?>

                        <!--pagination-->
                        <?php
                        $query = mysqli_query($connection, "SELECT * FROM DESTINASI");
                        $jumlahrecord = mysqli_num_rows($query);
                        $jumlahpage = ceil($jumlahrecord / $jumlahtampilan);
                        ?>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="?page=<?php $nomorhal = 1;
                                                                                        echo $nomorhal ?>">Previous</a></li>
                                <?php for ($nomorhal = 1; $nomorhal <= $jumlahpage; $nomorhal++) { ?>

                                    <li class="page-item">
                                        <?php if ($nomorhal != $halaman) { ?>
                                            <a class="page-link" href="?page=<?php echo $nomorhal ?>"><?php echo $nomorhal ?></a>
                                        <?php } else { ?>
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="?page=<?php echo $nomorhal; ?>"><?php echo $nomorhal ?></a>
                                    </li>
                                <?php } ?>
                                </li>
                            <?php } ?>

                            <li class="page-item"><a class="page-link" href="?page=<?php echo $nomorhal - 1; ?>">Next</a></li>
                            </ul>
                        </nav>

                    </div> <!--end col sm 8 -->

                    <div class="col-sm-3" style="background: #d2dae2; padding-top:20px;">
                        <h3 style="font-family: Lucida Handwriting;">Video Pesona Indonesia</h3>
                        <br>
                        <div class="card" style="width: 15rem;">
                            <div class="card-body">
                                <h5 class="card-title">Pesona Indonesia 1</h5>
                                <iframe width="200px" src="https://www.youtube.com/embed/qnXcB5L97MI?si=S6djNcWIT7lbjLms" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                <p style="font-size: 11px;">Source: Youtube Channel Erik Hedenfalk</p>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Pesona Indonesia 2</h5>
                                <iframe width="200px" src="https://www.youtube.com/embed/rBoYIDWghZc?si=L-dlaeN_aenEwUC5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                <p style="font-size: 11px;">Source: Youtube Channel Fernweh Chronicles</p>
                            </div>
                        </div>
                    </div> <!--end col sm 3-->

                </div> <!--end row-->
            </div> <!-- end container-->
            <!-- end berita -->
            <br>
        </div>
    </div>
    <!-- end menu, sampai sebelum jelajahi lebih lanjut -->
    <!-- banner 2 -->
    <div class="background" style="background: #ecf0f1;">
        <div class="container" style="width:auto; margin:auto; background: #ecf0f1;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex">
                        <div class="flex-shrink-0"></div>
                        <div class="flex-grow-1" style="background: #ecf0f1; padding: 10px 0 10px 0;">
                            <div class="row">
                                <h1 style="text-align:center; font-family: Lucida Handwriting;">
                                    Jelajahi Lebih Lanjut!!!</h1>
                                <div class="kotak" style="overflow: hidden;">
                                    <div class="card" style="width: 10rem; height: 300px; float:left; 
                                            text-align:center; padding: 70px 25px; margin-left: 350px;">
                                        <img src="admin/images/restoran.jpg" alt="No Image">
                                        <p>Restoran</p>
                                    </div>

                                    <div class="card" style="width: 10rem; height: 300px; float:left;
                                            text-align:center; padding: 70px 25px; margin-left: 50px;">
                                        <img src="admin/images/hotel.jpg" alt="No Image">
                                        <p>Hotel</p>
                                    </div>

                                    <div class="card" style="width: 10rem; height: 300px; padding: 70px 25px; float: left;
                                            text-align:center; margin-left: 50px;">
                                        <img src="admin/images/oleholeh.jpg" alt="No Image">
                                        <p>Oleh - Oleh</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="background" style="background: #808e9b">
        <div class="container-fluid" style="width: 1200px; background: white;">
            <br>
            <!--buat restoran-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8" style="background: #d2dae2; margin-left: 20px; margin-right:60px; padding-top:20px;">
                        <h2 style="font-family: Lucida Handwriting;">Pilihan Restoran</h2>
                        <br>
                        <!-- tambahin ini -->
                        <?php
                        $jumlahtampilan = 3;
                        $halaman = (isset($_GET['page'])) ? $_GET['page'] : 1;
                        $mulaitampilan = ($halaman - 1) * $jumlahtampilan;

                        $restaurant = mysqli_query($connection, "select * from restaurant, destinasi 
                            where destinasi.destinasiKODE = restaurant.destinasiKODE limit $mulaitampilan, $jumlahtampilan;");
                        if (mysqli_num_rows($restaurant) > 0) {
                            while ($row = mysqli_fetch_array($restaurant)) { ?>

                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img style="margin-right: 10px; width:100px; height: 100px; border-radius: 10px;" <?php if (is_file("admin/images/" . $row['restaurantFOTO'])) { ?> src="admin/images/<?php echo $row['restaurantFOTO'] ?>" width="100" <?php } ?> alt="No Image">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5> <?php echo $row["restaurantNAMA"]; ?> <small class="text-muted">
                                                <i> Lokasi: <?php echo $row["destinasiNAMA"]; ?> </i></small> </h5>
                                        <p style="text-align: justify;"> <?php echo $row["restaurantALAMAT"]; ?> </p>
                                    </div>
                                </div>
                                <br>
                        <?php }
                        }
                        ?>

                        <!--pagination-->
                        <?php
                        $query = mysqli_query($connection, "SELECT * FROM restaurant");
                        $jumlahrecord = mysqli_num_rows($query);
                        $jumlahpage = ceil($jumlahrecord / $jumlahtampilan);
                        ?>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="?page=<?php $nomorhal = 1;
                                                                                        echo $nomorhal ?>">Previous</a></li>
                                <?php for ($nomorhal = 1; $nomorhal <= $jumlahpage; $nomorhal++) { ?>

                                    <li class="page-item">
                                        <?php if ($nomorhal != $halaman) { ?>
                                            <a class="page-link" href="?page=<?php echo $nomorhal ?>"><?php echo $nomorhal ?></a>
                                        <?php } else { ?>
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="?page=<?php echo $nomorhal; ?>"><?php echo $nomorhal ?></a>
                                    </li>
                                <?php } ?>
                                </li>
                            <?php } ?>

                            <li class="page-item"><a class="page-link" href="?page=<?php echo $nomorhal - 1; ?>">Next</a></li>
                            </ul>
                        </nav>

                    </div> <!--end col sm 8 -->

                    <div class="col-sm-3" style="background: #d2dae2; padding-top:20px;">
                        <h3 style="font-family: Lucida Handwriting;">Daftar Pilihan</h3>
                        <br>
                        <div class="card" style="width: 15rem;">
                            <div class="card-body">
                                <h5 class="card-title">Pilihan Restoran (<?php echo $jumlah5 ?>)</h5>
                            </div>
                        </div>
                        <br>

                        <div class="card" style="width: 15rem;">
                            <div class="card-body">
                                <h5 class="card-title">Pilihan Hotel (<?php echo $jumlah3 ?>)</h5>
                            </div>
                        </div>
                        <br>

                        <div class="card" style="width: 15rem;">
                            <div class="card-body">
                                <h5 class="card-title">Pilihan Oleh - Oleh (<?php echo $jumlah4 ?>)</h5>
                            </div>
                        </div>
                    </div> <!--end col sm 3-->

                </div> <!--end row-->


            </div> <!-- end container-->
            <!-- end restoran -->
            <br>
            <!--buat hotel-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12" style="background: #d2dae2; padding-top:20px; overflow: hidden;">
                        <h2 style="font-family: Lucida Handwriting;">Pilihan Hotel</h2>
                        <br>
                        <!-- tambahin ini -->
                        <?php
                        $hotel = mysqli_query($connection, "select * from hotel, destinasi 
                            where destinasi.destinasiKODE = hotel.destinasiKODE");
                        if (mysqli_num_rows($hotel) > 0) {
                            while ($row = mysqli_fetch_array($hotel)) { ?>
                                <div class="col-sm-5" style="float: left;">
                                    <div class="card" style="height: 400px; padding:10px; margin-left: 150px; margin-bottom: 50px;">
                                        <div class="cardbody">
                                            <h5> <?php echo $row["hotelNAMA"]; ?> <small class="text-muted">
                                                    <i> Lokasi: <?php echo $row["destinasiNAMA"]; ?> </i></small> </h5>
                                            <p style="text-align: justify;"> <?php echo $row["hotelALAMAT"]; ?> </p>
                                        </div>

                                        <img style="width:300px; height: 200px; border-radius: 10px;" <?php if (is_file("admin/images/" . $row['hotelFOTO'])) { ?> src="admin/images/<?php echo $row['hotelFOTO'] ?>" width="100" <?php } ?> alt="No Image">
                                    </div>
                                </div>
                        <?php }
                        }
                        ?>

                    </div> <!--end col sm 11 -->

                </div> <!--end row-->


            </div> <!-- end container-->
            <!-- end hotel -->
            <br>

            <!--buat oleh - oleh-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12" style="background: #d2dae2; padding-top:20px; overflow: hidden;">
                        <h2 style="font-family: Lucida Handwriting;">Pilihan Oleh - Oleh</h2>
                        <br>
                        <?php
                        $oleholeh = mysqli_query($connection, "SELECT * FROM oleholeh, destinasi WHERE destinasi.destinasiKODE = oleholeh.destinasiKODE");
                        if (mysqli_num_rows($oleholeh) > 0) {
                            while ($row = mysqli_fetch_array($oleholeh)) {
                        ?>
                                <div class="col-sm-5" style="float: left;">
                                    <div class="card" style="height: 350px; padding:10px; margin-left: 150px; margin-bottom: 50px;">
                                        <div class="cardbody">
                                            <h5> <?php echo $row["oleholehTEMPAT"]; ?> <small class="text-muted"><i> Lokasi: <?php echo $row["destinasiNAMA"]; ?> </i></small> </h5>
                                            <p style="text-align: justify;"> Jual: <?php echo $row["oleholehNAMA"]; ?> </p>
                                        </div>
                                        <img style="width:300px; height: 200px; border-radius: 10px;" <?php if (is_file("admin/images/" . $row['oleholehFOTO'])) { ?> src="admin/images/<?php echo $row['oleholehFOTO'] ?>" <?php } ?> alt="No Image">
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- end oleh - oleh -->

            <!-- banner 3 -->
            <div class="banner" style="background: #d2dae2; margin-top:10px; padding: 10px 0 10px 0;">
                <h1 style="text-align:center; font-family: Lucida Handwriting;">Foto Pesona Indonesia</h1>
            </div>
            <br>
            <!--galeri-->
            <div class="container">
                <div class="row">
                    <?php
                    $destinasi = mysqli_query($connection, "SELECT * FROM destinasi, kategoriwisata WHERE destinasi.kategoriKODE = kategoriwisata.kategoriKODE;");
                    if (mysqli_num_rows($destinasi) > 0) {
                        while ($row = mysqli_fetch_array($destinasi)) {
                    ?>
                            <div class="col-lg-4">
                                <div class="card mb-5">
                                    <img <?php if (is_file("admin/images/" . $row['destinasiFOTO'])) { ?> src="admin/images/<?php echo $row['destinasiFOTO'] ?>" <?php } ?> alt="No Image" style="height: 200px;">
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: justify;">
                                            <?php echo $row["destinasiNAMA"]; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- end galeri-->
        </div>
    </div>

    <div class="author"> <!--BIODATA-->
        <div class="biodata">
            <div class="data">
                <h2>Author</h2>
                <h1>KENAZ REISHA</h1>
                <p>Halo! Nama saya Kenaz, Lahir di Jakarta tanggal 29 September 2004. Saya sedang berpendidikan di Universitas Tarumanagara. Hobi saya adalah aktivitas yang tidak perlu banyak bergerak. -825220029-</p>
            </div>
            <div class="gambardata">
                <img src="admin/images/me.jpg">
            </div>
        </div>
    </div> <!--Penutup BIODATA-->

    <div class="background" style="background: #808e9b">
        <!-- saran -->
        <div class="container-fluid" style="width: 1200px; background: white;">
            <h1>Tambahkan Komentar :></h1>
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <form method="POST">
                            <div class="form-group row">
                                <label for="sarankode" class="col-sm-2 col-form-label">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="sarankode" name="inputkode" placeholder="Masukkan ID">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sarannama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="sarannama" name="inputnama" placeholder="Masukkan Nama">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="saranemail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="saranemail" name="inputemail" placeholder="Masukkan Email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sarankomen" class="col-sm-2 col-form-label">Komentar</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="sarankomen" name="inputkomen" placeholder="Masukkan Komentar"></textarea>
                                </div>
                            </div>

                            <br>
                            <div class="col-sm-3"></div>
                            <div class="col-sm-7">
                                <button type="reset" class="btn btn-secondary">Batal</button>
                                <button type="submit" class="btn btn-success" value="Simpan" name="Simpan">Simpan</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-sm-6">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Komentar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $jumlahtampilan = 3;
                                $halaman = (isset($_GET['page'])) ? $_GET['page'] : 1;
                                $mulaitampilan = ($halaman - 1) * $jumlahtampilan;

                                $query = mysqli_query($connection, "select * from saran limit $mulaitampilan, $jumlahtampilan;");
                                $nomor = 1;

                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $mulaitampilan + $nomor; ?>
                                        </td>
                                        <td><?php echo $row['saranNAMA']; ?></td>
                                        <td><?php echo $row['saranEMAIL']; ?></td>
                                        <td><?php echo $row['saranKOMENTAR']; ?></td>
                                    <?php
                                    $nomor += 1;
                                }
                                    ?>

                                    </tr>
                            </tbody>
                        </table>
                        <!--pagination-->
                        <?php
                        $query = mysqli_query($connection, "SELECT * FROM saran");
                        $jumlahrecord = mysqli_num_rows($query);
                        $jumlahpage = ceil($jumlahrecord / $jumlahtampilan);
                        ?>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="?page=<?php $nomorhal = 1;
                                                                                        echo $nomorhal ?>">Previous</a></li>
                                <?php for ($nomorhal = 1; $nomorhal <= $jumlahpage; $nomorhal++) { ?>

                                    <li class="page-item">
                                        <?php if ($nomorhal != $halaman) { ?>
                                            <a class="page-link" href="?page=<?php echo $nomorhal ?>"><?php echo $nomorhal ?></a>
                                        <?php } else { ?>
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="?page=<?php echo $nomorhal; ?>"><?php echo $nomorhal ?></a>
                                    </li>
                                <?php } ?>
                                </li>
                            <?php } ?>

                            <li class="page-item"><a class="page-link" href="?page=<?php echo $nomorhal - 1; ?>">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <br>
                <br>
            </div>


        </div>
    </div>

    <!--Footer-->
    <div class="footer">
        <div class="FOOT">
            <div class="footatas">
                <div class="aboutus">
                    <h2>About Us</h2>
                    <div class="garis"></div>
                    <p>Inventore veritatis et quasi architecto beatae dicta sed ut perspiciatis unde omnis iste natus laudantium.</p>
                    <p>Sed ut perspiciatis unde omnis iste natus voluptatem fringilla tempor dignissim at, pretium et arcu.</p>
                    <div class="sosimg">
                        <div class="sosial"><a href="#"><img src="admin/images/fb.png"></a></div>
                        <div class="sosial"><a href="#"><img src="admin/images/ig.jpg"></a></div>
                        <div class="sosial"><a href="#"><img src="admin/images/twitter.png"></a></div>
                        <div class="sosial"><a href="#"><img src="admin/images/yt.jpg"></a></div>
                    </div>
                </div>

                <div class="subscribe">
                    <h2>Contact Us</h2>
                    <div class="garis"></div>
                    <input type="text" placeholder="Email Anda">
                    <button type="button">Send</button>
                </div>
            </div>

            <footer>
                <p>&copy;2022 Pesona Indonesia</p>
            </footer>
        </div>
    </div> <!-- Penutup Footer-->
</body>
<!--script menu-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>