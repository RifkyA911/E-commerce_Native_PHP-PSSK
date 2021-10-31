<?php
function register_customer($username, $email, $password, $ttl, $alamat, $id_provinsi, $id_kota, $no_HP, $paypal_ID, $gender, $date_created)
{
    global $conn;

    $query = "INSERT INTO `customer` (`username`, `email`, `password`, `ttl`, `alamat`, `id_provinsi`, `id_kota`, `no_HP`, `paypal_ID`, `gender`, `date_created`, `picture`) 
VALUES ('$username', '$email', '$password', '$ttl', '$alamat', '$id_provinsi', '$id_kota', '$no_HP', '$paypal_ID', '$gender', '$date_created', 'default.jpg')";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Query Error : ' . mysqli_errno($conn) .
            ' - ' . mysqli_error($conn));
    } else {
        echo "<h2>Berhasil membuat akun</h2><a href='..\login.php'>login</a>"; // taruh ke session
    }

    return $result;
}

function get_all_data($table, $coloumn = false)
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
function get_spesific_data($table, $coloumn, $value)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE $coloumn='$value'";

    $result = mysqli_query($conn, $query);

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function belanja($id_user)
{
    global $conn;
    $query = "SELECT item.id, item.id_kategori, item.nama, item.harga, item.picture, item.deskripsi, item_kategori.kategori, customer_cart.id_item, customer_cart.id_customer, customer_cart.jumlah, customer_cart.sub_total_harga, customer_cart.tgl_input, customer.alamat, customer.no_HP, customer.paypal_ID
    FROM item
    INNER JOIN item_kategori ON item.id_kategori = item_kategori.id
    INNER JOIN customer_cart ON item.id = customer_cart.id_item
    INNER JOIN customer ON customer_cart.id_customer = customer.id
    WHERE customer_cart.id_customer = '$id_user' AND customer_cart.status = '0'
    ";
    $result = mysqli_query($conn, $query);

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// function update_cart($id)
// {
//     global $conn;
//     $query = "UPDATE customer_cart SET jumlah ='$id' WHERE id_user='$id_user'";
//     $result = mysqli_query($conn, $query);

//     if (!$result) {
//         die('Query Error : ' . mysqli_errno($conn) .
//             ' - ' . mysqli_error($conn));
//     } else {
//         echo "<h2>Berhasil</h2><a href='..\index.php'>login</a>"; // taruh ke session
//     }
// }

function hapus_cart($id_customer, $id_item)
{
    global $conn;
    $query = "DELETE FROM customer_cart WHERE id_customer ='$id_customer' AND id_item = '$id_item' AND status = '0'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Query Error : ' . mysqli_errno($conn) .
            ' - ' . mysqli_error($conn));
    } else {
        echo "<h2>Berhasil</h2><a href='..\index.php'>login</a>"; // taruh ke session
    }
}

function update_status_cart($id_customer, $status)
{
    global $conn;
    $query = "UPDATE customer_cart SET customer_cart.status ='$status' WHERE id_customer='$id_customer'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Query Error : ' . mysqli_errno($conn) .
            ' - ' . mysqli_error($conn));
    } else {
        echo "<h2>Berhasil</h2><a href='..\index.php'>login</a>"; // taruh ke session
    }
}

function cetak_bill($id_customer, $list_id_item, $total_harga, $shp_id_kota)
{
    global $conn;
    $shp_id_provinsi = 11;
    $date_created = date("Y-m-d H:i:s");
    $query = "INSERT INTO `customer_bill`(`id_customer`, `date_created`, `list_id_item`, `total_harga`, `shp_id_provinsi`, `shp_id_kota`, `status`) 
    VALUES ('$id_customer','$date_created','$list_id_item','$total_harga','$shp_id_provinsi','$shp_id_kota','1')";
    return mysqli_query($conn, $query);
}
