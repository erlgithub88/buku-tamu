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


// function tambah data
function tambah_tamu($data)
 {
    global $koneksi;

    $kode = htmlspecialchars($data['id_tamu']);
    $tanggal = date('Y-m-d');
    $nama_tamu = htmlspecialchars($data['nama_tamu']);
    $alamat = htmlspecialchars($data['alamat']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $bertemu = htmlspecialchars($data['alamat']);
    $kepentingan = htmlspecialchars($data['kepentingan']);
   
    $query = "INSERT INTO buku_tamu VALUES ('$kode', '$tanggal', '$nama_tamu', '$alamat', '$no_hp', '$bertemu', '$kepentingan')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

