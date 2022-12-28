<?php
require __DIR__.'/../../includes/header.php';
require __DIR__.'/../../config/database.php';

if($_POST){
    $pdo->prepare('UPDATE category set name = ? WHERE id = ?')->execute([$_POST['categorie'], $_GET['id']]);
    echo 'la catégorie a bien été modifiée';
    header('Location: index.php');
}

$requete = $pdo->prepare('SELECT name FROM category WHERE id=?');
$requete->execute([$_GET['id']]);
$categorie = $requete->fetch();
?>

<form action="#" method="post">
    <fieldset>
        <legend>Formulaire de modification</legend>
        <label for="categorie">catégorie</label>
        <input type="text" name="categorie" id="categorie" value="<?php echo $categorie['name']; ?>">
        
        <input type="submit" value="valider">
    </fieldset>
<!-- <a href="index.php">liste des catégories</a> -->
<?php
require __DIR__.'/../../includes/footer.php';
?>