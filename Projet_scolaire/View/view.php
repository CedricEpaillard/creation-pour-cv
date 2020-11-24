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

        public function displayFaq() 
        {
            $this->page .= file_get_contents("public/html/faq.html");
            $this->display();
        }

        public function displayContact() 
        {
            $this->page .= file_get_contents("public/html/contact.html");
            $this->display();
        }

        public function displayLegal_notice()
        {
            $this->page .= file_get_contents("public/html/legal_notice.html");
            $this->display();
        }
        public function displayPress_kit()
        {
            $this->page .= file_get_contents("public/html/press_kit.html");
            $this->display();
        }

        public function displayAddNewsletter($mail)
        {   
            $this->page .= file_get_contents("public/html/newsletter.html");
            $this->page = str_replace("{mail}", $mail, $this->page);
            $this->page .= var_dump($mail);
            $this->display();
            
        }

        public function displaySendForm()
        {
            echo "test";
        }
    }
