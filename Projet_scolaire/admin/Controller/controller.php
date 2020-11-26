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
            case 'login':
                $this->view->displayLogin();
            break;
            case 'Menu':
                $pseudo = (isset($_POST['pseudo'])) ? $_POST['pseudo'] : NULL;
                $mdp = (isset($_POST['password'])) ? $_POST['password'] : NULL;
               $result = $this->model->login($pseudo,$mdp);
                $this->view->displayHome($result);
        break;
            case 'register_mdp':
                $pseudo = (isset($_POST['pseudo'])) ? $_POST['pseudo'] : NULL;
                $mdp = (isset($_POST['password'])) ? $_POST['password'] : NULL;
              $register =  $this->model->registerMdp($pseudo,$mdp);
                $this->view->displayRegister($register);
            break;
            case 'bddMail': 
                $list = $this->model->listMail();
                $this->view->displayListMail($list);
                $action = (isset($_GET['action'])) ? $_GET['action'] : NULL;
            break;
                 case 'UpdateMail': 
                        $id = (isset($_GET['id'])) ? $_GET['id'] : NULL;
                      $parm =  $this->model->takeMail($id);
                        $this->view->displayChangeData($parm);
                    break;
                case 'UpdateMailDb': 
                        $this->model->updateDB();
                        header('Location: index.php?page=bddMail');
                break;
                    case 'Delete':
                        $id = (isset($_GET['id'])) ? $_GET['id'] : NULL;
                        $mail = (isset($_GET['mail'])) ? $_GET['mail'] : NULL;

                    break;

                
            break;
            default:
                echo "default";
                break;
        }
    }
}
