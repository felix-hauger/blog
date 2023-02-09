<?php

if (isset($_POST['submit'])) {
    require_once 'class/DbConnection.php';
    require_once 'class/Article.php';

    $title = htmlspecialchars(trim($_POST['title']), ENT_QUOTES, 'UTF-8');
    $content = htmlspecialchars(trim($_POST['content']), ENT_QUOTES, 'UTF-8');

    $new_article = new Article();

    $new_article
        ->setTitle($title)
        ->setContent($content);

    $new_article->create();

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvel Article</title>
</head>
<body>
    <?php require_once 'elements/header.php' ?>
    <h1>Nouvel article</h1>
    <form method="post">
        <input type="text" name="title" placeholder="Titre">
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <input type="submit" name="submit" value="Créer">
    </form>
    <?php require_once 'elements/footer.php' ?>
</body>
</html>