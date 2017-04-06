<?php
require __DIR__ . '/../protected/autoload.php';

//$data = \Models\Article::findById(2);
//var_dump($data);

$news1 = new \Models\Article();
//$news1->lead= "Здесь был слон";
//$news1->author =  "Vasya";
//$news1->title ='Ура' ;
//
//$data = $news1->insert();
//var_dump($data);

//
//$news1->id = 56;
//$news1->title ='Новый заголовок2';
//$news1->lead= "Новый текст";
//$news1->author =  "Автор поменялся1";
//
//$data =  $news1->update();

//var_dump($data);


//$data =  \Models\Article::delete(65);
//
//var_dump($data);

$data = \Models\Article::findByLimit(3);
var_dump($data);