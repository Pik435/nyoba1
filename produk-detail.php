<?php
require "koneksi.php";

$nama = htmlspecialchars($_GET['nama']);
// echo $nama;
$queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama='$nama'");
$produk = mysqli_fetch_array($queryProduk);
// var_dump($produk);

$queryProdukTerkait = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]' AND id!='$produk[id]' LIMIT 5");
$produkTerkait = mysqli_fetch_array($queryProdukTerkait);
// var_dump($produkTerkait);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Fiqq21 | Detail Produk</title>
</head>

<body>
    <?php require "navbar.php"; ?>

    <!-- banner -->
    <div class="container-fluid banner2 d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center">Detail Produk</h1>
        </div>
    </div>

    <!-- detail produk -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-3">
                    <img src="image/<?= $produk['foto']; ?>" class="w-100" alt="">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h1><?= $produk['nama']; ?></h1>
                    <p class="fs-5"><?= $produk['detail']; ?></p>
                    <p class="text-harga">
                        Rp. <?= $produk['harga']; ?>
                    </p>
                    <p class="fs-5">Status Ketersediaan : <strong><?= $produk['ketersediaan_stok']; ?></strong></p>
                    <div class="mt-3">
                        <a href="#" type="submit" class="btn btn-outline-primary" name="beliBtn">Beli</a>
                        <a href="produk.php" type="submit" class="btn btn-outline-danger" name="kembaliBtn">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- produk terkait -->
    <div class="container-fluid py-5 warna2">
        <div class="container">
            <h2 class="text-center text-white mb-5">Produk Terkait</h2>
            <div class="row">
                <?php while ($data = mysqli_fetch_array($queryProdukTerkait)) { ?>
                    <div class="col-md-6 col-lg-3 mb-3">
                        <a href="produk-detail.php?nama=<?= $data['nama']; ?>">
                            <img src="image/<?= $data['foto']; ?>" alt="" class="img-fluid img-thumbnail image-box-terkait">
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php require "footer.php" ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>

</body>

</html>