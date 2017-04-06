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
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $res = $db->query($sql, static::class, [':id' => $id]);

        return empty($res) ? false : $res[0];

    }

    public static function findByLimit(int $limit)
    {
        $db = new \Db();
        $sql = 'SELECT * FROM ' . static::TABLE . '  ORDER BY id DESC LIMIT :limit';


        $res = $db->queryLimit($sql, static::class,  $limit );

        return $res;

    }

    public function insert()
    {
        // @todo: изучить! var_dump(get_object_vars($this));

        $fields = get_object_vars($this);

        $columns = [];
        $params  = [];
        $data    = [];
        foreach ($fields as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $columns[] = $name;
            $params[]  = ':' . $name;
            $data[':' . $name] = $value;
        }
        $sql = 'INSERT INTO ' . static::TABLE . ' (' . implode(', ',$columns) . ') 
            VALUES (' . implode(', ',$params) . ')';

        $db = new \Db();
        $res = $db->insert($sql, $data);

        if(false !== $res){

            return $this->id = $res;
        }

        return $res;

    }


    public function update()
    {
        $fields = get_object_vars($this);
        $columns = [];
        $data    = [];

        foreach ($fields as $name => $value) {
            if ('id' == $name) {
                $data[':' . $name] =   $value;
                continue;
            }

            $columns[] = $name . ' = :' . $name;
            $data[':' . $name] = $value;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET  ' . implode(', ',$columns) . ' WHERE id = :id';

        $db = new \Db();

        return $db->execute($sql, $data);

    }


    public function save()
    {
        if ( is_int($this->id )) {
              $this->update();
        } else {
            $this->insert();
        }
    }

    public static function delete(int $id)
    {
        $db = new \Db();
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        return  $db->execute($sql, [':id' => $id]);

    }


}