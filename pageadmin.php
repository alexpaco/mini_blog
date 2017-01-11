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
            <select name="choix">
                <option value="$choix">Animaux</option>
                <option value="$choix">Jeux vidéo</option>
                <option value="$choix">Voiture</option>
                <option value="$choix">Sport</option>
            </select>
            <input type="submit" name="vers" value="Allez à"/>
        </form>
    <?php
        include 'fonction.php';
        afficheArticle();
    ?>
        <form method="post" action="">
            <textarea rows="5" cols="50" name="poste"></textarea>
            <input type="submit" name="submit" value="poster"/>
            <select name="choix">
                <option value="Animaux">Animaux</option>
                <option value="Jeux vidéo">Jeux vidéo</option>
                <option value=" Voiture">Voiture</option>
                <option value="Sport">Sport</option>
            </select>
        </form>
    </body>
</html>