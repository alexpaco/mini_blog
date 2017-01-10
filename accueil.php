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
        
        <div>
            <h3>Membre</h3>
            <form action="" method="post">
                <label for="id">Identifiant : </label> 
                <input type="text" name="id" /></br>
                <label for="passeword">Mot de passe : </label>
                <input type="password" name="passeword"/></br>
                <input id="envoi" type="submit" name="envoyer" value="Envoyer"/>
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
        
        if(isset($_POST['envoyer'])){
             
            $id =htmlspecialchars($_POST['id']);
            $passeword = sha1($_POST['passeword']);
            
            $reqid = $bdd -> prepare("SELECT * FROM membres WHERE pseudo = ? and mot_de_passe = ?");
            $reqid -> execute(array($id, $passeword));
            $idexiste = $reqid->rowCount();
            $_SESSION['pseudo'] = $_POST['id'];

            if(!empty($id) && !empty($passeword)){
                if($idexiste > 0){
                    header('Location: article.php');
                    echo "compte validee";
                }
                else{
                    echo '<p id="rouge">Votre mail ou votre mot de passe est invalide</p>';
                    echo '<p id="rouge">Ou inscrivez-vous en cliquant sur le lien ci-dessous.</p>';
                }    
                
            }
            else{
               echo '<p id="rouge">Veuillez remplir les champs</p>'; 
            } 
             
         }
         ?>
            </form>
            <a href="inscription.php">Vous n'êtes toujours pas membre ?</a>
        </div>

    
    </body>
</html>