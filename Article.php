<?php
require_once __DIR__ . '/Db.php';
require_once __DIR__ . '/Model.php';

class Article
    extends Model
{
      const TABLE = 'articles';
    public $id;
    public $title;
    public $lead;
}