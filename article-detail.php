<?php
// Sertakan koneksi database
include 'database.php';

// Validasi apakah ID ada dalam URL
if (isset($_GET['id'])) {
    $articleId = intval($_GET['id']); // Pastikan ID adalah integer

    // Ambil artikel berdasarkan ID
    $query = $conn->prepare("SELECT * FROM articles WHERE id = ?");
    $query->bind_param("i", $articleId);
    $query->execute();
    $result = $query->get_result();

    // Cek apakah artikel ditemukan
    if ($result->num_rows > 0) {
        $article = $result->fetch_assoc();
    } else {
        // Tampilkan pesan error jika artikel tidak ditemukan
        http_response_code(404);
        echo "<h1>Article not found</h1>";
        exit;
    }
} else {
    // Tampilkan pesan error jika ID tidak ada
    http_response_code(400);
    echo "<h1>Invalid request</h1>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($article['title']) ?></title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #1a1c2c; /* Latar belakang biru tua */
            color: #f5f5f5; /* Teks putih */
        }

        header {
            background-color: #3b415a; /* Header biru keabu-abuan */
            padding: 15px;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        header h1 {
            font-size: 28px;
            color: #ffffff;
        }

        img {
            display: block;
            margin: 20px auto; /* Pusatkan gambar */
            max-width: 70%; /* Maksimum lebar gambar 70% dari layar */
            height: auto; /* Pertahankan proporsi gambar */
            border-radius: 8px; /* Sedikit membulatkan tepi gambar */
        }

        .content {
            padding: 30px;
            line-height: 1.8;
        }

        .content .date {
            font-size: 16px;
            color: #cccccc; /* Teks abu-abu terang untuk tanggal */
            margin-bottom: 20px;
        }

        .content p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        footer {
            background-color: #3b415a;
            text-align: center;
            padding: 10px;
            color: #ffffff;
            font-size: 14px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        @media (max-width: 768px) {
            header h1 {
                font-size: 24px;
            }

            .content p {
                font-size: 16px;
            }

            img {
                max-width: 90%; /* Gambar lebih kecil pada perangkat kecil */
            }
        }
    </style>
</head>
<body>
    <header>
        <h1><?= htmlspecialchars($article['title']) ?></h1>
    </header>
    <main>
        <img src="<?= htmlspecialchars($article['image_url']) ?>" alt="<?= htmlspecialchars($article['alt_text']) ?>">
        <div class="content">
            <p class="date"><?= date("F d, Y", strtotime($article['publication_date'])) ?></p>
            <p><?= nl2br(htmlspecialchars($article['description'])) ?></p>
            <p><?= nl2br(htmlspecialchars($article['content TEXT'])) ?></p>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Aran Japan</p>
    </footer>
</body>
</html>
