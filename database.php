<?php
// Konfigurasi database
$host = "localhost";
$username = "root";
$password = "";
$database = "ujian3";

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk mengambil semua artikel
function getArticles($conn) {
    $sql = "SELECT * FROM articles ORDER BY publication_date DESC";
    $result = $conn->query($sql);

    $articles = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }
    }
    return $articles;
}
?>
