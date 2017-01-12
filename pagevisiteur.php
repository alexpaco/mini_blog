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
        <div id="membre">
            <h3>Membre</h3>
            <form action="" method="post">
                <label for="id">Identifiant : </label> 
                <input class="input" type="text" name="id" /></br>
                <label for="passeword">Mot de passe : </label>
                <input class="input" type="password" name="passeword"/></br>
                <input id="envoi" type="submit" name="envoyer" value="Envoyer"/>
        <?php
            include 'fonction.php';
            identification();
        ?>
            </form>
            <p>Vous n'êtes pas admin ou membre, dommage vous pouvez que regarder les articles</p>
        </div>
        <div id="tableau">
        <?php
            pagevisit();
        ?>
        </div>
        <div id="choixcat">
            <p>Pour voir un article veuillez en choisir une catégorie.</p>
            <form method="post" action="">
                <select class="input" name="categorie">
                    <option value="1">Animaux</option>
                    <option value="2">Jeux vidéo</option>
                    <option value="3">Voiture</option>
                    <option value="4">Sport</option>
                </select>
                <input type="submit" name="affiche" value="rechercher"/>
            </form>
        </div>
        
        </article>
    </body>
</html>