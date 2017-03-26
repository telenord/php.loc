<?php

namespace Models;


abstract class Model
{
    protected const TABLE = null;
    public $id;

    public static function findAll()
{
    $db = new \Db();
    $sql = 'SELECT * FROM ' . static::TABLE;
    return $db->query($sql, static::class);
}

    public static function findById(int $id)
    {
        $db = new \Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=?';
        $res = $db->query($sql, static::class, [$id]);

        return empty($res) ? false : $res;

    }

    public static function findByLimit(int $limit)
    {
        $db = new \Db();
        $sql = 'SELECT * FROM ' . static::TABLE . '  ORDER BY id DESC LIMIT ?';

        $res = $db->query($sql, static::class, [$limit]);

        return empty($res) ? false : $res;

    }


    public   function insert(array $data = [])
    {

        var_dump(get_object_vars($this));
        $db = new \Db;
        $sql = 'INSERT INTO ' . static::TABLE . ' SET ';

        return $db->execute($sql,  $data );
    }


}