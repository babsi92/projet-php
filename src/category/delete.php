<?php
 
 require __DIR__.'/../../config/database.php';

echo'<pre>';
print_r($_GET);
echo'</pre>';

//requête pour récupérer un lien pour sécuriser 'prepare' plutôt que 'query'
 $pdo->prepare('DELETE FROM category WHERE id = ?')->execute([$_GET['id']]);

 header('Location: index.php');