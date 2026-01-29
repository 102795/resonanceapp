<?php

    $db = new PDO(
        "mysql:host=localhost:3306;dbname=resonance;charset=utf8",
        "resonance-admin",
        "VlQsyQ2gucqh08"
    );
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuws – Resonance</title>
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

        <div class="sidebar-item">
            <div class="sidebar-icon"></div>
            <span>album</span>
        </div>

        <div class="sidebar-item">
            <div class="sidebar-icon"></div>
            <span>artiest</span>
        </div>

        <div class="sidebar-item">
            <div class="sidebar-icon"></div>
            <span>playlist</span>
        </div>
    </aside>


    <section>

        
        <div class="article-container">

      
            <div class="article-thumbnail" style="background-image:url('images/news1.jpg');"></div>

           
            <div class="article-title">Titel van het nieuwsartikel</div>

           
            <div class="article-meta">Gepubliceerd op 12-02-2025 · door Redactie Resonance</div>

           
            <div class="article-content">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Dit is een voorbeeldtekst voor het nieuwsartikel. 
                Hier komt de volledige inhoud uit de database.
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
