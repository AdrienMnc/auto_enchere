<?php

$dbh = new PDO("mysql:dbname=bocal_auto_enchere;host=localhost", "root", "root");

$query = $db->prepare("SELECT * FROM vehicules");
$result = $query->execute();

$vehicules = $query->fetchAll(PDO::FETCH_ASSOC);
var_dump($result);

?>