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
                $mail = htmlspecialchars((isset($_POST['mail'])) ? $_POST['mail'] : NULL);
                $result =  $this->model->addNewsletter($mail);
                $this->view->displayAddNewsletter($mail, $result);
                break;
            case 'sendForm':
                $mail = htmlspecialchars((isset($_POST['mail'])) ? $_POST['mail'] : NULL);
                $textarea = htmlspecialchars((isset($_POST['message'])) ? $_POST['message'] : NULL);
                $result = $this->model->sendForm($mail, $textarea);
                $this->view->displaySendForm($mail, $textarea, $result);
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
            case 'road_map':
                $list =  $this->model->roadMap();
                $this->view->displayRoadMap($list);
                break;
            default:
                echo "default";
                break;
        }
    }
}
