<?php

/**
 * Setiap halaman membutuhkan modul utama untuk menjalankan fungsi koneksi ke DB dan query function
 * <pre>require "conn.php";
 * require "__function/query_function.php";</pre>
 */
// import modul
require "conn.php";
require "__function/query_function.php";
/// melakukan fungsi query get_all_data() yang membuat seluruh data dari tabel item
$items = get_all_data('item');
/// melakukan fungsi query get_all_data() yang membuat seluruh data dari tabel item_kategori
$kategori = get_all_data('item_kategori');
/// inisialisasi session untuk kredensial
session_start();
// debug tools
// // Start the clock time in seconds 
// $start_time = microtime(true);
// $val = 1;
// // memory
// $big_array = array();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home | Toko Sehat</title>
    <?php /* import module css dan bootsrap */ require 'header.php'; ?>
</head>

<body style="<?= $Load_BG; ?>">
    <header class="fixed-top shadow-sm">
        <?php /* import module komponen html navbar*/ require 'navbar.php' ?>
    </header>
    <main class="py-5 my-5" style="<?= $Load_BG; ?>">
        <div class="container mt-5">
            <div class="nav-menu mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="default">Home</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col">
                    <div class="load-content mx-auto d-flex justify-content-between">
                        <div class="content-list-product">
                            <div class="list-product-header">
                                <h5><i class="bi bi-tags-fill"></i> Produk Alat Kesehatan</h5>
                            </div>
                            <div id="ajax_body">
                                <div class="list-product-body d-flex flex-row bd-highlight flex-wrap ">
                                    <?php
                                    /// melakukan looping untuk menampilkan semua data item dari database
                                    $no = 0;
                                    foreach ($items as $i) : ?>
                                        <div class="justify-content-sm-center">
                                            <a href="item.php?id_item=<?= $i['id']; ?>" target="_blank" class="card m-2 shadow-sm text-decoration-none text-dark" style="<?= $List_Item; ?>">
                                                <img src="public\img\<?= $i['picture'] ?>" class="card-img-top" alt="...">
                                                <div class="card-body pt-2 border-top" style="font-size: 14px;">
                                                    <p class="card-text mb-1" style="min-height: 50px; height: 65px;max-height: 75px;overflow: hidden;text-overflow: clip;"><?= $i['nama']; ?></p>
                                                    <p class="fw-bold">Rp <?= number_format($i['harga'], 0, ',', '.'); ?></p>
                                                    <div class="d-flex justify-content-between">
                                                        <button class="px-4 btn btn-sm btn-outline-info">View</button>
                                                        <button class="px-4 btn btn-sm btn-outline-success" style="z-index: 300;" href="__function/attach_item.php">Buy</button>
                                                    </div>
                                                </div>
                                            </a>
                                            <?php //$big_array[] = $no;
                                            //$val++;
                                            $no++; ?>
                                        </div>
                                    <?php
                                    /// stop looping
                                    endforeach;
                                    // echo '<p>After building the array</p>';
                                    // print_mem();

                                    // unset($big_array);

                                    // echo '<p>After unsetting the array</p>';
                                    // print_mem();
                                    // function print_mem()
                                    // {
                                    //     /* Currently used memory */
                                    //     $mem_usage = memory_get_usage();

                                    //     /* Peak memory usage */
                                    //     $mem_peak = memory_get_peak_usage();

                                    //     echo 'The script is now using: <strong>' . round($mem_usage / 1024) . 'KB</strong> of memory.<br>';
                                    //     echo 'Peak usage: <strong>' . round($mem_peak / 1024) . 'KB</strong> of memory.<br><br>';
                                    // }
                                    // // End the clock time in seconds 
                                    // $end_time = microtime(true);

                                    // // Calculate the script execution time 
                                    // $execution_time = ($end_time - $start_time);

                                    // echo " It takes " . $execution_time . " seconds to execute the script";
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- Kategori Filter -->
                        <div class="content-list-filter ms-2 sticky-md-top" style="width:700px;">
                            <div class="filter-area">
                                <div class="filter-header pb-2">
                                    <h5><i class="bi bi-filter-circle-fill"></i> Etalase Toko</h5>
                                </div>
                                <div class="filter-body card rounded shadow-sm">
                                    <div class="filter-body-skelton p-2">
                                        <div class="filter-location">
                                            <h6>Alat Kesehatan</h6>
                                            <div class="filter-form-group ps-1">
                                                <!-- memanggil fungsi get_all_data() dari conn.php -->
                                                <?php foreach ($kategori as $k) : ?>
                                                    <div class="form-check pt-2">
                                                        <?php $name = str_replace(' ', '_', $k['kategori']); ?>
                                                        <input class="form-check-input search_kategori" onclick="View_Kategori()" type="checkbox" value="<?= $k['kategori'] ?>" id="CBX_<?= $k['kategori'] ?>">
                                                        <label class="form-check-label" style="<?= $Mpointer; ?>" for="CBX_<?= $k['kategori'] ?>">
                                                            <?= ucwords($k['kategori']); ?>
                                                        </label>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <hr>
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
    <?php /* import modul footer dan script */ require 'footer.php'; ?>
</body>

</html>