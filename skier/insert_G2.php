<?php

require dirname(__DIR__) . '/connect/connect_G2.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $hersteller = $_POST['hersteller'];
    $preis = $_POST['preis'];
    
    //Aufruf der Methode prepare() auf das Objekt $pdo
    $stmt = $pdo->prepare('INSERT INTO `skier` (`id`, `hersteller`, `preis`) VALUES (:id, :hersteller, :preis)');
    
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':hersteller', $hersteller);
    $stmt->bindValue(':preis', $preis);

    $stmt->execute();

    header('location:./skiverleih_G2.php');
}

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ski anlegen</title>
    <link rel="stylesheet" href="../views/bootstrap.min.css">
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
        <input type="number" id="preis" name="preis" step="1" required>
        <br><br>
        
        <button type="submit" class="btn btn-primary">Ski anlegen</button>
    </form>
</body>
</html>
