<?php

$dbh = new PDO("mysql:dbname=bocal_auto_enchere;host=localhost", "root", "");
$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
