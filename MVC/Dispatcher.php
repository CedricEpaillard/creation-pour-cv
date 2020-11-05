<?php
/**
 * Importation des différents fichier PHP
 */
include 'Model/Model.php';
include 'View/View.php';
include 'Controller/CategoryController.php';
include 'Controller/ClientsController.php';
include 'Controller/ProspectsController.php';

class Dispatcher
{

    /**
     * Mise en place du controller pour page et action
     */
    public function dispatch()
    {
        $controller = (isset($_GET['page'])) ? $_GET['page'] : "Category";
        $controller = $controller . "Controller";
        $action = (isset($_GET['action'])) ? $_GET['action'] : "list";
        $action = $action . "Action";
        $my_controller = new $controller();
        $my_controller->$action();
    }
}
