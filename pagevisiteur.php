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
        <header><h2>Bienvenue sur mon blog</h2></header>
        <article>
            
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
        </div>
        
         
        <div class="tableau">
        <?php
            pagevisit();
        ?>
        </div>
        <div id="choixcat">
        <p>Pour voir un article veuillez en choisir une catégorie ou un auteur.</p>
        <form method="post" action="">
            <select class="input" name="categorie">
                <option>Choix catégorie</option>
                <option value="1">Musique</option>
                <option value="2">Concert</option>
                <option value="3">Sport</option>
                <option value="4">Jeux vidéo</option>
            </select>
            <select class="input" name="auteur">
                <option>Choix auteur</option>
                <option value="1">Admin</option>
                <option value="2">Alexandre</option>
            </select>
            <input type="submit" name="affiche" value="rechercher"/>
        </form>
        </div>
        </article>
    </body>
</html>