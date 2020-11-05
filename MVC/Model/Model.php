<?php 

abstract class Model {
        /*   
          const SERVER = "localhost";
          const USER = "root";
          const PASSWORD = "";
          const BASE = "CEFii";*/
    
          const SERVER = "sqlprive-pc2372-001.privatesql.ha.ovh.net";
          const USER = "cefiidev873";
          const PASSWORD = "ciEC7e45";
          const BASE = "cefiidev873";
      
          /**
           * Connection à la base de donnée
           */
          protected $connection;
      
          public function __construct()
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
}