<?php

include 'View/ProspectsView.php';
include 'Model/ProspectsModel.php';

class ProspectsController {
    private $view;
    private $model;
  /**
   * Création View() et Model() de Prospects
   */
    public function __construct()
    {
        $this->view = new ProspectsView();
        $this->model = new ProspectsModel();
    }
  /**
   * Affichage de la liste
   */
    public function ProspectsAction() {
        $listCategory = $this->model->getList();
        $this->view->displayList($listCategory);
    }
  /**
   * Ajout des données Prospects dans BDD puis header
   */
    public function AddDBAction()
    {
      $this->model->addDB();
      header('location:index.php?page=prospects&action=prospects');
    }
  /**
   * Modification par la sélection de l'id puis affichage formulaire
   */
    public function UpdateAction() {
        $id = (isset($_GET['id'])) ? $_GET['id'] : null;
        $parm = $this->model->getItem($id);
        $this->view->displayUpdate("Mise à jour prospect", $parm);
      }
    /**
   * Modification des données puis header
   */
      public function UpdateDBAction () {
        $this->model->updateDB();
        header('location:index.php?page=prospects&action=prospects');
      }
/**
 * Choix de l'id puis formulaire pour transfère
 */
      public function TransferAction(){
        $id = (isset($_GET['id'])) ? $_GET['id'] : null;
        $parm = $this->model->getItem($id);
        $this->view->displayTransfer("Insérer les données vers la table Clients", $parm);
      }
/**
 * Données transferer puis header
 */
        public function TransferDBAction () {
        $this->model->TransferDB();
        header('location:index.php?page=clients&action=clients');
      }
/**
* id sélectionné puis confirmation par affichage
*/
      public function DeleteAction(){
        $id = (isset($_GET['id'])) ? $_GET['id'] : null;
        $parm = $this->model->getItem($id);
        $this->view->displayDelete("Supression de donnée prospect", $parm);
      }
/**
 * Suppression de l'id
 */
      public function DeleteDBAction(){
        $this->model->deleteDB();
        header('location:index.php?page=prospects&action=prospects');
      }
}