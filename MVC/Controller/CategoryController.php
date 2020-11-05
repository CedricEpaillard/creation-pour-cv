<?php
include 'View/CategoryView.php';
include 'Model/CategoryModel.php';

class CategoryController
{
  private $view;
  private $model;

  /**
   * Création View() et Model() de Category
   */
  public function __construct()
  {
    $this->view = new CategoryView();
    $this->model = new CategoryModel();
  }

  /**
   * Affichage de la liste
   */
  public function listAction()
  {
    $listCategory = $this->model->getList();
    $this->view->displayList($listCategory);
  }

  /**
   * Ajout > Affichage formulaire pour Category / Clients / Prospects
   */
  public function AddAction()
  {
    $this->view->displayForm();
  }
  /**
   * Ajout des données category dans BDD puis header
   */
  public function AddDBAction()
  {
    $this->model->addDB();
    header('location:index.php?page=Category&action=list');
  }

  /**
   * Modification par la sélection de l'id puis affichage formulaire
   */
  public function UpdateAction()
  {
    $id = (isset($_GET['id'])) ? $_GET['id'] : null;
    $parm = $this->model->getItem($id);
    $this->view->displayUpdate("Mise à jour catégory", $parm);
  }

  /**
   * Modification des données puis header
   */
  public function UpdateDBAction()
  {
    $this->model->updateDB();
    header('location:index.php?page=Category&action=list');
  }

  /**
   * id sélectionné puis confirmation par affichage
   */
  public function DeleteAction()
  {
    $id = (isset($_GET['id'])) ? $_GET['id'] : null;
    $parm = $this->model->getItem($id);
    $this->view->displayDelete("Supression de donnée Catégory", $parm);
  }
/**
 * Suppression de l'id
 */
  public function DeleteDBAction()
  {
    $this->model->deleteDB();
    header('location:index.php?page=Category&action=list');
  }
}
