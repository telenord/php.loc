<?php
require_once __DIR__ . '/Db.php';
require_once __DIR__ . '/Model.php';

class Article
    extends Model
{
    protected  const TABLE = 'articles';
    public $id;
    public $author;
    public $title;
    public $lead;

}