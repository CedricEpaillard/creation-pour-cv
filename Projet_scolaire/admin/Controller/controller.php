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
            case 'deleteMail':
                        $id = (isset($_GET['id'])) ? $_GET['id'] : NULL;
                        $this->model->deleteDb();
                        header('Location: index.php?page=bddMail');
                    break;
            case 'formAddDb': 
                $this->view->displayFormAddDb();
            break;

            case 'addMailDb': 
                $mail = (isset($_POST['mail'])) ? $_POST['mail'] : NULL; 
                $this->model->addMailDb($mail);
                header('Location: index.php?page=bddMail');
            break;
            case 'patchNote': 
             $list =   $this->model->takeAllPatch();
             $this->view->displayListPatch($list);
            break;
            case 'formAddPatch': 
                $this->view->displayFormAddPatch();
            break;
            case 'addPatchNote': 
                $title = (isset($_POST['title'])) ? $_POST['title'] : NULL; 
                $spoiler = (isset($_POST['spoiler'])) ? $_POST['spoiler'] : NULL; 
                $contenu = (isset($_POST['contenu'])) ? $_POST['contenu'] : NULL; 
                $result = $this->model->addPatchNote($title,$spoiler,$contenu);
                $this->view->displayPatchNoteAdd($result);
            break;
            case 'updatePatch': 
                $id = (isset($_GET['id'])) ? $_GET['id'] : NULL;
                $parm =  $this->model->takePatch($id);
                  $this->view->displayChangeDataPatch($parm);
            break;
            case 'updatePatchDb': 
              $result =  $this->model->updatePatchDb();
               $this->view->displayresultUpdatePatch($result);
            break;
            case 'deletePatch': 
                $id = (isset($_GET['id'])) ? $_GET['id'] : NULL;
             $result =  $this->model->deletePatchDb();
                $this->view->displayResultDeletePatch($result);
            break;
            default:
                echo "default";
                break;
        }
    }
}
