<?php

function __autoload($class)
{
    require __DIR__ . 'autoload.php/' . str_replace('\\', '/', $class) . '.php';
}