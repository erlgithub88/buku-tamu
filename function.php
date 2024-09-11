<?php
//PANGGIL FILE KONEKSI.
require_once('koneksi.php');

//MEMBUAT QUERY KE / DARI DATABASE
function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}