<?php
require_once __DIR__ . '\..\Article.php';

$data = Article::findById(2);
var_dump($data);



$data = Article::add(2);
var_dump($data);