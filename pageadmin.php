<?php 
    session_start();
    if(!isset($_SESSION['pseudo'])){
        
        die ("Vous êtes déconnecter");
    }
        if(isset($_POST['deco'])){
                    
            $_SESSION = array();
            session_destroy();
            header('Location: pagevisiteur.php');
            exit();
        }
?>
<!DOCTYPE>
<html>
    <head>
        <title>Catégories</title>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
    </head>
    <body>
        <article>
        <div id="poste">
            <p id="bonjour"><?php echo 'Bonjour, '.$_SESSION['pseudo'];?></p>
                    
        <form method="post" action="">
            <label for="titre">Titre : </label>
            <input type="text" name="titre" id="titre"/></br></br>
            <label for="poste">Texte : </label>
            <textarea rows="5" cols="50" name="poste"></textarea></br></br>
            <select name="choix" id="select">
                <option>Choix catégorie</option>
                <option value="1">Musique</option>
                <option value="2">Concert</option>
                <option value="3">Sport</option>
                <option value="4">Jeux vidéo</option>
            </select>
            <input type="submit" name="submit" value="poster"/>
        </form>
        <form method="post" action="">
            <input type="submit" name="deco" value="se deconnecter"/>
            
        </form>    
        </div>
        <div class="ajout">
            <?php
                include 'fonction.php';
                entreeBDD();
                afficheArticle();
            ?>
        </div>
        </article>
    </body>
</html>