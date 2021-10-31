<?php
require "conn.php";
session_start();

if (isset($_GET['id_item'])) {
    $id_item = $_GET['id_item'];
    // echo $id_item;
} else {
    die("<h1>Id Item Tidak berhasil terseleksi</h1>");
}

$query = "SELECT item.id, item.id_kategori, item.nama, item.harga, item.picture, item.deskripsi, item_kategori.id, item_kategori.kategori FROM item
INNER JOIN item_kategori ON item.id_kategori = item_kategori.id WHERE item.id=$id_item";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Query Error : ' . mysqli_errno($conn) .
        ' - ' . mysqli_error($conn));
} else {
    // echo "<h2>Berhasil query</h2>"; // taruh ke session
}

$data = [];

list($data['item'], $data['id_kategori'], $data['nama'], $data['harga'], $data['picture'], $data['deskripsi'], $data['kategori_id'], $data['kategori']) = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Home | Toko Sehat</title>
    <!-- panggil header -->
    <?php require 'header.php'; ?>
</head>

<body style="<?= $Load_BG; ?>">
    <header class="fixed-top shadow-sm">
        <?php require 'navbar.php' ?>
    </header>
    <main class="py-5 my-5" style="<?= $Load_BG; ?>">
        <div class="container mt-5">
            <div class="nav-menu mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Barang</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col">
                    <div class="load-content mx-auto d-flex justify-content-between">
                        <div class="content-list-product">
                            <div class="list-product-header">
                                <h5><i class="bi bi-tags-fill"></i> <?= $data['kategori']; ?></h5>
                            </div>
                            <div class="list-product-body d-flex flex-row justify-content-center flex-wrap ">
                                <div class="card col-10 shadow rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="item-picture text-center">
                                                    <img src="public/img/<?= $data['picture']; ?>" alt="">
                                                </div>
                                                <hr>
                                                <h6 class="fw-bold"><?= $data['nama']; ?></h6>
                                                <p class="fw-bold">Rp <?= number_format($data['harga'], 0, ',', '.'); ?></p>
                                                <p style="max-width: 1000px;"><?= $data['deskripsi']; ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <form class="d-flex pt-4 justify-content-center" method="POST" action="__function/attach_item.php">
                                                    <input type="hidden" name="id_item" value="<?= $data['item']; ?>">
                                                    <input type="hidden" name="harga" value="<?= $data['harga']; ?>">
                                                    <button type="submit" class="btn btn-outline-success"><i class="bi bi-cart-plus-fill"></i> Masukkan ke keranjang</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#89bd0f" fill-opacity="1" d="M0,160L48,154.7C96,149,192,139,288,160C384,181,480,235,576,234.7C672,235,768,181,864,149.3C960,117,1056,107,1152,122.7C1248,139,1344,181,1392,202.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
    <?php require 'footer.php'; ?>
</body>

</html>