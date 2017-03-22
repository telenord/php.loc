<?php
require_once __DIR__ . '\..\Article.php';

$data = Article::findById(2);
var_dump($data);

$news1 = [ 'id'=>'5',   'lead'=>'qweqweqweasdas aWEF', 'author'=> 'Vasya', 'title'=>'bomb' ];

$data = Article::add($news1);
