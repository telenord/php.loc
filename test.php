<?php
require_once __DIR__ . '/Article.php';

$data = Article::findAll();
var_dump($data);
echo '<br>';

$news1 = new Article();
$news1->lead ='В Австралии открыли спа-центр для младенцев';
//$news1->text ='В австралийском городе Перт открыли спа-центр для детей от двух дней до шести месяцев.';
//
//$data = Article::addArticle($news1);