<?php
class Model
{

    const SERVER = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const BASE = "tar";
    public $connection;



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
    public function login($pseudo,$mdp)
    {

        if (isset($_POST['pseudo'], $_POST['password'])) {
            // récupérer l'pseudo 
            $pseudo = ($_POST['pseudo']);
            // récupérer le mot de passe 
            $mdp = ($_POST['password']);
            $requete =$this->connection->prepare('SELECT pseudo, mdp FROM  administrateur WHERE pseudo = :pseudo AND mdp = :mdp ');
            $requete->bindParam(':pseudo', $pseudo);
            $requete->bindParam(':mdp', $mdp);
          //         var_dump($requete);
          //         var_dump($pseudo);
          //      var_dump($mdp);
            $result = $requete->execute();
            $array = $requete->fetchAll(PDO::FETCH_ASSOC);
            $user = (array_sum(array_map("count", $array)));
            if ($user == 2) {
                $result = 1;
                return $result;
            } elseif ($user < 2) {
                $result = 0;
                return $result;
            }
        } else {
            $result = 0;
            return $result;
        }
    }

        public function registerMdp($pseudo,$mdp) {
                $mdp = hash('sha256', ($mdp));
                $requete = $this->connection->prepare('INSERT INTO  administrateur (pseudo, mdp) VALUES (:pseudo, :mdp)');
                $requete->bindParam(':pseudo', $pseudo);
                $requete->bindParam(':mdp', $mdp);
                //   var_dump($requete);
                //    var_dump($pseudo);
                //  var_dump($mdp);
                $result = $requete->execute();
                //   var_dump($result);
                if ($result) {
                    $register = 1;
                }
                return $register;
        }

         public function listMail()
        {
            $requete = "SELECT * FROM bdd_mail";
            $result = $this->connection->query($requete);
            $list = array();
            if ($result) {
                $list = $result->fetchAll(PDO::FETCH_ASSOC);
            }
            return $list;
        }

        public function takeMail($id)
        {
            $requete = $this->connection->prepare("SELECT id, mail FROM bdd_mail WHERE id=:id");
            $requete->bindParam(':id', $id);
            $result = $requete->execute();
            $list = array();
            if ($result) {
                $list = $requete->fetch(PDO::FETCH_NUM);
            }
            return $list;
        }

        public function updateDb()
        {
            $id = isset($_POST['parm0']) ? $_POST['parm0'] : null;
            $mail = isset($_POST['parm1']) ? $_POST['parm1'] : null;
            $requete = $this->connection->prepare(
                "UPDATE bdd_mail SET mail=:mail, id=:id WHERE id=:id"
            );
            $requete->bindParam(':mail', $mail);
            $requete->bindParam(':id', $id);
            $result = $requete->execute();
            return $result;
        }








}
