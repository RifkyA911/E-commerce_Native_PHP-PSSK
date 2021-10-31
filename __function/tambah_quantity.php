<?php
require_once "../conn.php";
require_once "__query_function.php";


if (isset($_GET['id_item'])) {
    $id_item = $_GET['id_item'];
    // echo $id_item;
} else {
    die("<h1>Id Item Tidak berhasil terseleksi</h1>");
}

$itemv_add = get_spesific_data('customer_cart', 'id_item', $id_item);
$add_quantity = intval($itemv_add[0] + 1);
$cartv_add = get_spesific_data('customer_cart', 'id_item', $id_item);
