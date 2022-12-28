<?php

require 'global.php';

$dbName = DB_NAME;
$dbHost = DB_HOST;

$dsn = "mysql:host=$dbHost;dbname=$dbName";

$pdo = new PDO($dsn,DB_USER,DB_PASSWORD);