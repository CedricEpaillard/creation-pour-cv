<?php

class ClientsModel extends Model
{
    /**
     * Selection de la table Clients
     */
    public function getList()
    {

        $requete = "SELECT * FROM clients";
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
        $requete = $this->connection->prepare("SELECT id, nom, prenom, adresse, code_postal, ville, commentaire FROM clients WHERE id=:id");
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
        $prenom = isset($_POST['parm2']) ? $_POST['parm2'] : null;
        $adresse = isset($_POST['parm3']) ? $_POST['parm3'] : null;
        $CP = isset($_POST['parm4']) ? $_POST['parm4'] : null;
        $ville = isset($_POST['parm5']) ? $_POST['parm5'] : null;
        $commentaire = isset($_POST['parm6']) ? $_POST['parm6'] : null;

        $requete = $this->connection->prepare("INSERT INTO clients VALUES (NULL, :nom, :prenom, :adresse, :code_postal, :ville, :commentaire)");
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':prenom', $prenom);
        $requete->bindParam(':adresse', $adresse);
        $requete->bindParam(':code_postal', $CP);
        $requete->bindParam(':ville', $ville);
        $requete->bindParam(':commentaire', $commentaire);
        $result = $requete->execute();
        return $result;
    }

    /**
     * Modification dans la BDD par l'id choisit
     */
    public function updateDB()
    {
        $id = isset($_POST['parm0']) ? $_POST['parm0'] : null;
        $nom = isset($_POST['parm1']) ? $_POST['parm1'] : null;
        $prenom = isset($_POST['parm2']) ? $_POST['parm2'] : null;
        $adresse = isset($_POST['parm3']) ? $_POST['parm3'] : null;
        $CP = isset($_POST['parm4']) ? $_POST['parm4'] : null;
        $ville = isset($_POST['parm5']) ? $_POST['parm5'] : null;
        $commentaire = isset($_POST['parm6']) ? $_POST['parm6'] : null;
        $requete = $this->connection->prepare(
            "UPDATE clients SET nom=:nom, prenom=:prenom, adresse=:adresse, code_postal=:code_postal, ville=:ville, commentaire=:commentaire WHERE id=:id"
        );
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':prenom', $prenom);
        $requete->bindParam(':adresse', $adresse);
        $requete->bindParam(':code_postal', $CP);
        $requete->bindParam(':ville', $ville);
        $requete->bindParam(':commentaire', $commentaire);
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
        $requete = $this->connection->prepare("DELETE FROM clients WHERE id=:id");
        $requete->bindParam(':id', $id);
        $result = $requete->execute();
        return $result;
    }
}
