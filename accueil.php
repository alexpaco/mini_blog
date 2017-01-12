<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Mini Blog</title>
    </head>
    <body>
        <h1>Mini blog perso</h1>
        <div id="membre">
            <h3>Membre</h3>
            <form action="" method="post">
                <label for="id">Identifiant : </label> 
                <input type="text" name="id" /></br>
                <label for="passeword">Mot de passe : </label>
                <input type="password" name="passeword"/></br>
                <input id="envoi" type="submit" name="envoyer" value="Envoyer"/>
        <?php
            include 'fonction.php';
            identification();
        ?>
            </form>
            <a href="pagevisiteur.php">Vous n'êtes pas admin dommage vous pouvez que regarder les articles en cliquant sur ce lien</a>
        </div>
    </body>
</html>