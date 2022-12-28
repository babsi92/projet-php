<?php
require __DIR__.'/../../includes/header.php';
require __DIR__.'/../../config/database.php';

$requete = $pdo->query('SELECT*FROM category');
$categories = $requete->fetchAll();

if($_POST){
    

    if($_FILES){

        // récupération du nom du fichier
        $nom_du_fichier = $_FILES['file']['name'];
        
        // récupération du type de fichier
        $type_de_fichier = $_FILES['file']['type'];
        
        // récupération du dossier temporaire
        $dossier_temporaire = $_FILES['file']['tmp_name'];
        
        // récupération du dossier d'upload final
        $dossier_uploads = '../../upload/'.$nom_du_fichier;
        
        //on récupère l'extension du fichier
        // strrchr trouve l'occurence d'un caractère dans une chaîne.
        //et affiche la chaîne à partir de l'occurence (occurence ici = '.')
        $extension_du_fichier = strrchr($nom_du_fichier,'.');
        
        $extensions_autorisees = array('.jpg', '.png', '.jpeg', '.JPG', '.PNG', '.JPEG');
        
        if(in_array($extension_du_fichier, $extensions_autorisees)){
            // move_uploaded_file() déplace le fichier du dossier temporaire vers le dossier final
            if(move_uploaded_file($dossier_temporaire, $dossier_uploads)){
                
                $sql = "INSERT INTO item (title, description, file, category_id, prix) VALUES (?,?,?,?,?)";
                $pdo->prepare($sql)->execute([$_POST['title'], $_POST['description'], $_FILES['file']['name'], $_POST['category'], $_POST['prix']]);
    
                echo 'téléchargé avec succès!';
            }
        }else{
            echo "l'extension $extension_du_fichier n'est pas autorisée.";
        }
        }
         
        
    
}
?>
<form action="#" method="post" enctype="multipart/form-data" >

<fieldset>
  <legend>Ajouter un produit :</legend><br>
    
    <label for="item">titre</label>
    <input type="text" id="title" name="title">
    <br>

    <label for="item">description</label>
    <input type="text" id="description" name="description">
    <br>

    <label for="item">prix</label>
    <input type="text" id="prix" name="prix">
    <br>

    <label for="item">fichier</label>
    <input type="file" id="file" name="file">
    <br>
    
    <label for="item">sélectionner une catégorie</label>
   <select name="category" id="category">
    <?php foreach($categories as $categorie){ ?>
    <option value="<?php echo $categorie['id']; ?>"> <?php echo $categorie['name']; ?> </option>
     <?php } ?>
    </select>
    <br>
    <input type="submit" value="valider">
</fieldset>
</form>






<?php
require __DIR__.'/../../includes/footer.php';
?>
