<?php
require __DIR__.'/../../includes/header.php';
require __DIR__.'/../../config/database.php';

if($_POST){
    $pdo->prepare('UPDATE item set title = ? WHERE id = ?')->execute([$_POST['produit'], $_GET['id']]);
    echo 'le produit a bien été modifié';
    header('Location: index.php');
}

$requete = $pdo->prepare('SELECT title FROM item WHERE id=?');
$requete->execute([$_GET['id']]);
$item = $requete->fetch();
?>

<form action="#" method="post">
    <fieldset>
        <legend>Formulaire de modification :</legend><br>
        
        <label for="produit">produit</label>
        <input type="text" name="produit" id="produit" value="<?php echo $item['title']; ?>">
        <input type="submit" value="valider">
    </fieldset>
<?php
require __DIR__.'/../../includes/footer.php';
?>