<?php
include 'koneksi.php';

// Form Processing (GET)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM buku WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='daftar.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='daftar.php';</script>";
    }
}
?>