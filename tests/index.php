<?php
require __DIR__ . '/../protected/autoload.php';

//$data = \Models\Article::findById(2);

$news1 = new \Models\Article();
//$news1->lead= "qweqweqweasdas";
//$news1->author =  "Vasya";
//$news1->title ='bomb' ;
//
//$data = $news1->insert();



$news1->id = 57;
$news1->title ='321';
$news1->lead= "text";
$news1->author =  "123";

$data =  $news1->update();

var_dump($data);