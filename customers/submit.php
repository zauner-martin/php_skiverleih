<?php

require dirname(__DIR__) . '/connect/connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nachname = $_POST['nachname'];
    $vorname = $_POST['vorname'];
    $ausweis = $_POST['ausweis'];
    $telefon = $_POST['telefon'];

    $stmt = $pdo->prepare("INSERT INTO `kunden` (`id`, `nachname`, `vorname`, `ausweis`, `telefon`) VALUES (:id, :nachname, :vorname, :ausweis, :telefon)");
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':nachname', $nachname);
    $stmt->bindValue(':vorname', $vorname);
    $stmt->bindValue(':ausweis', $ausweis);
    $stmt->bindValue(':telefon', $telefon);
    $stmt->execute();

    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunde anlegen</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container w-50">
        <h3 class="display-6 py-4 text-center text-dark">KUNDE ANLEGEN</h3>
        <form action="" method="POST">
            <div class="">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" required>
                
                <label for="nachname" class="form-label">Nachname</label>
                <input type="text" class="form-control" id="nachname" name="nachname" required>
                
                <label for="vorname" class="form-label">Vorname</label>
                <input type="text" class="form-control" id="vorname" name="vorname" required>
                
                <label for="ausweis" class="form-label">Ausweis</label>
                <input type="text" class="form-control" id="ausweis" name="ausweis" required>

                <label for="telefon" class="form-label">Telefon</label>
                <input type="text" class="form-control" id="telefon" name="telefon" required>
            </div>
            <div class="d-flex justify-content-center py-4">
                <button type="submit" class="btn btn-primary m-2">Anlegen</button>
                <button class="btn btn-secondary m-2"><a class="text-white" href="./index.php">Abbrechen</a></button>
            </div>
            </form>
    </div>
</body>
</html>
