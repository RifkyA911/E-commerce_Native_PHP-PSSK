<?php
// import moduk
require_once "../conn.php";
require_once "query_function.php";
session_start();

/// inisialisasi variabel yang menampung nilai session 'id'
$id_customer = $_SESSION['id'];

// pengecekan pada metode GET 'id_item' pada URL lalu ditampung kedalam variabel
if (isset($_GET['id_item'])) {
    $id_item = $_GET['id_item'];
} else {
    die("<h1>Id Item Tidak berhasil terseleksi</h1>");
}

// melakukan fungsi query hapus_cart() dengan parameter ($id_customer, $id_item)
hapus_cart($id_customer, $id_item);
