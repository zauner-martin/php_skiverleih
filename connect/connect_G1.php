<?php

/*Erzeugt eine neue Instanz ($pdo) der Klasse PDO; baut Verbindung zur Datenbank auf
Prolematik:
Fehler beim Verbindungsaufbau zur DB werden dem Anwender angezeigt,
wenn nicht mit "try/catch" gearbeitet wird
*/

/*PDO::ERRMODE_EXCEPTION ist eine Konstante, die bei PHP8 nicht unbedingt gesetzt werden muss
jedoch bei der Migration der DB auf einen anderen Server (bzw. PHP-Version) gesetzt werden sollte
*/

try {
    $pdo = new PDO('mysql:host=localhost;dbname=skiverleih', 'root', '', [
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
    ]);
    }
    
catch (PDOException $e) {
    echo "Fehler beim Verbindungsaufbau zur Datenbank";
    die();
}
