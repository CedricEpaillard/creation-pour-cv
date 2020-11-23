<?php
class Model
{
      
      const SERVER = "localhost";
      const USER = "root";
      const PASSWORD = "";
      const BASE = "tar";


    private $connection;

    public function __construct()
    // try 
    {
        $this->connection = new
            PDO(
                "mysql:host=" .
                    self::SERVER . ";dbname=" .
                    self::BASE,
                self::USER,
                self::PASSWORD
            );
    }
    // catch (Execption $e) {die('Erreur : '.$e->getMessage()); }
    public function getList()
    {
        $requete = "SELECT * FROM user";
        $result = $this->connection->query($requete);
        $list = array();
        if ($result) {
            $list = $result->fetchAll(PDO::FETCH_ASSOC);
        }
        return $list;
    }
}
