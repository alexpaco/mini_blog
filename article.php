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
                <option value="">Choix de la catégorie</option>
                <option value="animaux">Animaux</option>
                <option value="jeuxvideo">Jeux vidéo</option>
                <option value="voiture">Voiture</option>
                <option value="sport">Sport</option>
            </select>
            <textarea rows="5" cols="50" name="poste"></textarea>
            <input type="submit" name="submit" value="poster"/>
        </form>    
        <?php
         if(isset($_POST['submit'])){
             
//             $article = $_POST['poste'];
             echo $_SESSION['pseudo'];
             echo "</br>";
             echo $_POST['choix'];
             echo "</br>";
             echo $_POST['poste'];
             
         }
        ?>
    </body>
</html>