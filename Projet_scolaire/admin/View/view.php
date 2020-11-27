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
    $this->page .= '<link rel="stylesheet" href="style.css">'; 
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
      $this->page .= '<a href="index.php?page=deleteMail&id=' . $element['id'] .'">Supprimer</a></td>';
      $this->page .= "</tr>";
    }
    $this->page .= "</table>";
    $this->page .= '<a href="index.php?page=formAddDb" class="button__admin">Ajouter</a>';
    $this->page .= '<a href="index.php?page=patchNote" class="button__admin">Retour au patch note</a>';

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

        public function displayFormAddDb()
        {
           $this->page .= file_get_contents('html/form.html');
           $this->display();
        }

        public function displayListPatch($list)
        {
                $this->page .= '<link rel="stylesheet" href="style.css">';
                $this->page .= "<table>";
                $this->page .= "<thead>";
                $this->page .= "<tr>";
                $this->page .= "<th scope='col'>";
                $this->page .= "Titre";
                $this->page .= "</th>";
                $this->page .= "<th scope='col'>";
                $this->page .= "Spoiler";
                $this->page .= "</th>";
                $this->page .= "<th scope='col'>";
                $this->page .= "Contenu";
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
                  $this->page .= $element['titre'] . "</td>";
                  $this->page .= "<td>";
                  $this->page .= $element['spoiler'] . "</td>";
                  $this->page .= "<td>";
                  $this->page .= $element['contenu'] . "</td>";
                  $this->page .= "<td>";
                  $this->page .= '<a href="index.php?page=updatePatch&id=' . $element['id'].'">Editer</a></td>';
                  $this->page .= "<td>";
                  $this->page .= '<a href="index.php?page=deletePatch&id=' . $element['id'] .'">Supprimer</a></td>';
                  $this->page .= "</tr>";
                }
                $this->page .= "</table>";
                $this->page .= '<a href="index.php?page=formAddPatch" class="button__admin">Ajouter</a>';
                $this->page .= '<a href="index.php?page=bddMail" class="button__admin">Retour au Mail</a>';
                $this->display();
            }

            public function displayFormAddPatch()
            {
                $this->page .= file_get_contents('html/addPatchNote.html');
                $this->display();
            }

            public function displayPatchNoteAdd($result)
            {
                if($result) {
                    header('Location: index.php?page=patchNote');
                var_dump($result);
                } else {
                    echo "Veuillez vérifier que vous n'avez pas dépassé les 50 caractères pour le titre et 100 caractères pour le spoiler
                    <a href='index.php?page=formAddPatch'>Retour au formulaire</a>";
                }
            }

            public function displayChangeDataPatch($parm)
            {
                $this->page .= '<link rel="stylesheet" href="style.css">
                <form class="form__change__data" name="form" method="POST" action="index.php?page=updatePatchDb">
                    <label>Title</label>
                    <input type="hidden" name="parm0" value="'.$parm[0].'"/>
                    <input type="text" maxlength="50" class="change__data__patch" name="parm1" value="'.$parm[1].'"/>
                    <label>Spoiler</label>
                    <input type="text" maxlength="100" class="change__data__patch" name="parm2" value="'.$parm[2].'"/>
                    <label>Contenu</label>
                    <input type="text" class="change__data__patch" name="parm3" value="'.$parm[3].'"/>
                    <input type="submit"/>
                </form>';
                $this->display();
            }

            public function displayresultUpdatePatch($result)
            {
                if($result) {
                    header('Location: index.php?page=patchNote');
                }
                else {
                    echo "Un problème est survenu
                    <a href='index.php?page=patchNote'>Retour aux patch</a>";
                }
            }

            public function displayResultDeletePatch($result)
            {
                if($result) {
                    header('Location: index.php?page=patchNote');
                }
                else {
                    echo "Un problème est survenu
                    <a href='index.php?page=patchNote'>Retour aux patch</a>";
                }
            }

       

        
    }
