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
         $fields_string = '';
         $values_string= '';

         $values =[];

         if(!empty($params))
         {
             foreach($params as $field => $value)
             {
                 $fields_string .=  "`". $field . "`, ";
                 $values_string .= ':' . $field . ', ';
                 array_push($values,$value );

             }
         }


         $sql .= "(" . substr($fields_string, 0, -2) . ") VALUES  (" . substr($values_string, 0, -2). ")";

         $sth = $this->dbh->prepare($sql);
         var_dump($sth);
         var_dump($sql);


         $res = $sth->execute($values);

         return $res;

     }
}