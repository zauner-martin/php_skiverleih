<?php

require __DIR__ . '/connect/connect_G1.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $hersteller = $_POST['hersteller'];
    $preis = $_POST['preis'];

    $stmt = $pdo->prepare('INSERT INTO `skier` (`id`, `hersteller`, `preis`) VALUES (:id, :hersteller, :preis)');
    $stmt->bindValue('id', $id);
    $stmt->bindValue('hersteller', $hersteller);
    $stmt->bindValue('preis', $preis);

    $stmt->execute();
    header('location:./skiverleih_G1.php');
}

//Aufruf der prepare-Methode mit dem SQL-Statement
//$stmt = $pdo->prepare('INSERT INTO `skier` (`id`, `hersteller`, `preis`) VALUES (:id, :hersteller, :preis)') ;

//Sicherheitsfeature, damit SQL-Injections (z. B. id=id) verhindert werden
//$stmt->bindValue(':id', $_GET['id']);

//Ausführen des SQL-Statements
//$stmt->execute();

//Liefert ein Array mit allen Datensätzen zurück
//$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//gibt die Datensätze aus
//var_dump($result);

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ski anlegen</title>
    <link rel="stylesheet" href="./views/bootstrap.min.css">
</head>
<body>
    <form action="" method="POST">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required>
        <br><br>
        
        <label for="hersteller">Hersteller:</label>
        <input type="text" id="hersteller" name="hersteller" required>
        <br><br>
        
        <label for="preis">Preis:</label>
        <input type="text" id="preis" name="preis" step="0.01" required>
        <br><br>
        
        <button type="submit">Ski anlegen</button>
    </form>
</body>
</html>
