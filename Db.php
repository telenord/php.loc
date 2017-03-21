<?php

Class Db{
    protected $dbh;


    public function __construct()
    {
        $this->dbh = new PDO('mysql:host=localhost;dbname=test','root','');
    }

    public function query($sql, string $class, $values=[])
    {
        $sth = $this->dbh->prepare($sql);

        empty($values) ? $res = $sth->execute() :  $res = $sth->execute($values);


        if ($res) {
            $data = $sth->fetchAll(PDO::FETCH_CLASS , $class );

            return $data;
        } else {
                return false;
        }
     }

     public function execute($sql, $params=[]){
         $sth = $this->dbh->prepare($sql);
         $res = $sth->execute($params);

         return $res;
     }
}