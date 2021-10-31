<?php
// import modul
require "conn.php";
require "__function/query_function.php";
session_start();

/// pengecekan session, jika belum melakukan login maka alihkan ke halaman login.php
if (isset($_SESSION['username']) == '') {
    echo "<h1>Anda Belum Login</h1>";
    header("Location: login.php");
}

/// inisialisasi variabel dengan value berupa panggil fungsi query get_all_data() dengan parameter nama tabel 'item_kategori'
$kategori = get_all_data('item_kategori');
/// inisialisasi variabel yang berisi value 'id' dari session
$id_user = $_SESSION['id'];
/// inisialisasi variabel yang berisi value dari output fungsi belanja() dengan parameter $id_user 
$items = belanja($id_user);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cart | Toko Sehat</title>
    <!-- panggil modul header -->
    <?php require 'header.php'; ?>
</head>

<body style="<?= $Load_BG; ?>">
    <header class="fixed-top shadow-sm">
        <!-- panggil modul navbar -->
        <?php require 'navbar.php' ?>
    </header>
    <main class="py-5 my-5" style="<?= $Load_BG; ?>">
        <div class="container mt-5">
            <div class="nav-menu mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col">
                    <div class="load-content mx-auto d-flex justify-content-center">
                        <div class="content-list-product">
                            <div class="list-product-header text-center mb-3">
                                <h4><i class="fas fa-fw fa-shopping-cart"></i> Keranjang Belanja</h5>
                            </div>
                            <div class="list-product-body d-flex flex-row flex-wrap ">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <table class="table table-hover">
                                                    <thead class="bg-dark text-light">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Jumlah</th>
                                                            <th>Harga Satuan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <!-- memuat tampilan keranjang belanja customer -->
                                                    <?php
                                                    /// jika isi keranjang terdapat item
                                                    if (count($items) > 0) : ?>
                                                        <?php
                                                        /// tambah nilai variabel sebanyak 1 untuk penomoran 
                                                        $no = 1;
                                                        /// inisialisasi kerangka variabel untuk total harga
                                                        $harga_total = 0;
                                                        /// perulangan menampilkan data daftar keranjang
                                                        foreach ($items as $i) : ?>
                                                            <?php $harga_total += $i['sub_total_harga'] ?>
                                                            <tbody>
                                                                <tr>
                                                                    <td><?= $no; ?></td>
                                                                    <td><?= $i['nama']; ?></td>
                                                                    <td><?= $i['jumlah']; ?></td>
                                                                    <td>Rp <?= number_format($i['harga'], 0, ',', '.'); ?></td>
                                                                    <td><a href="__function/tambah_quantity.php?id_item=<?= $i['id']; ?>" disabled class="disabled btn btn-outline-success btn-sm"><i class="bi bi-plus-lg"></i></a>
                                                                        <a href="__function/kurang_quantity.php?id_item=<?= $i['id']; ?>" disabled class="disabled btn btn-outline-dark btn-sm"><i class="bi bi-dash-lg"></i></a>
                                                                        <span class="border-end mx-2"></span>
                                                                        <a href="__function/hapus_quantity.php?id_item=<?= $i['id']; ?>" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        <?php
                                                            /// tambah nilai variabel sebanyak 1 untuk penomoran 
                                                            $no++;
                                                        /// mengakhiri perulangan menampilkan data daftar keranjang
                                                        endforeach;
                                                    /* 
                                                    *pengecekan jika isi keranjang kosong 
                                                    */
                                                    else :
                                                        /// inisialisasi kerangka variabel untuk total harga
                                                        $harga_total = 0; ?>
                                                        <tbody>
                                                            <tr>
                                                                <td>-</td>
                                                                <td>kosong</td>
                                                                <td>0</td>
                                                                <td>-</td>
                                                            </tr>
                                                        </tbody>
                                                    <?php
                                                    /// mengakhiri pengecekan isi keranjang
                                                    endif; ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p class="fw-bold">Total Belanja (*termasuk pajak 2500) : Rp <?= ///total akumulasi harga item customer pada keranjang belanja disertai pajak sebesar 
                                                                                                                number_format($harga_total += 2500, 0, ',', '.'); ?>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col text-center">
                                                <a href="__function/bill.php" class="btn btn-success">Beli Sekarang</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-product-footer">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#00cba9" fill-opacity="1" d="M0,160L48,170.7C96,181,192,203,288,186.7C384,171,480,117,576,128C672,139,768,213,864,208C960,203,1056,117,1152,90.7C1248,64,1344,96,1392,112L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
    <?php require 'footer.php'; ?>
</body>

</html>