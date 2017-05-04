<?php

require __DIR__ . '\..\App\Config.php';

Class Db
{
    protected $dbh;

    public function __construct( )
    {
        $config = \App\Config::instance();

        $this->dbh = new PDO('mysql:host=' . $config->data['db']['host'] . '; dbname='. $config->data['db']['dbname'] , $config->data['db']['login'], $config->data['db']['pass']);

    }

    public function query(string $sql, string $class, $values=[])
    {
        $sth = $this->dbh->prepare($sql);

        $res = $sth->execute($values);

        if ($res){
            return $sth->fetchAll(PDO::FETCH_CLASS , $class );

        }

        return $res;
    }

    public function queryLimit(string $sql, string $class, int $values)
    {
        $sth = $this->dbh->prepare($sql);


        $sth->bindParam(':limit', $values, PDO::PARAM_INT);

        $res = $sth->execute();


        if ($res) {

            return $sth->fetchAll(PDO::FETCH_CLASS , $class );

        }
         return $res;

    }

     public function execute(string $sql, array $params=[])
     {

         $sth = $this->dbh->prepare($sql);

         return $sth->execute($params);
     }

    public function insert(string $sql, array $params=[])
    {

        $sth = $this->dbh->prepare($sql);

        $res = $sth->execute($params);

        if(true === $res){

            return $this-> dbh->lastInsertId();

        }

        return $res;
    }
}