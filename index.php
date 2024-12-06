<?php
include 'database.php';

$articles = getArticles($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>aranboy</title>
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="header">
    <div class="header-bar">
      <h1>Aran Japan</h1>
      <nav class="navigation">
        <ul>
          <li><a href="#">News</a></li>
          <li><a href="#">Japan Travel</a></li>
          <li><a href="#">Entertainment</a></li>
          <li><a href="#">Anime Manga</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <section class="main-content">
        <h2>Berita Jepang Hari Ini</h2>
        <div class="articles">
          <article>
            <img src="https://thumb.viva.co.id/media/frontend/thumbs3/2022/12/08/639156b3d5dc8-spy-x-family_1265_711.jpg" alt="SPYxFAMILY">
            <h3>Kafe Kolaborasi SPYxFAMILY segera Dibuka di Yokohama</h3>
            <p class="date">October 20, 2024</p>
            <p class="description">
            <a href="article-detail.php?id=1">
           
            </p>
          </article>
          <article>
            <img src="https://media.japanesestation.com/images/750x422/2024/10/19/33733-urban-legend-taxi.jpg" alt="Haunted Taxi">
            <h3>Uji Nyali Lewat Tur Horor Tokyo Urban Myth: The Haunted Taxi</h3>
            <p class="date">October 20, 2024</p>
            <p class="description">
            <a href="article-detail.php?id=2">
    
            </p>
          </article>
          <article>
            <img src="https://media.japanesestation.com/images/750x422/2021/01/15/12986-omakase.jpg" alt="Omakase">
            <h3>5 Restoran Omakase Lezat yang Bisa Kamu Temukan di Tokyo</h3>
            <p class="date">October 20, 2024</p>
            <p class="description">
            <a href="article-detail.php?id=3">
           
            </p>
          </article>
          <article>
            <img src="https://media.japanesestation.com/images/750x422/2024/10/19/17783-paypay.jpg" alt="PayPay">
            <h3>Perusahaan di Jepang Mulai Bayarkan Gaji Karyawan Lewat PayPay</h3>
            <p class="date">October 20, 2024</p>
            <p class="description">
            <a href="article-detail.php?id=4">
             
            </p>
          </article>
          <article>
            <img src="https://media.japanesestation.com/images/750x422/2024/10/18/10388-jujutsu-kaisen-cafe-shibuya-incident-2024.jpg" alt="Jujutsu Kaisen">
            <h3>Kafe Bertema Jujutsu Kaisen akan Dibuka di Tokyo, Osaka dan Nagoya</h3>
            <p class="date">October 20, 2024</p>
            <p class="description">
            <a href="article-detail.php?id=5">
            
            </p>
          </article>
          <article>
            <img src="https://media.japanesestation.com/images/750x422/2024/10/24/63349-demon-slayer-kimetsu-no-yaiba-hashira-exhibition-event-visual.jpg" alt="Demon Slayer">
            <h3>Demon Slayer: Kimetsu no Yaiba Exhibition 2024–2025 Pamerkan Pesona Para Pilar</h3>
            <p class="date">October 20, 2024</p>
            <p class="description">
            <a href="article-detail.php?id=6">
            
            </p>
          </article>
          <article>
            <img src="https://media.japanesestation.com/images/750x422/2024/10/07/98003-pemandangan-rel-kereta-yang-tenggelam-di-danau-shikaribetsu.jpg" alt="Gibli">
            <h3>Mengintip Rel Kereta Api Ikonik di Danau Shikaribetsu, Benarkah Mirip dengan FIlm Ghibli?</h3>
            <p class="date">October 20, 2024</p>
            <p class="description">
            <a href="article-detail.php?id=7">
            
            </p>
          </article>
          <article>
            <img src="https://media.japanesestation.com/images/750x422/2024/11/13/80385-yuru-camp-key-visual-yang-menampilkan-pemandangan-gunung-fuji-studio-s-station.jpg" alt="Yuru Camp">
            <h3>5 Tempat dalam Anime Yuru Camp yang Wajib Dikunjungi</h3>
            <p class="date">October 20, 2024</p>
            <p class="description">
            <a href="article-detail.php?id=8">
            
  <div class="articles">
  <?php foreach ($articles as $article): ?>
  <article>
  <a href="article-detail.php?id=<?= htmlspecialchars($article['id']) ?>">
      <img src="<?= htmlspecialchars($article['image_url']) ?>" alt="<?= htmlspecialchars($article['alt_text']) ?>">
      <h3><?= htmlspecialchars($article['title']) ?></h3>
    </a>
    <p class="date"><?= date("F d, Y", strtotime($article['publication_date'])) ?></p>
    <p class="description"><?= htmlspecialchars($article['description']) ?></p>
  </article>
  <?php endforeach; ?>
</div>
  <footer>
    <p>&copy; 2024 Aran Japan</p>
  </footer>
</body>
</html>