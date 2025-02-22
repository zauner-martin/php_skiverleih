<?php

//neue Instanz der Klasse PDO; dient zum Erstellen einer Verbindung zur Datenbank
try {
$pdo = new PDO('mysql:host=localhost;dbname=skiverleih', 'root', '');
}

catch (PDOException $e) {
    echo "Keine Verbindung zur Datenbank";
    die();
}