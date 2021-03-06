<?php
//    fonction pour savoir si je suis membre ou non
    function identification(){
            $nom_serveur = "localhost";
            $identifiant = "root";
            $mdp = "";
            $nom_bd = "mini_blog";
        
            $bdd = new PDO("mysql:host=$nom_serveur; dbname=$nom_bd", $identifiant, $mdp);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        if(isset($_POST['envoyer'])){
             
            $id =htmlspecialchars($_POST['id']);
            $passeword = sha1($_POST['passeword']);
            
            $reqid = $bdd -> prepare("SELECT * FROM membres WHERE pseudo = ? and mot_de_passe = ?");
            $reqid -> execute(array($id, $passeword));
            $idexiste = $reqid->rowCount();
            $_SESSION['pseudo'] = $_POST['id'];

            if(!empty($id) && !empty($passeword)){
                if($idexiste > 0){
                    header('Location: pageadmin.php');
                    echo "compte validee";
                }
                else{
                    echo '<p id="rouge">Votre mail ou votre mot de passe est invalide</p>';
                }    
            }
            else{
               echo '<p id="rouge">Veuillez remplir les champs</p>'; 
            } 
             
         }
    }

//      fonction pour entrer les articles dans la table articles et la table jointure
    function entreeBDD(){
        $nom_serveur = "localhost";
        $identifiant = "root";
        $mdp = "";
        $nom_bd = "mini_blog";
        
        $bdd = new PDO("mysql:host=$nom_serveur; dbname=$nom_bd", $identifiant, $mdp);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        
        
        
        if(isset($_POST['submit'])){
            $choix = $_POST['choix'];
            $article = $_POST['poste'];
            $pseudo = $_SESSION['pseudo'];
            $titre = $_POST['titre'];
            if(!empty($choix) && !empty($article)){
                
                $req = $bdd->prepare("SELECT categorie FROM categories WHERE id = ?");
                $req->execute(array($_POST['choix']));
                $row1 = $req->fetch();
                
                $envoi = $bdd->prepare("INSERT INTO articles (pseudo, categorie, titre, article) VALUES (?, ?, ?, ?)");
                $envoi -> execute(array($pseudo, $row1['categorie'], $titre, $article));
                $id_data = $bdd->lastInsertId();                
            }
            else{
                echo 'remplir les champs';
            }

            $req1 = $bdd->prepare("SELECT id FROM membres WHERE pseudo = ?");
            $req1 -> execute(array($pseudo));
            $row3 = $req1->fetch();
            
            $req2 = $bdd->prepare("INSERT INTO jointure (id_art, id_cat) VALUES (?, ?)");
            $req2 -> execute(array($id_data, $choix));
            
            $req3 = $bdd->prepare("INSERT INTO jointure_aut_art(id_aut, id_article) VALUES(?, ?)");
            $req3 -> execute(array($row3['id'], $id_data));
            
            
        }
        
        
    }

//        fonction pour afficher les articles dans la pageadmin
    function afficheArticle(){

        $nom_serveur = "localhost";
        $identifiant = "root";
        $mdp = "";
        $nom_bd = "mini_blog";
        
        $bdd = new PDO("mysql:host=$nom_serveur; dbname=$nom_bd", $identifiant, $mdp);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $tetes = array("titre","categorie","pseudo", "modifier");
        
        $envoi2 = 'SELECT pseudo,categorie,article,titre FROM articles ORDER BY id DESC LIMIT 0,10';
        $renvoi = $bdd->query($envoi2);
        
        if($renvoi == false){
            die ('Erreur SQL '.$envoi2.'</br>'.$bdd->affected_rows);
        }
        ?>
        <table>   
    <tr>
        <td class="centre">articles</td>
        <?php foreach ($tetes as $tete) : ?>
                <td class="categorie"><?php echo $tete; ?></td>
            <?php endforeach; ?>
    </tr>
        <tr>
        <?php
        
            while($row = $renvoi->fetch()) { ?>
                <tr><td><?php echo $row['article']?></td><td class="categorie"><?php echo $row['titre']?></td><td class="categorie"><?php echo $row['categorie'] ?></td><td class="categorie"><?php echo $row['pseudo'];?></td><td class="categorie"><form method="post" action=""><input type="submit" name="modif" value="modifier"/></form></td></tr> 
           <?php } ?>
        
        </tr>
        </table>
        
        
   <?php }

    function pagevisit(){
        
        $nom_serveur = "localhost";
        $identifiant = "root";
        $mdp = "";
        $nom_bd = "mini_blog";
        
        $bdd = new PDO("mysql:host=$nom_serveur; dbname=$nom_bd", $identifiant, $mdp);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $tetes = array("nbr de commentaires","categorie","pseudo");
                
        if(isset($_POST['affiche'])){
            
            $categorie = $_POST['categorie'];
            $auteur = $_POST['auteur'];
            
            if(!empty($categorie)){
            $ecrit = $bdd->prepare("SELECT categorie FROM categories WHERE id = ?");
            $ecrit -> execute(array($categorie));
            $ligne = $ecrit->fetch();
            
            }
            $ecrit1 = $bdd->prepare("SELECT pseudo,categorie,article,titre FROM articles WHERE id IN (SELECT id_art FROM jointure WHERE id_cat = ?)");
            $ecrit1 ->execute(array($categorie));
            
            if(!empty($auteur)){
               
                $ecrit2 = $bdd->prepare("SELECT pseudo FROM membres WHERE id = ?");
                $ecrit2 -> execute(array($auteur));
                $ligne1 = $ecrit2->fetch();
                
               
            }
            $ecrit3 = $bdd->prepare("SELECT pseudo,categorie,article,titre FROM articles WHERE id IN (SELECT id_article FROM jointure_aut_art WHERE id_aut = ?)");
            $ecrit3 -> execute(array($auteur));
            
        
            while($row2 = $ecrit1->fetch()) { ?>
                <div><p><?php echo 'Categorie : '.$row2['categorie']?></p><h3><?php echo 'Titre : '.$row2['titre']?></h3><p class="centre"><?php echo $row2['article'] ?></p><p class="nom"><?php echo 'Auteur : '.$row2['pseudo'];?></p><hr></div> 
           <?php }
        
        
            while($row3 = $ecrit3->fetch()) { ?>
                <div><p><?php echo 'Categorie : '.$row3['categorie']?></p><h3><?php echo 'Titre : '.$row3['titre']?></h3><p class="centre"><?php echo $row3['article'] ?></p><p class="nom"><?php echo 'Auteur : '.$row3['pseudo'];?></p><hr></div> 
           <?php }
        }
    }



     
?>