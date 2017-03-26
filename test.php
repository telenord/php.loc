<?php
require __DIR__ . '/protected/autoload.php';


$str = '\Models\Article';
$str2 = str_replace('\\', '/', $str);

$str3 = explode('/', $str2);


$data = \Models\Article::findById(2);


echo '<br>';
echo '<br>';
$data = \Models\Article::findByLimit(3);
var_dump($data);

//$data = \Models\Article::findAll();
//var_dump($data);
//echo '<br>';
//
//$news1 = new Article();
//$news1->lead ='В Австралии открыли спа-центр для младенцев';
////$news1->text ='В австралийском городе Перт открыли спа-центр для детей от двух дней до шести месяцев.';
////
////$data = Article::addArticle($news1);
//
//
//$data = Article::findById(2);
//var_dump($data);
//
//$news1 = ['lead'=>"qweqweqweasdas aWEF", 'author'=> "Vasya", 'title'=>'bomb' ];
//
//$data = \Models\Article::insert($news1);
//
//
//var_dump($data);