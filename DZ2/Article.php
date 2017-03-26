<?php

require __DIR__ . '\protected\autoload.php';

if( null !==($_GET['id'])) {


    $article = \Models\Article::findById($_GET['id']);

    if(false !== $article){ ?>

    <h1><?php echo $article[0]->title; ?></h1>
    <h4> <?php echo $article[0]->author; ?></h4>
    <p><?php echo $article[0]->lead; ?></p>

    <?php }

} else {
    $news = \Models\Article::findByLimit(3);
    ?>
    <h2>Новости</h2>
    <ul>
    <?php foreach ( $news as $article){ ?>
         <li><a href=" <?php echo "/article.php?id=" . $article->id; ?> "> <?php echo $article->title; ?> </a></li>
    <?php } ?>
    </ul>
    <?php
}

