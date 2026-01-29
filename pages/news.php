<?php
$db = new PDO(
    "mysql:host=localhost:3306;dbname=resonance;charset=utf8",
    "resonance-admin",
    "VlQsyQ2gucqh08"
);


$id = $_GET['id'] ?? null;

if (!$id) {
    die("Geen artikel ID opgegeven.");
}


$stmt = $db->prepare("SELECT * FROM news_articles WHERE article_id = ?");
$stmt->execute([$id]);
$article = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$article) {
    die("Artikel niet gevonden.");
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($article['title']) ?> – Resonance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/news.css">
</head>

<body>

<header class="topbar">
    <div class="topbar-left">
        <div class="icon-btn">&#8592;</div>
        <div class="icon-btn">&#8594;</div>
        <div class="icon-btn">&#8962;</div>
        <span class="logo">Resonance</span>
    </div>

    <div class="topbar-right">
        <div class="icon-btn">&#128269;</div>
        <div class="icon-btn">&#127760;</div>
    </div>
</header>

<main class="layout">

    <aside class="sidebar">
        <div class="sidebar-title">Saved</div>

        <div class="sidebar-item"><div class="sidebar-icon"></div><span>album</span></div>
        <div class="sidebar-item"><div class="sidebar-icon"></div><span>artiest</span></div>
        <div class="sidebar-item"><div class="sidebar-icon"></div><span>playlist</span></div>
    </aside>

    <section>

        <div class="article-container">

           
            <div class="article-thumbnail" 
                 style="background-image:url('images/<?= htmlspecialchars($article['thumbnail_url']) ?>');">
            </div>

            <div class="article-title">
                <?= htmlspecialchars($article['title']) ?>
            </div>

      
            <div class="article-meta">
                Gepubliceerd op <?= date('d-m-Y', strtotime($article['published_at'])) ?> 
                · door <?= htmlspecialchars($article['author']) ?>
            </div>

           
            <div class="article-content">
                <?= nl2br(htmlspecialchars($article['content'])) ?>
            </div>

        </div>

        <div class="now-playing">
            <div class="np-left">
                <div class="np-cover"></div>
                <div class="np-text">
                    <div class="np-title">songtitel</div>
                    <div class="np-artist">artiest</div>
                </div>
            </div>

            <div class="np-controls">
                <span>&#8592;</span>
                <span>&#10074;&#10074;</span>
                <span>&#8594;</span>
            </div>

            <div class="np-time">00:00 / 03:51</div>
        </div>

    </section>
</main>

</body>
</html>
