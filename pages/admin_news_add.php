<?php

$db = new PDO(
    "mysql:host=localhost;dbname=resonance;charset=utf8",
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
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Admin – Nieuws toevoegen</title>
    <style>
        body {
            background: #050816;
            color: #fff;
            font-family: Arial, sans-serif;
            padding: 30px;
        }

        h1 {
            margin-bottom: 20px;
        }

        form {
            background: #0b1020;
            padding: 20px;
            border-radius: 12px;
            width: 500px;
        }

        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border-radius: 8px;
            border: none;
            background: #151b2c;
            color: #fff;
        }

        textarea {
            height: 150px;
        }

        button {
            margin-top: 20px;
            padding: 12px 20px;
            background: #1f2a3d;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        .message {
            margin-bottom: 20px;
            padding: 12px;
            background: #1f2a3d;
            border-radius: 8px;
        }
    </style>
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

</body>
</html>
