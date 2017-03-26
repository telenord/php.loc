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

     public function execute(string $sql, array $params=[]){
         $fields_string = '';
         $values_string= '';

         $values =[];

         if(!empty($param))
         {
             foreach($params as $field => $value)
             {
                 $fields_string .= "`" . $field . "`". ', ';
                 $values_string .= ':' . $field . ', ';
                 array_push($values,$value );
             }
         }

         $sql .= substr($fields_string, 0, -2) . " " . substr($values_string, 0, -2);

         $sth = $this->dbh->prepare($sql);

         $res = $sth->execute($values);
         var_dump($res);
         return $res;
     }
}