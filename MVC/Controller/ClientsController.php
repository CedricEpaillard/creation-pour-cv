<?php

include 'View/ClientsView.php';
include 'Model/ClientsModel.php';

class ClientsController
{
  private $view;
  private $model;

  /**
   * Création View() et Model() de Clients
   */
  public function __construct()
  {
    $this->view = new ClientsView();
    $this->model = new ClientsModel();
  }
  /**
   * Affichage de la liste
   */
  public function ClientsAction()
  {
    $listCategory = $this->model->getList();
    $this->view->displayList($listCategory);
  }
  /**
   * Ajout des données Clients dans BDD puis header
   */
  public function AddDBAction()
  {
    $this->model->addDB();
    header('location:index.php?page=clients&action=clients');
  }
  /**
   * Modification par la sélection de l'id puis affichage formulaire
   */
  public function UpdateAction()
  {
    $id = (isset($_GET['id'])) ? $_GET['id'] : null;
    $parm = $this->model->getItem($id);
    $this->view->displayUpdate("Mise à jour client", $parm);
  }
  /**
   * Modification des données puis header
   */
  public function UpdateDBAction()
  {
    $this->model->updateDB();
    header('location:index.php?page=clients&action=clients');
  }
  /**
   * Suppression avec l'id sélectionné puis confirmation par affichage
   */
  public function DeleteAction()
  {
    $id = (isset($_GET['id'])) ? $_GET['id'] : null;
    $parm = $this->model->getItem($id);
    $this->view->displayDelete("Supression de donnée client", $parm);
  }
/**
 * Suppression de l'id
 */
  public function DeleteDBAction()
  {
    $this->model->deleteDB();
    header('location:index.php?page=clients&action=clients');
  }
}
