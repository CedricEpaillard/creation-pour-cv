 <?php

    /**
     * Création de la classe
     */
    class View
    {
        /**
         * Affichage de la page
         */
        private $page;
        /**
         * Affichage en premier
         */
        public function __construct()
        {
            $this->page = file_get_contents("public/html/header.html");
            $this->page .= file_get_contents("public/html/nav__top.html");
        }

        /**
         * Affichage en dernier
         */
        private function display()
        {
            $this->page .= file_get_contents("public/html/nav__bot.html");
            $this->page .= file_get_contents("public/html/footer.html");

            echo $this->page;
        }

        /**
         * Page d'accueil
         */
        public function displayHome()
        {
            $this->page .= file_get_contents("public/html/index.html");
            $this->display();
        }
        /**
         * Page FAQ
         */
        public function displayFaq()
        {
            $this->page .= file_get_contents("public/html/faq.html");
            $this->display();
        }
        /**
         * Page Contact
         */
        public function displayContact()
        {
            $this->page .= file_get_contents("public/html/contact.html");
            $this->display();
        }
        /**
         * Page Mentions légales
         */
        public function displayLegal_notice()
        {
            $this->page .= file_get_contents("public/html/legal_notice.html");
            $this->display();
        }
        /**
         * Page press
         */
        public function displayPress_kit()
        {
            $this->page .= file_get_contents("public/html/press_kit.html");
            $this->display();
        }
        /**
         * Résultat mail
         */
        public function displayAddNewsletter($mail, $result)
        {
            if ($result !== 1) {
                $this->page .= file_get_contents("public/html/newsletter.html");
                $this->page = str_replace("{mail}", $result, $this->page);
                $this->display();
            } else {
                $this->page .= file_get_contents("public/html/newsletter.html");
                $this->page = str_replace("{mail}", $mail, $this->page);
                $this->display();
            }
        }
        /**
         * Résultat contact
         */
        public function displaySendForm($mail, $textarea, $result)
        {
            if ($result !== true) {
                $this->page .= file_get_contents("public/html/sendForm.html");
                $this->page = str_replace("{mail}", $result, $this->page);
                $this->page = str_replace("{message}", $textarea, $this->page);
                $this->display();
                //       var_dump($result);
            } else {
                $this->page .= file_get_contents("public/html/sendForm.html");
                $this->page = str_replace("{mail}", $mail, $this->page);
                $this->page = str_replace("{message}", $textarea, $this->page);
                //       var_dump($result);

                $this->display();
            }
        }
        /**
         * Page News
         */
        public function displayListNews($list)
        {
            $this->page .= '<link rel="stylesheet" href="public/css/style.css">';
            foreach ($list as $element) {
                $this->page .= "<a href='index.php?page=patchNoteEntier&id=" . $element['id'] . "' class='news__link'>";
                $this->page .= "<div class='news__card'>";
                $this->page .= "<h1>";
                $this->page .= $element['titre'];
                $this->page .= "</h1>";
                $this->page .= "<img src='public/img/tar_icon.png' class='news__icon'>";
                $this->page .= "<span>" . $element['spoiler'] . "</span>";
                $this->page .= "</div>";
                $this->page .= "</a>";
            }
            $this->display();
        }
        /**
         * Page patchnote entier
         */
        public function displayPatchNoteEntier($parm)
        {
            $this->page .= '<link rel="stylesheet" href="public/css/style.css">';
            $this->page .= "<h1 class='patchNoteEntier__title'>" . $parm[0] . "</h1>";
            $this->page .= "<h2 class='patchNoteEntier__dl'><a href='#'>Download TechAge Rebellion</a></h2>";
            if (strpos($parm[1], "<li>") !== false) {
                $this->page .= "<div class='patchNoteEntier__contenu'>" . $parm[1] . "</div>";
            } else {
                $this->page .= "<div class='patchNoteEntier__contenu__simple'>" . $parm[1] . "</div>";
            }
            $this->display();
        }
        /**
         * Page Road Map
         */
        public function displayRoadMap($list)
        {
            foreach ($list as $element) {
                $this->page .= '<link rel="stylesheet" href="public/css/style.css">';
                $this->page .= "<div class='news__card__roadMap'>";
                $this->page .= "<h1>";
                $this->page .= "In the near future..";
                $this->page .= "</h1>";
                $this->page .= "<img src='public/img/tar_icon.png' class='news__icon'>";
                $this->page .= "<span>" . $element['spoiler'] . "</span>";
                $this->page .= "</div>";
            }
            $this->display();
        }
    }
