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
            case 'faq':
                $this->view->displayFaq();
            break;
            case 'contact': 
                $this->view->displayContact();
            break;
            case 'legal_notice': 
                $this->view->displayLegal_notice();
            break;
            case 'press_kit': 
                $this->view->displayPress_kit();
            break;
            case 'newsletter': 
                $mail = (isset($_POST['mail'])) ? $_POST['mail'] : NULL;
                $this->model->addNewsletter($mail);
                $this->view->displayAddNewsletter($mail);
            break;
            case 'sendForm': 
                $mail = (isset($_POST['mail'])) ? $_POST['mail'] : NULL;
                $textarea = (isset($_POST['message'])) ? $_POST['message'] : NULL;
                $this->model->sendForm($mail,$textarea);
                $this->view->displaySendForm($mail,$textarea);
            break;
            case 'news': 
                $list = $this->model->listNews();
                $this->view->displayListNews($list);
            break;              
            case 'patchNoteEntier': 
                $id = (isset($_GET['id'])) ? $_GET['id'] : NULL;
                $list = $this->model->patchNoteEntier($id);
                $this->view->displayPatchNoteEntier($list);
            break;
            default:
                echo "default";
                break;
        }
    }
}
