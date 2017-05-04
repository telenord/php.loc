<?php
require __DIR__ . '\..\protected\autoload.php';


if(isset($_POST['save'])){
    $article =  \Models\Article::findById((int)$_GET['id']);

    $article->lead = htmlspecialchars( $_POST['lead'] );
    $article->author = htmlspecialchars( $_POST['author'] );
    $article->title = htmlspecialchars( $_POST['title'] );

    $article ->save();

    unset($_POST);
    header('location: \admin\index.php');
}



if( isset($_GET['action'])){

    if($_GET['action'] =='del' )
    {
        $article = \Models\Article::delete( (int) $_GET['id']);
        unset($_GET);
        header('location: \admin\index.php');
    }

    if($_GET['action']=='new'){
        include __DIR__ . '\template\new.html';
    }

    if($_GET['action']=='edit'){

        $article = \Models\Article::findById( (int) $_GET['id']);

        include __DIR__ . '\template\edit.html';

    }


} else {

    $news = \Models\Article::findAll();
    include __DIR__ . '\template\index.html';

 }

