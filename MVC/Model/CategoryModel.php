<?php

class CategoryModel extends Model
{
    /**
     * Selection de la table category
     */
    public function getList()
    {
        $requete = "SELECT * FROM category";
        $result = $this->connection->query($requete);
        $list = array();
        if ($result) {
            $list = $result->fetchAll(PDO::FETCH_ASSOC);
        }

        return $list;
    }
    /**
     * Choix de l'item par l'id
     */
    public function getItem($id)
    {
        $requete = $this->connection->prepare("SELECT id, nom, details FROM category WHERE id=:id");
        $requete->bindParam(':id', $id);
        $result = $requete->execute();
        $list = array();
        if ($result) {
            $list = $requete->fetch(PDO::FETCH_NUM);
        }
        return $list;
    }
    /**
     * Ajout dans la BDD
     */
    public function addDB()
    {
        $nom = isset($_POST['parm1']) ? $_POST['parm1'] : null;
        $details = isset($_POST['parm2']) ? $_POST['parm2'] : null;
        $requete = $this->connection->prepare("INSERT INTO  category VALUES (NULL, :nom, :details)");
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':details', $details);
        $result = $requete->execute();
        return $result;
    }
    /**
     * Modification dans la BDD par l'id choisit
     */
    public function updateDB()
    {
        $id =  $id = isset($_POST['parm0']) ? $_POST['parm0'] : null;
        $nom = isset($_POST['parm1']) ? $_POST['parm1'] : null;
        $details = isset($_POST['parm2']) ? $_POST['parm2'] : null;

        $requete = $this->connection->prepare("UPDATE category SET nom=:nom, details=:details WHERE id=:id");
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':details', $details);
        $requete->bindParam(':id', $id);
        $result = $requete->execute();
        return $result;
    }

    /**
     * Suppression par l'id choisit
     */
    public function deleteDB()
    {
        $id = isset($_POST['parm0']) ? $_POST['parm0'] : null;
        $requete = $this->connection->prepare("DELETE FROM category WHERE id=:id");
        $requete->bindParam(':id', $id);
        $result = $requete->execute();
        return $result;
    }
}
