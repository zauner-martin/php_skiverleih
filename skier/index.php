<?php

require dirname(__DIR__) . '/connect/connect.php';

// Alle Datensätze anzeigen
$stmt = $pdo->prepare('SELECT * FROM `skier`');
$stmt->execute();
//$result ist 2D assoc Array
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventar-Skier</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <h3 class="display-6 py-2 text-center text-dark">SKIER</h3>
    <div class="container w-50">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nr</th>
                <th>Hersteller</th>
                <th>Preis</th>
                <th>Ski löschen</th>
                <th>Ski ändern</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($results as $result):
                //Evtl. Felder auslesen und in Variablen speichern
                //$id = $result['id'];
            ?>
            <tr>
                <td><?php echo $result['id'] ?></td>
                <td><?php echo $result['hersteller'] ?></td>
                <td><?php echo $result['preis'] ?></td>
                <td><button class="btn btn-danger"><a href="./delete.php?deleteId=<?php echo $result['id'] ?>" class="text-white">Delete</a></button></td>
                <td><button class="btn btn-warning"><a href="./update.php?updateId=<?php echo $result['id'] ?>" class="text-white">Update</a></button></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        <button class="btn btn-primary"><a class="text-white" href="./submit.php">Ski hinzufügen</a></button>
    </div>
</body>
</html>

