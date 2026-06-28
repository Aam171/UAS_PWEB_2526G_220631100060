<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data - PustakaDigital</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="hero-section" style="padding-bottom: 15px; margin-bottom: 25px;">
            <h1 style="font-size: 2rem;">A.PUSTAKA</h1>
            <p>Manajemen Koleksi Buku A.PUSTAKA </p>
        </div>

        <div class="nav">
            <a href="index.php">Beranda</a>
            <a href="daftar.php" class="active">Daftar Data</a>
            <a href="tambah.php">Tambah Data</a>
        </div>

        <div style="background: #ffffff; padding: 20px; border-radius: 12px; border: 1px solid #e2e8f0;">
            <h2 style="text-align: left; font-size: 1.25rem; color: #1e293b; margin-bottom: 15px; border-bottom: 2px solid #f1f5f9; padding-bottom: 10px;">Daftar Seluruh Buku</h2>
            
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM buku ORDER BY id DESC";
                    $result = mysqli_query($conn, $query);
                    $no = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td style='font-weight: 600;'>" . formatJudul($row['judul']) . "</td>";
                        echo "<td>" . $row['penulis'] . "</td>";
                        echo "<td>" . $row['penerbit'] . "</td>";
                        echo "<td>" . $row['tahun_terbit'] . "</td>";
                        echo "<td>" . getBadgeStatus($row['status']) . "</td>";
                        echo "<td>
                                <a href='edit.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>
                                <a href='hapus.php?id=" . $row['id'] . "' class='btn btn-delete' onclick='return confirm(\"Yakin ingin menghapus data buku ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>