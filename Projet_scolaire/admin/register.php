<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Enregistrement</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=5.0,user-scalable=yes">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section>
        <?php
        include 'Model/model.php';      
        ?>
        <link rel="stylesheet" href="style.css">

            <form class="form__register" action="index.php?page=register_mdp" method="post">
                <h1>S'inscrire</h1>
                <input type="text" class="" name="pseudo" placeholder="pseudo" required />
                <input type="password" class="" name="password" placeholder="Mot de passe" required />
                <input type="submit" name="submit" value="S'inscrire" class="" />
            </form>
   

    </section>
</body>

</html>