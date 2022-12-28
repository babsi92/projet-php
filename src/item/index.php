<?php
require __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../config/database.php';

$requete = $pdo->query('SELECT * FROM item');
$items = $requete->fetchAll();
// var_dump($items);
?>
<!--contenu-->
<?php
if (empty($items)) {
    echo "il n'y a pas de produits";
} else { ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">nom</th>
                <th scope="col">description</th>
                <th scope="col">image</th>
                <th scope="col">prix</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item) { ?>
                <tr>
                    <th scope="row"><?php echo $item['id']; ?></th>
                    <td><?php echo $item['title']; ?></td>
                    <td><?php echo $item['description']; ?></td>
                    <td><img width="50" height="50" src="<?php echo '/php/projet/upload/' .$item['file']; ?>"></td>
                    <td><?php echo $item['prix']; ?></td>
                    <td> <a href="update.php?id=<?php echo $item['id'];?>" class="btn btn-warning"> modifier </a>
                        <a href="delete.php?id=<?php echo $item['id']; ?>" class="btn btn-danger">supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>

<a href="create.php" class="btn btn-primary">Créer un produit</a>


<?php
require __DIR__ . '/../../includes/footer.php';

?>