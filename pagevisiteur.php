<?php
    session_start();
?>
<!DOCTYPE>
<html>
    <head>
        <title>Le blog d'Alex</title>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
    </head>
    <body>
        <header><p>Bienvenue sur mon blog</p></header>
        <article>
        
        
        <div id="choixcat">
            <p>Pour voir un article veuillez en choisir une catégorie ou un auteur.</p>
            <form method="post" action="">
                <select class="input" name="categorie">
                    <option>Choix catégorie</option>
                    <option value="1">Animaux</option>
                    <option value="2">Jeux vidéo</option>
                    <option value="3">Voiture</option>
                    <option value="4">Sport</option>
                </select>
                <select class="input" name="auteur">
                    <option>Choix auteur</option>
                    <option value="2">Admin</option>
                    <option value="8">Alexandre</option>
                </select>
                <input type="submit" name="affiche" value="rechercher"/>
            </form>
        </div>
         
        <div id="tableau">
        <?php
            include'fonction.php';
            pagevisit();
        ?>
        </div>
        </article>
    </body>
</html>