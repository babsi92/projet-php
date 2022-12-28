<?php
require __DIR__.'/../../includes/header.php';
require __DIR__.'/../../config/database.php';

$requete = $pdo->query('SELECT*FROM category');
$categories = $requete->fetchAll();

?>

<!-- contenu -->

<h3 style="color:red">Catégories :</h3><br>

<?php
if(empty($categories)){
    echo 'il n\'y a pas de catégorie dans la base de données';
}else{?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">nom</th>
    </tr>
  </thead>
  <tbody>

  <?php
foreach($categories as $categorie){ ?>

    <tr>
      <th scope="row"><?php echo ($categorie['id']); ?></th>
      <td><?php echo ($categorie['name']); ?></td>
      <td>
         <a href="update.php?id=<?php echo $categorie['id']; ?>  " class="btn btn-warning">modifier</a>
         <a href="delete.php?id=<?php echo $categorie['id']; ?>" class="btn btn-danger">supprimer</a>
      </td>

    </tr>
    <?php } ?>
  
  </tbody>
</table>
<?php } ?>

<a href="create.php" class="btn btn-primary">créer une catégorie</a>

<?php
require __DIR__.'/../../includes/footer.php';
?>