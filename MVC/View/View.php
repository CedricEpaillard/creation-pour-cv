<?php


abstract class View
{


    protected $page;
    /**
     * Ajout de nav.html et header.html
     */
    public function __construct()
    {
        $this->page = file_get_contents("html/header.html");
        $this->page .= file_get_contents("html/nav.html");
    }

    /**
     * Ajout footer.html et echo $page
     */

    protected function display()
    {
        $this->page .= file_get_contents("html/footer.html");

        echo $this->page;
    }
}
