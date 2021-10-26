<?php
$pdo = new PDO('mysql:dbname=classicmodels;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$sql = file_get_contents('basededatos.sql');

$qr = $pdo->exec($sql);

$query = $pdo->prepare('show tables');

$query->execute();