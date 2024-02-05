<?php
    require "session.php";
    require "../koneksi.php";

    $id = $_GET['y'];

    $query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id WHERE a.id='$id'");
    $data = mysqli_fetch_array($query);

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori WHERE id!='$data[kategori_id]'");

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopkrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength -1)];
        }
        return $randomString;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <title>Detail Produk</title>
</head>

<style>
.no_decoration {
    text-decoration: none;
}

form div {
    margin-bottom: 10px;
}
</style>

<body>
    <?php require "navbar.php"; ?>

    <div class="container mt-5">
        <h2>Detail Produk</h2>

        <div class="col-12 col-md-6 mb-5">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" placeholder="Input Nama Produk"
                        value="<?= $data['nama']; ?>" class="form-control" autocomplete="off" required>
                </div>
                <div>
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="<?= $data['kategori_id']; ?>"><?= $data['nama_kategori']; ?></option>
                        <?php
                            while($dataKategori= mysqli_fetch_array($queryKategori)) {
                                ?>
                        <option value="<?= $dataKategori['id']; ?>"><?= $dataKategori['nama']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="harga">Harga</label>
                    <input type="number" value="<?= $data['harga']; ?>" class="form-control" name="harga" required>
                </div>
                <div>
                    <label for="fotoSekarang">Foto Produk Sekarang</label>
                    <img src="../image/<?= $data['foto']; ?>" width="300px" alt="">
                </div>
                <div>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div>
                    <label for="detail">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="10"
                        class="form-control"><?= $data['detail'] ?></textarea>
                </div>
                <div>
                    <label for="ketersediaan_stok">Ketersediaan Stok</label>
                    <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                        <option value="<?= $data['ketersediaan_stok'] ?>"><?= $data['ketersediaan_stok'] ?></option>
                        <?php
                            if($data['ketersediaan_stok']=='tersedia') {
                                ?>
                        <option value="habis">habis</option>
                        <?php
                            }
                            else {
                                ?>
                        <option value="tersedia">tersedia</option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="mt-3 d-flex justify-content-between">
                    <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
                    <button class="btn btn-danger" type="submit" name="hapus">Hapus</button>
                </div>
            </form>

            <?php
                if(isset($_POST['simpan'])) {
                    $nama = htmlspecialchars($_POST['nama']);
                    $kategori = htmlspecialchars($_POST['kategori']);
                    $harga = htmlspecialchars($_POST['harga']);
                    $detail = htmlspecialchars($_POST['detail']);
                    $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);

                    $target_dir = "../image/";
                    $nama_file = basename($_FILES["foto"]["name"]);
                    $target_file = $target_dir . $nama_file;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $image_size = $_FILES["foto"]["size"];
                    $random_name = generateRandomString(20);
                    $new_name = $random_name . "." . $imageFileType;

                    if($nama == '' || $kategori == '' || $harga == '') {
                        ?>
            <div class="alert alert-warning mt-3" role="alert">
                Nama, Kategori dan Harga Wajib diisi!
            </div>
            <?php
                    }
                    else {
                        $querUpdate = mysqli_query($con, "UPDATE produk SET kategori_id='$kategori', nama='$nama', harga='$harga', detail='$detail', ketersediaan_stok='$ketersediaan_stok' WHERE id=$id");

                        if($nama_file!='') {
                            // echo 'fotoogj';
                            if($image_size > 2000000) {
                                ?>
            <div class="alert alert-warning mt-3" role="alert">
                Ukuran File Tidak Boleh Lebih dari 2Mb!
            </div>
            <?php
                            }
                            else {
                                if($imageFileType!= 'jpg' && $imageFileType!= 'jpeg' && $imageFileType!= 'png' && $imageFileType!= 'gif') {
                                    ?>
            <div class="alert alert-warning mt-3" role="alert">
                File Wajib Bertipe jpg atau jpeg atau png atau gif!
            </div>
            <?php
                                }
                                else {
                                    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);

                                    $queryUpdate = mysqli_query($con, "UPDATE produk SET foto='$new_name' WHERE id='$id'");

                                    if($queryUpdate) {
                            ?>
            <div class="alert alert-primary mt-3" role="alert">
                Produk Berhasil Diperbaharui
            </div>

            <meta http-equiv="refresh" content="2; url=produk.php" />
            <?php
                                    }
                                    else {
                            echo mysqli_error($con);
                        }
                                }
                            }
                        }
                    }
                }

                if(isset($_POST['hapus'])) {
                    $queryHapus = mysqli_query($con, "DELETE FROM produk WHERE id='$id'");

                    if($queryHapus) {
                        ?>
            <div class="alert alert-warning mt-3" role="alert">
                Produk Berhasil Dihapus
            </div>

            <meta http-equiv="refresh" content="2; url=produk.php" />
            <?php
                    }
                    else{
                        echo mysqli_error($con);
                    }
                }
            ?>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>