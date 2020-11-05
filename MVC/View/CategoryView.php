<?php
class CategoryView extends View
{
  /**
   * Affichage du tableau category
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
    $this->page .= "Description";
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
      $this->page .= $element['details'] . "</td>";
      $this->page .= "<td>";
      $this->page .= '<a href="index.php?page=category&action=Update&id=' . $element['id'] . '" class="text-dark"><i class="fas fa-edit"></i></a></td>';
      $this->page .= "<td>";
      $this->page .= '<a href="index.php?page=category&action=Delete&id=' . $element['id'] . '" class="text-dark"><i class="fas fa-dumpster"></i></a></td>';
      $this->page .= "</tr>";
    }
    $this->page .= "</table>";
    $this->display();
  }
  /**
   * Affichage des forumaires pour ajout des données
   */

  public function displayForm()
  {

    // FORM CATEGORY
    $this->page .= file_get_contents("html/form/formCategory.html");
    // FORM CLIENTS
    $this->page .= file_get_contents("html/form/formClients.html");

    // FORM PROSPECTS 
    $this->page .= file_get_contents("html/form/formProspects.html");

    $this->display();
  }

  /**
   * Formulaire pour modifier les données category
   */

  public function displayUpdate($titre, $parm)
  {
    $this->page .= "<h1 class='text-center'>" . $titre . "</h1>";
    $this->page .= '<div class="container">
            <form name="form" method="POST" action="index.php?page=category&action=UpdateDB">
            <div class="form-group">
            <input class="form-control" type="hidden" name="parm0" value="' . $parm[0] . '"/>
            <label>Nom</label>
            <input class="form-control" type="text" name="parm1" value="' . $parm[1] . '"/>
            <label>détails</label>
            <input class="form-control" type="text" name="parm2" value="' . $parm[2] . '"/>
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
            <form name="form" method="POST" action="index.php?page=category&action=DeleteDB">
            <div class="form-group">
            <input class="form-control" type="hidden" name="parm0" value="' . $parm[0] . '"/>
            <label>Nom</label>
            <input class="form-control" type="text" name="parm1" value="' . $parm[1] . '"/>
            <label>détails</label>
            <input class="form-control" type="text" name="parm2" value="' . $parm[2] . '"/>
            <input class="btn btn-primary" type="submit"/>
            </div>
        </form>
          </div>';
    $this->display();
  }
}