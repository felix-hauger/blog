<?php



if (!isset($_GET['id'])) {
    header('Location: index.php');
    die();
} else {
    require_once 'class/DbConnection.php';
    require_once 'class/Article.php';

    $article = new Article();
    $article->get($_GET['id']);

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once 'elements/header.php' ?>
    <article>
        <h2><?= $article->getTitle() ?></h2>
        <p><?= $article->getContent() ?></p>
    </article>
    <?php require_once 'elements/footer.php' ?>
    
</body>
</html>