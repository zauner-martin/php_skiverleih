<?php

require dirname(__DIR__) . '/connect/connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //var_dump($_POST);

    echo $_POST['id'];
    
    $id = $_POST['id'];
    $hersteller = $_POST['hersteller'];
    $preis = $_POST['preis'];

    $stmt = $pdo->prepare("INSERT INTO `skier` (`id`, `hersteller`, `preis`) VALUES (:id, :hersteller, :preis)");
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':hersteller', $hersteller);
    $stmt->bindValue(':preis', $preis);
    $stmt->execute();

    echo "__DIR__";
    header('location:index.php');
}


?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ski hinzufügen</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container w-50">
        <h3 class="display-6 py-2 text-center text-dark">SKI ANLEGEN</h3>
        <form action="" method="POST">
            <div class="">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" required>
                
                <label for="hersteller" class="form-label">Hersteller</label>
                <input type="text" class="form-control" id="hersteller" name="hersteller" required>
                
                <label for="preis" class="form-label">Preis</label>
                <input type="number" class="form-control" id="preis" step="1" name="preis" required>            
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-primary">ANLEGEN</button>
            </div>
            </form>
    </div>
</body>
</html>
