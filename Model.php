<?php

abstract class Model
{
    protected  const TABLE = null;
    public $id;
    public static function findAll()
    {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, static::class);
    }

    public static function findById($id)
    {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=?';
        $res = $db->query($sql, static::class, [$id]);

        return empty($res) ? false : $res;

    }


    public static function add($data = [])
    {
        $db = new Db;
        $sql = 'INSERT INTO ' . static::TABLE ;

        return $db->execute($sql, $data );
    }


}