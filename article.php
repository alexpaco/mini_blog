<?php 
    session_start();
?>
<?php
    $nom_serveur = "localhost";
    $identifiant = "root";
    $mdp = "";
    $nom_bd = "mini_blog";
            
    
    try{
        $bdd = new PDO("mysql:host=$nom_serveur; dbname=$nom_bd", $identifiant, $mdp);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
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
        $tetes = array("nbr d'articles","categorie","pseudo");
        
        
        if(isset($_POST['submit'])){
            $choix = $_POST['choix'];
            $article = $_POST['poste'];

            if(!empty($choix) && !empty($article)){
                $envoi = $bdd->prepare ("INSERT INTO articles (pseudo, categorie, article) VALUES(?, ?, ?)");
                $envoi -> execute(array($_SESSION['pseudo'], $choix, $article));
            }
        }
        
        $envoi2 = 'SELECT pseudo,categorie,article FROM articles ORDER BY id DESC LIMIT 0,10';
        $renvoi = $bdd->query($envoi2);
        
        if($renvoi == false){
            die ('Erreur SQL '.$envoi2.'</br>'.$bdd->affected_rows);
            }
        ?>
    <table>   
    <tr>
        <td>Dernier article</td>
        <?php foreach ($tetes as $tete) : ?>
                <td class="categorie"><?php echo $tete; ?></td>
            <?php endforeach; ?>
    </tr>
        <tr>
        <?php
        
            while($row = $renvoi->fetch()) { ?>
                <tr><td><?php echo $row['article']?></td><td class="categorie"><?php?></td><td class="categorie"><a href=""><?php echo $row['categorie'] ?></a></td><td class="categorie"><?php echo $row['pseudo'];?></td></tr> 
           <?php } ?>
        
        </tr>
        </table>
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