<?php
// import modul
require_once "../conn.php";
require_once "query_function.php";
session_start();

/// inisialisasi variabel yang menampung nilai session 'id'
$id_customer = $_SESSION['id'];
/// inisialisasi variabel yang menampung hasil fungsi query get_spesific_data() yang berparamter ('customer_cart', 'id_customer', $id_customer)
$items = get_spesific_data('customer_cart', 'id_customer', $id_customer);
/// inisialisasi variabel yang menampung nilai kosong untuk melakukan manipulasi data nantinya
$list_id_item = '';
/// inisialisasi variabel yang menampung nilai 0 untuk melakukan manipulasi data nantinya
$harga_total = 0;
/// melakukan perulangan dengan inisialisasi variabel yang menampung nilai data dari variabel `$items`
foreach ($items as $i) {
    $list_id_item .= $i['id_item'] . ';';
    $harga_total += $i['sub_total_harga'];
}
/// inisialisasi variabel yang menampung id dari tabel 'regencies' default 1101
$shp_id_kota = 1101;

// die("<pre>" . print_r($list_id_item) . "</pre>");
/// melakukan pengecekan fungsi query cetak_bill() dengan parameter ```($id_customer, $list_id_item, $harga_total, $shp_id_kota)``` 
if (!cetak_bill($id_customer, $list_id_item, $harga_total, $shp_id_kota)) {
    die("<h1>gagal query</h1><a href='../cart.php'>kembali</a>");
} else {
    header("Location: ../nota.php");
}
