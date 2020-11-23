 <?php
    class View
    {

        private $page;

        public function __construct()
        {
            $this->page = file_get_contents("public/html/header.html");
            $this->page .= file_get_contents("public/html/nav__top.html");
        }

        private function display()
        {
            $this->page .= file_get_contents("public/html/nav__bot.html");
            $this->page .= file_get_contents("public/html/footer.html");
            
            echo $this->page;
        }


        public function displayHome()
        {
            $this->page .= file_get_contents("public/html/index.html");
            $this->display();
        }
    }
