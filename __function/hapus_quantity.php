<?php
require_once "../conn.php";
require_once "query_function.php";
session_start();
$id_customer = $_SESSION['id'];

if (isset($_GET['id_item'])) {
    $id_item = $_GET['id_item'];
    // echo $id_item;
} else {
    die("<h1>Id Item Tidak berhasil terseleksi</h1>");
}

hapus_cart($id_customer, $id_item);
