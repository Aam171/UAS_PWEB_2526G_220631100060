<?php
// 1. Variabel
$host = "localhost";
$user = "root";
$pass = "";
$db   = "uas_pweb";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// 4. Function (Fungsi 1: Format penulisan judul)
function formatJudul($judul) {
    return ucwords(strtolower($judul));
}

// 4. Function & 2. Percabangan (Fungsi 2: Memberi warna pada status buku)
function getBadgeStatus($status) {
    if ($status == 'Tersedia') {
        return "<span class='badge-success'>$status</span>";
    } else {
        return "<span class='badge-warning'>$status</span>";
    }
}
?>