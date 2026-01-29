<?php

    $db = new PDO(
        "mysql:host=localhost:3306;dbname=resonance;charset=utf8",
        "resonance-admin",
        "VlQsyQ2gucqh08"
    );




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

// DELETE
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

// ALLE ARTIKELEN OPHALEN
$all = $db->query("SELECT * FROM news_articles ORDER BY published_at DESC");
$all_articles = $all->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Admin – Nieuws toevoegen</title>
    <link rel="stylesheet" href="../styles/admin.css">
</head>
<body>

<h1>Nieuwsartikel toevoegen</h1>

<?php if (!empty($message)): ?>
    <div class="message"><?= $message ?></div>
<?php endif; ?>

<form method="POST">

    <label>Titel</label>
    <input type="text" name="title" required>

    <label>Tag (bijv. Festival, Interview, Release)</label>
    <input type="text" name="tag" required>

    <label>Thumbnail URL (bijv. images/news1.jpg)</label>
    <input type="text" name="thumbnail_url" required>

    <label>Leestijd (in minuten)</label>
    <input type="number" name="read_time" required>

    <label>Auteur</label>
    <input type="text" name="author" required>

    <label>Volledige tekst</label>
    <textarea name="content" required></textarea>

    <button type="submit">Artikel opslaan</button>

    

</form>
<h2 style="margin-top:40px;">Bestaande artikelen</h2>

<table style="width:100%; margin-top:20px; border-collapse: collapse;">
    <tr style="background:#1f2a3d;">
        <th style="padding:10px; text-align:left;">Titel</th>
        <th style="padding:10px; text-align:left;">Tag</th>
        <th style="padding:10px; text-align:left;">Datum</th>
        <th style="padding:10px; text-align:left;">Acties</th>
    </tr>

    <?php foreach ($all_articles as $a): ?>
        <tr style="background:#0b1020; border-bottom:1px solid #1f2a3d;">
            <td style="padding:10px;"><?= htmlspecialchars($a['title']) ?></td>
            <td style="padding:10px;"><?= htmlspecialchars($a['tag']) ?></td>
            <td style="padding:10px;"><?= date('d-m-Y', strtotime($a['published_at'])) ?></td>
            <td style="padding:10px;">
                <a href="pages/news.php?id=<?= $a['article_id'] ?>" 
                   style="color:#4fa3ff; margin-right:10px;">Bekijken</a>

                <a href="admin_edit.php?id=<?= $a['article_id'] ?>" 
                   style="color:#ffc107; margin-right:10px;">Bewerken</a>

                <a href="admin.php?delete=<?= $a['article_id'] ?>" 
                   onclick="return confirm('Weet je zeker dat je dit artikel wilt verwijderen?');"
                   style="color:#ff4f4f;">Verwijderen</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>


</body>
</html>
