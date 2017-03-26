<?php
require  __DIR__ . '/../protected/autoload.php';

$data = \Models\Article::findById(2);
var_dump($data);

//$news1 = ['lead'=>"qweqweqweasdas aWEF", 'author'=> "Vasya", 'title'=>'bomb' ];
//
//$data = \Models\Article::insert($news1);
//
//
//var_dump($data);