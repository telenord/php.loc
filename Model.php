<?php

abstract class Model
{
      const TABLE = null;
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


    public static function add ($data = [])
    {
        $db = new Db;
        $set = '';
        if(!empty($data))
        {
            foreach($data as $field)
            {
                $set .= "`". $field . "`" . "=:$field, ";
            }
             $set = substr($set, 0, -2);
        }

        $sql = 'INSERT INTO ' . static::TABLE . ' SET ' . $set;

        var_dump($sql);


        return $db->query($sql);
    }


}