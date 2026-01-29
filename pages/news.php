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
    <title><?= htmlspecialchars($article['title']) ?></title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>

<h1><?= htmlspecialchars($article['title']) ?></h1>

<p><strong><?= htmlspecialchars($article['tag']) ?></strong></p>

<p>
    <?= date('d-m-Y', strtotime($article['published_at'])) ?> ·
    <?= htmlspecialchars($article['read_time']) ?> min lezen
</p>

<img src="../<?= htmlspecialchars($article['thumbnail_url']) ?>" style="max-width:400px;">

<p><?= nl2br(htmlspecialchars($article['content'])) ?></p>

</body>
</html>
