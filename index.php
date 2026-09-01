<?php

require __DIR__ . "/database.php";

$posts = $pdo->query("SELECT * FROM news_posts ORDER BY posted_on DESC LIMIT 3")->fetchAll();

require __DIR__ . "/views/index.view.php";