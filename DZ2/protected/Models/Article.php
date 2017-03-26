<?php

namespace Models;

class Article
    extends Model
{
    protected const TABLE = 'articles';


    public $title;
    public $lead;
}