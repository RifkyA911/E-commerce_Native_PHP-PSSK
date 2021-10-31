<?php
// import modul
require_once "../conn.php";
require_once "__query_function.php";

/// pengecekan pada data yang dikirim ke modul dengan metode GET 'id_item' 
if (isset($_GET['id_item'])) {
    $id_item = $_GET['id_item'];
} else {
    die("<h1>Id Item Tidak berhasil terseleksi</h1>");
}

/// melakukan fungsi get_spesific_data() dengan parameter ('customer_cart', 'id_item', $id_item)
$itemv_add = get_spesific_data('customer_cart', 'id_item', $id_item);
/// pada index ke-0 array dari variabel '$itemv_add' melakukan pperator penjumlahan sebanyak 1 kali 
$add_quantity = intval($itemv_add[0] + 1);
/// melakukan fungsi get_spesific_data() dengan parameter ('customer_cart', 'id_item', $id_item)
$cartv_add = get_spesific_data('customer_cart', 'id_item', $id_item);
