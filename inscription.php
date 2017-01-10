<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Inscription</title>
    </head>
    <body>
        <h1>Inscription</h1>
        <div>
        <form method="post" action="">
            <label>Identifiant : </label>
            <input type="text" name="id"/></br>
            <label>Email : </label>
            <input type="email" name="email"/></br>
            <label>Mot de passe : </label>
            <input type="password" name="passeword"/></br>
            <input type="submit" name="envoyer" value="Envoyer"/>
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
             
                $id = htmlspecialchars($_POST['id']);
                $passeword = sha1($_POST['passeword']);
                $email = htmlspecialchars($_POST['email']);
             
             if(!empty($id) && !empty($passeword) && !empty($email)){
                $sql = $bdd->prepare("INSERT INTO membres (pseudo, mot_de_passe, email) VALUES(?, ?, ?)");
                $sql -> execute(array($id, $passeword, $email));
                header('Location: article.php');
                
            }
            else{
               
                echo '<p>Veuillez remplir les champs</p>';
            }
         }
         ?>
        </form>
        </div>
    </body>
</html>