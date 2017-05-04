<?php

require __DIR__ . '\protected\autoload.php';

if( null !==($_GET['id'])) {

    $article = \Models\Article::findById($_GET['id']);

    if(false !== $article){
        include __DIR__ . '\template\article.html';
   }

} else {
    $news = \Models\Article::findByLimit(3);

    include __DIR__ . '\template\index.html';
}