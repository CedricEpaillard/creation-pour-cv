<?php

include 'View/view.php';
include 'Model/model.php';

class Controller
{
    private $view;
    private $model;

    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model();
    }

    public function dispatch()
    {

        $page = (isset($_GET['page'])) ? $_GET['page'] : "home";
        switch ($page) {
            case 'home':
                $this->view->displayHome();
                break;
            default:
                echo "default";
                break;
        }
    }
}
