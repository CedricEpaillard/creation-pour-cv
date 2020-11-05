<?php
class ProspectsView  extends View
{
    /**
     * Affichage du tableau Prospects
     */
    public function displayList($list)
    {
        $this->page .= "<table class='table'>";
        $this->page .= "<thead>";
        $this->page .= "<tr>";
        $this->page .= "<th scope='col'>";
        $this->page .= "Nom";
        $this->page .= "</th>";
        $this->page .= "<th scope='col'>";
        $this->page .= "Prénom";
        $this->page .= "</th>";
        $this->page .= "<th scope='col'>";
        $this->page .= "Adresse";
        $this->page .= "</th>";
        $this->page .= "<th scope='col'>";
        $this->page .= "Code Postal";
        $this->page .= "</th>";
        $this->page .= "<th scope='col'>";
        $this->page .= "Ville";
        $this->page .= "</th>";
        $this->page .= "<th scope='col'>";
        $this->page .= "Commentaire";
        $this->page .= "</th>";
        $this->page .= "<th scope='col'>";
        $this->page .= "Modifier";
        $this->page .= "</th>";
        $this->page .= "<th scope='col'>";
        $this->page .= "Supprimer";
        $this->page .= "</th>";
        $this->page .= "</tr>";
        $this->page .= "</thead>";
        foreach ($list as $element) {
            $this->page .= "<tr>";
            $this->page .= "<td>";
            $this->page .= $element['nom'] . "</td>";
            $this->page .= "<td>";
            $this->page .= $element['prenom'] . "</td>";
            $this->page .= "<td>";
            $this->page .= $element['adresse'] . "</td>";
            $this->page .= "<td>";
            $this->page .= $element['code_postal'] . "</td>";
            $this->page .= "<td>";
            $this->page .= $element['ville'] . "</td>";
            $this->page .= "<td>";
            $this->page .= $element['commentaire'] . "</td>";
            $this->page .= "<td>";
            $this->page .= '<a href="index.php?page=prospects&action=Update&id=' . $element['id'] . '" class="text-dark"><i class="fas fa-edit"></i></a></td>';
            $this->page .= "<td>";
            $this->page .= '<a href="index.php?page=prospects&action=Delete&id=' . $element['id'] . '" class="text-dark"><i class="fas fa-dumpster"></i></a></td>';
            $this->page .= "</tr>";
        }
        $this->page .= "</table>";
        $this->display();
    }
    /**
     * Formulaire pour modifier les données Prospects
     */
    public function displayUpdate($titre, $parm)
    {
        $this->page .= "<h1 class='text-center'>" . $titre . "</h1>";
        $this->page .= '<div class="container">
            <form name="form" method="POST" action="index.php?page=prospects&action=UpdateDB">
            <div class="form-group">
            <input class="form-control" type="hidden" name="parm0" value="' . $parm[0] . '"/>
            <label>Nom</label>
            <input class="form-control" type="text" name="parm1" value="' . $parm[1] . '"/>
            <label>prenom</label>
            <input class="form-control" type="text" name="parm2" value="' . $parm[2] . '"/>
            <label>Adresse</label>
            <input class="form-control" type="text" name="parm3" value="' . $parm[3] . '"/>
            <label>Code Postal</label>
            <input class="form-control" type="text" name="parm4" value="' . $parm[4] . '"/>
            <label>Ville</label>
            <input class="form-control" type="text" name="parm5" value="' . $parm[5] . '"/>
            <label>Champ commentaire</label>
            <input class="form-control" type="text" name="parm6" value="' . $parm[6] . '"/>
            <input class="btn btn-primary" type="submit"/>
            <a href="index.php?page=prospects&action=Transfer&id=' . $parm[0] . '">Transferer vers clients</a>
            </div>
        </form>
          </div>';
        $this->display();
    }
    /**
     * Formulaire de transfert 
     */
    public function displayTransfer($titre, $parm)
    {
        $this->page .= "<h1 class='text-center'>" . $titre . "</h1>";
        $this->page .= '<div class="container">
            <form name="form" method="POST" action="index.php?page=prospects&action=TransferDB">
            <div class="form-group">
            <input class="form-control" type="hidden" name="parm0" value="' . $parm[0] . '"/>
            <label>Nom</label>
            <input class="form-control" type="text" name="parm1" value="' . $parm[1] . '"/>
            <label>prenom</label>
            <input class="form-control" type="text" name="parm2" value="' . $parm[2] . '"/>
            <label>Adresse</label>
            <input class="form-control" type="text" name="parm3" value="' . $parm[3] . '"/>
            <label>Code Postal</label>
            <input class="form-control" type="text" name="parm4" value="' . $parm[4] . '"/>
            <label>Ville</label>
            <input class="form-control" type="text" name="parm5" value="' . $parm[5] . '"/>
            <label>Champ commentaire</label>
            <input class="form-control" type="text" name="parm6" value="' . $parm[6] . '"/>
            <input class="btn btn-primary" type="submit"/>
            </div>
        </form>
          </div>';
        $this->display();
    }

    /**
     * Formulaire de confirmation de suppression des données 
     */
    public function displayDelete($titre, $parm)
    {
        $this->page .= "<h1 class='text-center'>" . $titre . "</h1>";
        $this->page .= '<div class="container">
            <form name="form" method="POST" action="index.php?page=prospects&action=DeleteDB">
            <div class="form-group">
            <input class="form-control" type="hidden" name="parm0" value="' . $parm[0] . '"/>
            <label>Nom</label>
            <input class="form-control" type="text" name="parm1" value="' . $parm[1] . '"/>
            <label>prenom</label>
            <input class="form-control" type="text" name="parm2" value="' . $parm[2] . '"/>
            <label>Adresse</label>
            <input class="form-control" type="text" name="parm3" value="' . $parm[3] . '"/>
            <label>Code Postal</label>
            <input class="form-control" type="text" name="parm4" value="' . $parm[4] . '"/>
            <label>Ville</label>
            <input class="form-control" type="text" name="parm5" value="' . $parm[5] . '"/>
            <label>Champ commentaire</label>
            <input class="form-control" type="text" name="parm6" value="' . $parm[6] . '"/>
            <input class="btn btn-primary" type="submit"/>
            </div>
        </form>
          </div>';
        $this->display();
    }
}
