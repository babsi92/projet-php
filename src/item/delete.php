<?php

require __DIR__.'/../../config/database.php';

$pdo->prepare('DELETE FROM item WHERE id = ?')->execute([$_GET['id']]);

header('Location: index.php');