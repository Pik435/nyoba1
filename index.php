<?php
require "koneksi.php";
$queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Fiqq21 | Home</title>
</head>

<body>
    <?php require "navbar.php"; ?>

    <!-- banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1>Tokoko</h1>
            <h3>Menjual Apa Yang Bisa Dijual</h3>

            <div class="col-md-8 offset-md-2">
                <form action="produk.php" method="get">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Nama Produk" aria-label="Oi" aria-describedby="basic-addon2" name="keyword">
                        <button type="submit" class="btn warna2 text-white"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- produk unggulan -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Kategori Terlaris</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="produk-unggulan kategori-bj-pria d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a href="produk.php?kategori=Baju Pria" class="no-decoration">Baju
                                Pria</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="produk-unggulan kategori-bj-wanita d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a href="produk.php?kategori=Baju Wanita" class="no-decoration">Baju
                                Wanita</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="produk-unggulan kategori-sepatu d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a href="produk.php?kategori=Sepatu" class="no-decoration">Sepatu</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tentang kami -->
    <div class="container-fluid warna3 py-5">
        <div class="container text-center">
            <h3>Tentang Kami</h3>
            <p class="fs-5 mt-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam incidunt voluptatibus
                dolor
                doloremque
                cumque enim. Suscipit saepe repellat, neque culpa officia aperiam labore quidem placeat dolorem. Rerum
                itaque qui excepturi asperiores! Praesentium sequi necessitatibus nobis? Repellendus ut soluta facere
                sit facilis et hic velit quis quia culpa, molestias repellat sapiente neque? Eaque debitis nemo alias
                cupiditate rerum, facilis nulla dolor ut corrupti sapiente, reprehenderit doloremque maiores explicabo,
                veniam enim repellat ratione mollitia vitae quidem facere officia repudiandae est porro saepe. Officia
                maiores temporibus, rerum ut ea a impedit veniam.</p>
        </div>
    </div>

    <!-- produk -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>

            <div class="row mt-5">
                <?php while ($data = mysqli_fetch_array($queryProduk)) { ?>
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="image-box">
                                <img src="image/<?= $data['foto']; ?>" class="card-img-top" alt="">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?= $data['nama']; ?></h4>
                                <p class="card-text text-truncate"><?= $data['detail']; ?></p>
                                <p class="card-text text-harga">Rp. <?= $data['harga']; ?></p>
                                <a href="produk-detail.php?nama=<?= $data['nama'] ?>" class="btn warna2 text-white">Lihat
                                    Detail</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <a class="btn btn-outline-danger mt-3" href="produk.php">Lihat selengkapnya</a>
        </div>
    </div>

    <!-- footer -->
    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>