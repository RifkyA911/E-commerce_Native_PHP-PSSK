<?php
require_once "../conn.php";
require_once "query_function.php";

session_start();
$id_customer = $_SESSION['id'];
$items = get_spesific_data('customer_cart', 'id_customer', $id_customer);
$list_id_item = '';
$harga_total = 0;
foreach ($items as $i) {
    $list_id_item .= $i['id_item'] . ';';
    $harga_total += $i['sub_total_harga'];
}
// $total_harga = ;
$shp_id_kota = 1101;

// die("<pre>" . print_r($list_id_item) . "</pre>");

if (!cetak_bill($id_customer, $list_id_item, $harga_total, $shp_id_kota)) {
    die("<h1>gagal query</h1><a href='../cart.php'>kembali</a>");
} else {
    header("Location: ../nota.php");
}
