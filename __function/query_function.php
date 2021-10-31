<?php
/// fungsi untuk memasukan data register kedalam database tabel 'customer' dengan parameter ($username, $email, $password, $ttl, $alamat, $id_provinsi, $id_kota, $no_HP, $paypal_ID, $gender, $date_created)
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

/// fungsi untuk menampilkan semua data dari database tabel tertentu dengan parameter (nama tabel, kolom{opsional})
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

/// fungsi untuk menampilkan data spesifik saja dari database dengan parameter (nama tabel, kolom spesifik, nilai spesifik)
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

/// fungsi untuk menampilkan spesifik item beserta kategorinya dari database yang mempunyai parameter (id tabel item)
function item_detail($id_item)
{
    global $conn;
    $query = "SELECT item.id, item.id_kategori, item.nama, item.harga, item.picture, item.deskripsi, item_kategori.id, item_kategori.kategori FROM item
INNER JOIN item_kategori ON item.id_kategori = item_kategori.id WHERE item.id=$id_item";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Query Error : ' . mysqli_errno($conn) .
            ' - ' . mysqli_error($conn));
    } else {
        return $result;
    }
}

/// fungsi untuk menampilkan detail data item yang lebih spesifik beserta kategorinya dari database yang mempunyai parameter (id customer)
function belanja($id_customer)
{
    global $conn;
    $query = "SELECT item.id, item.id_kategori, item.nama, item.harga, item.picture, item.deskripsi, item_kategori.kategori, customer_cart.id_item, customer_cart.id_customer, customer_cart.jumlah, customer_cart.sub_total_harga, customer_cart.tgl_input, customer.alamat, customer.no_HP, customer.paypal_ID
    FROM item
    INNER JOIN item_kategori ON item.id_kategori = item_kategori.id
    INNER JOIN customer_cart ON item.id = customer_cart.id_item
    INNER JOIN customer ON customer_cart.id_customer = customer.id
    WHERE customer_cart.id_customer = '$id_customer' AND customer_cart.status = '0'
    ";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Query Error : ' . mysqli_errno($conn) .
            ' - ' . mysqli_error($conn));
    } else {
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
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

/// fungsi untuk menambahkan item yang dipilih ke keranjang customer tertentu kedalam database tabel 'customer_cart' yang mempunyai parameter (id customer, harga item, id item)
function add_cart($id_item, $harga_item, $id)
{
    global $conn;

    $query = "INSERT INTO `customer_cart` (`id_customer`, `id_item`, `jumlah`, `sub_total_harga`, `status`) VALUES ($id,$id_item,1,$harga_item,0)";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Query Error : ' . mysqli_errno($conn) .
            ' - ' . mysqli_error($conn));
    } else {
        $_SESSION['pesan'] = "Berhasil menaruh item ke keranjang"; // taruh ke session
        header("Location: ../index.php");
    }
}

/// fungsi untuk menghapus item dari keranjang customer tertentu dari database tabel 'customer_cart' yang mempunyai parameter (id customer dam id item)
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

/// fungsi untuk mengupdate item dari keranjang customer tertentu dari database tabel 'customer_cart' yang mempunyai parameter (id customer dam status)
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

/// fungsi untuk mencetak item dari keranjang customer tertentu dari database tabel 'customer_bill' yang mempunyai parameter ($id_customer, $list_id_item, $total_harga, $shp_id_kota)
function cetak_bill($id_customer, $list_id_item, $total_harga, $shp_id_kota)
{
    global $conn;
    $shp_id_provinsi = 11;
    $date_created = date("Y-m-d H:i:s");
    $query = "INSERT INTO `customer_bill`(`id_customer`, `date_created`, `list_id_item`, `total_harga`, `shp_id_provinsi`, `shp_id_kota`, `status`) 
    VALUES ('$id_customer','$date_created','$list_id_item','$total_harga','$shp_id_provinsi','$shp_id_kota','1')";
    return mysqli_query($conn, $query);
}
