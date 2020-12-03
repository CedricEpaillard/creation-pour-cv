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
    public function addNewsletter($mail)
    {

        $requete = $this->connection->prepare("SELECT mail FROM bdd_mail WHERE mail=:mail");
        $requete->bindParam(':mail', $mail);
        $result = $requete->execute();
        $list = array();
        $list = $requete->fetch(PDO::FETCH_NUM);
        // var_dump($list);
        if ($list !== false) {
            $result = "Adresse valide mais déjà existante";
            return $result;
        } else {
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $result = "Veuilez entrer une adresse mail valide";
                return $result;
            } else {
                $requete = $this->connection->prepare("INSERT INTO  bdd_mail VALUES (NULL, :mail)");
                $requete->bindParam(':mail', $mail);
                $result = $requete->execute();
                $result = $mail;
                return $result;
            }
        }
    }

    public function SendForm($mail, $textarea)
    {
        $mail = $_POST['mail'];
        $textarea = $_POST['message'];
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $result = "Veuilez entrer une adresse mail valide";
            return $result;
            var_dump($result);
        } else {
            $to = "cedric.epaillard11@gmail.com";
            $objet = "Contact depuis le site internet";
            mail($to, $objet, $textarea, $mail);
            $result = true;
            return $result;
        }
    }

    public function listNews()
    {
        $requete = "SELECT * FROM news";
        $result = $this->connection->query($requete);
        $list = array();
        if ($result) {
            $list = $result->fetchAll(PDO::FETCH_ASSOC);
        }
        return $list;
    }

    public function patchNoteEntier($id)
    {
        $requete = $this->connection->prepare("SELECT titre, contenu FROM news WHERE id=:id");
        $requete->bindParam(':id', $id);
        $result = $requete->execute();
        $list = array();
        if ($result) {
            $list = $requete->fetch(PDO::FETCH_NUM);
        }
        return $list;
    }

    public function roadMap()
    {
        $requete = "SELECT spoiler FROM news WHERE id=(SELECT max(id) FROM news)";
        $result = $this->connection->query($requete);
        if ($result) {
            $list = $result->fetchAll(PDO::FETCH_ASSOC);
         //   var_dump($list);
        }
        return $list;
    }
}
