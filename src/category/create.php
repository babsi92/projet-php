<?php
require __DIR__.'/../../includes/header.php';
require __DIR__.'/../../config/database.php';


if($_POST){
    

    $errors = false;

    if(!ctype_alpha($_POST['categorie'])){
        echo 'le nom ne doit pas être un nombre <br>';
        $errors = true;
    }
    
    if(empty($_POST['categorie'])){
        echo 'le champ ne doit pas être vide <br>';
        $errors = true;
    }

    if($errors == false){

        $pdo->prepare('INSERT INTO category (id,name) VALUES(null, ?)')->execute([$_POST['categorie']]);
        echo 'la catégorie a bien été enregistrée';
        header('Location: index.php');
    }
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<fieldset>
    <legend >Créer une catégorie :</legend><br>
    <label for="categorie">catégorie</label>
    <input type="text" id="categorie" name="categorie">
    <input type="submit" value="valider">
</fieldset>
</form>

<?php
require __DIR__.'/../../includes/footer.php';
?>