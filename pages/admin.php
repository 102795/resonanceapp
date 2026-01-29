<?php

    $db = new PDO(
        "mysql:host=localhost:3306;dbname=resonance;charset=utf8",
        "resonance-admin",
        "VlQsyQ2gucqh08"
    );





if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $stmt = $db->prepare("DELETE FROM news_articles WHERE article_id = ?");
    $stmt->execute([$delete_id]);

    header("Location: admin.php?deleted=1");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $tag = $_POST['tag'];
    $thumbnail_url = $_POST['thumbnail_url'];
    $read_time = $_POST['read_time'];
    $author = $_POST['author'];
    $content = $_POST['content'];

    $stmt = $db->prepare("
        INSERT INTO news_articles (title, tag, thumbnail_url, read_time, author, content, published_at)
        VALUES (?, ?, ?, ?, ?, ?, NOW())
    ");

    $stmt->execute([
        $title,
        $tag,
        $thumbnail_url,
        $read_time,
        $author,
        $content
    ]);

    $message = "Artikel succesvol toegevoegd!";
}

$all = $db->query("SELECT * FROM news_articles ORDER BY published_at DESC");
$all_articles = $all->fetchAll(PDO::FETCH_ASSOC);
