<?php 
    include "config.php";

    $sql1 = mysqli_query($connection, "select * from kategoriwisata");
    $jumlah1 = mysqli_num_rows($sql1);

    $sql2 = mysqli_query($connection, "select * from destinasi");
    $jumlah2 = mysqli_num_rows($sql2);

    $sql3 = mysqli_query($connection, "select * from hotel");
    $jumlah3 = mysqli_num_rows($sql3);

    $sql4 = mysqli_query($connection, "select * from oleholeh");
    $jumlah4 = mysqli_num_rows($sql4);

    $sql5 = mysqli_query($connection, "select * from restaurant");
    $jumlah5 = mysqli_num_rows($sql5);

    $sql6 = mysqli_query($connection, "select * from travel");
    $jumlah6 = mysqli_num_rows($sql6);

    $sql7 = mysqli_query($connection, "select * from berita");
    $jumlah7 = mysqli_num_rows($sql7);

    $sql8 = mysqli_query($connection, "select * from musik");
    $jumlah8 = mysqli_num_rows($sql8);
?>

<div class="row">
<div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">Jumlah Kategori Wisata: <?php echo $jumlah1?></div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="daftarkategoriwisata.php">View Details</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card bg-warning text-white mb-4">
        <div class="card-body">Jumlah Destinasi Wisata: <?php echo $jumlah2?></div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="daftardestinasi.php">View Details</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card bg-success text-white mb-4">
        <div class="card-body">Jumlah Hotel: <?php echo $jumlah3?></div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="daftarhotel.php">View Details</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card bg-danger text-white mb-4">
        <div class="card-body">Jumlah Pusat Oleh - Oleh: <?php echo $jumlah4?></div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="daftaroleholeh.php">View Details</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">Jumlah Restaurant: <?php echo $jumlah5?></div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="daftarrestaurant.php">View Details</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card bg-warning text-white mb-4">
        <div class="card-body">Jumlah Travel: <?php echo $jumlah6?></div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="daftartravel.php">View Details</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card bg-success text-white mb-4">
        <div class="card-body">Jumlah Berita: <?php echo $jumlah7?></div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="daftarberita.php">View Details</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6">
    <div class="card bg-danger text-white mb-4">
        <div class="card-body">Jumlah Alat Musik Tradisional: <?php echo $jumlah8?></div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="daftarmusik.php">View Details</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
</div>
</div>