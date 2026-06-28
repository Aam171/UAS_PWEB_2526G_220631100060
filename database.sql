CREATE DATABASE IF NOT EXISTS uas_pweb;
USE uas_pweb;

CREATE TABLE IF NOT EXISTS buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    penulis VARCHAR(255) NOT NULL,
    penerbit VARCHAR(255) NOT NULL,
    tahun_terbit INT(4) NOT NULL,
    status VARCHAR(50) NOT NULL
);

-- Menyisipkan minimal 5 record data awal
INSERT INTO buku (judul, penulis, penerbit, tahun_terbit, status) VALUES
('Belajar PHP Native', 'Budi Raharjo', 'Informatika', 2021, 'Tersedia'),
('Pemrograman Web HTML & CSS', 'Rinaldi', 'Andi Publisher', 2020, 'Tersedia'),
('Mastering MySQL', 'John Doe', 'Tech Press', 2019, 'Dipinjam'),
('Logika Algoritma', 'Siti Aminah', 'Erlangga', 2022, 'Tersedia'),
('Sistem Basis Data', 'Fathansyah', 'Informatika', 2018, 'Dipinjam');