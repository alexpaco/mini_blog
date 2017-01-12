<?php 
    session_start();
?>
<!DOCTYPE>
<html>
    <head>
        <title>Catégories</title>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
    </head>
    <body>
        <nav>
            <p id="bonjour"><?php echo 'Bonjour, '.$_SESSION['pseudo'];?></p>
            <a href="accueil.php">Se déconnecter</a>
        </nav>
        <form method="post" action="">
            <textarea rows="5" cols="50" name="poste"></textarea>
            <select name="choix">
                <option value="1">Animaux</option>
                <option value="2">Jeux vidéo</option>
                <option value="3">Voiture</option>
                <option value="4">Sport</option>
            </select>
            <input type="submit" name="submit" value="poster"/>
        </form>
        <?php
        include 'fonction.php';
        entreeBDD();
        afficheArticle();
    ?>
    </body>
</html>