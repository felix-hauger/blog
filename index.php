<?php
require_once 'class/DbConnection.php';
require_once 'class/Article.php';

$art = new Article();

$articles = $art->getAll();

// var_dump($articles);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <?php require_once 'elements/header.php' ?>
    <h1>Accueil</h1>
    <?php foreach ($articles as $article) : ?>
        <h2><a href="article.php?id=<?= $article['id'] ?>"><?= $article['title'] ?></a></h2>
    <?php endforeach ?>
    <?php require_once 'elements/footer.php' ?>
</body>
</html>