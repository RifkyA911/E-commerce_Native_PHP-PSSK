<?php

// mengambil data keranjang belanja berdasarkan user yang sedang login
function get_all_cart($table, $user, $coloumn = false)
{
    global $conn;
    if ($coloumn == false) {
        $query = "SELECT * FROM $table";
    } else {
        $query = "SELECT $coloumn FROM $table";
    }

    $result = mysqli_query($conn, $query);

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
