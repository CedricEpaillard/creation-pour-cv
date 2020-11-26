 <?php
    class View
    {

        private $page;

        public function __construct()
        {
        }

        private function display()
        {
            
            echo $this->page;
        }


        public function displayLogin()
        {
            $this->page .= file_get_contents("html/login.html");
            $this->display();
        }

        public function displayHome($result)
        {
            if ($result == 1) {
            $this->page .= file_get_contents("html/menu.html");
            $this->display();
            } else {
                echo ' 
                <link rel="stylesheet" href="style.css">
 <form class="form__register" action="index.php?page=Menu" method="post">
                <h1>Se connecter</h1>
                <h1 style="text-align :center;"> Mauvais pseudo ou mot de passe </h1>
                <input type="text" name="pseudo" placeholder="pseudo" required />
                <input type="password" name="password" placeholder="Mot de passe" required />
                <input type="submit" name="submit" value="Sinscrire" />
            </form>';
            $this->display();

            }
        }

        public function displayRegister($register) 
        {
            if( $register == 1) {
                echo  "<div class='inscrit'>
        <h3>Vous êtes inscrit avec succès.</h3>
        <p>Cliquez ici pour vous <a href='index.php?page=login'>connecter</a></p>
  </div>";
            }           
            else {
                include('model.php');
            }
           
        }

        public function displayListMail($list)
        {  
    $this->page .= "<table>";
    $this->page .= "<thead>";
    $this->page .= "<tr>";
    $this->page .= "<th scope='col'>";
    $this->page .= "id";
    $this->page .= "</th>";
    $this->page .= "<th scope='col'>";
    $this->page .= "Mail";
    $this->page .= "</th>";
    $this->page .= "<th scope='col'>";
    $this->page .= "Modifier";
    $this->page .= "</th>";
    $this->page .= "<th scope='col'>";
    $this->page .= "Supprimer";
    $this->page .= "</th>";
    $this->page .= "</tr>";
    $this->page .= "</thead>";
    foreach ($list as $element) {
      $this->page .= "<tr>";
      $this->page .= "<td>";
      $this->page .= $element['id'] . "</td>";
      $this->page .= "<td>";
      $this->page .= $element['mail'] . "</td>";
      $this->page .= "<td>";
      $this->page .= '<a href="index.php?page=UpdateMail&id=' . $element['id'].'">Editer</a></td>';
      $this->page .= "<td>";
      $this->page .= '<a href="index.php?page=DeleteMail&id=' . $element['id'] .'">Supprimer</a></td>';
      $this->page .= "</tr>";
    }
    $this->page .= "</table>";
            $this->display();
        }

        public function displayChangeData($parm)
        {
        $this->page .= '
        <link rel="stylesheet" href="style.css">
        <form class="form__register" name="form" method="POST" action="index.php?page=UpdateMailDb">
            <label>id</label>
            <input type="text" name="parm0" value="'.$parm[0].'"/>
            <label>mail</label>
            <input type="text" id="change__data" name="parm1" value="'.$parm[1].'"/>
            <input type="submit"/>
        </form>
        ';
        $this->display();
        }

       

        
    }
