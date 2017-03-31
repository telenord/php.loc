<?php

require __DIR__ . '\..\App\Config.php';

Class Db{
    protected $dbh;

    public function __construct( )
    {
        $config = \App\Config::instance();

        $this->dbh = new PDO('mysql:host=' . $config->data['host'] . '; dbname='. $config->data['dbname'] , $config->data['login'], $config->data['pass']);

    }

    public function query(string $sql, string $class, $values=[])
    {
        $sth = $this->dbh->prepare($sql);

        if(!empty($values)){
            for ($i = 0; $i < count($values); $i++){
             $sth->bindValue($i+1, (int) $values[$i], PDO::FETCH_NUM );
            }
        }
        $res = $sth->execute();
        if ($res) {
            $data = $sth->fetchAll(PDO::FETCH_CLASS , $class );
            return $data;
        } else {
                return false;
        }
    }

    public function queryOne(string $sql, string $class, int $values)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue( 1, $values );

        $res = $sth->execute();

        if ($res) {
            $sth->setFetchMode(PDO::FETCH_CLASS, $class);
            $data = $sth->fetch();
            return $data;
        } else {
            return false;
        }
    }



     public function execute(string $sql, array $params=[]){

         $sth = $this->dbh->prepare($sql);

//         foreach ($params as $key => $value){
//             $sth->bindValue( $key, $value );
//             var_dump( $sth);
//         }

         $res = $sth->execute($params);

         return $res;
     }

    public function insert(string $sql, array $params=[]){

        $sth = $this->dbh->prepare($sql);

        $res = $sth->execute($params);

        if(true === $res){

            return $this-> dbh->lastInsertId();

        }

        return $res;
    }

    public function update(string $sql, array $params=[]){

        $sth = $this->dbh->prepare($sql);

        $res = $sth->execute($params);

        if(true === $res){

            return $this-> dbh->lastInsertId();

        }

        return $res;
    }


}