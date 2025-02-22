<?php

require __DIR__ . '/connect/connect_G1.php';

//Aufruf der prepare-Methode mit dem SQL-Statement
$stmt = $pdo->prepare('SELECT * FROM `skier`');

//Sicherheitsfeature, damit SQL-Injections (z. B. id=id) verhindert werden
//$stmt->bindValue(':id', $_GET['id']);

//Ausführen des SQL-Statements
$stmt->execute();

//Liefert ein Array mit allen Datensätzen zurück
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//gibt die Datensätze aus
//var_dump($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skiverleih</title>
    <link rel="stylesheet" href="./views/bootstrap.min.css">

</head>

<body>
    <h1 class="text-center">Skier</h1>
    <div class="container w-50">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hersteller</th>
                <th>Preis</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $result): ?>
                <tr>
                    <td><?php echo $result['id']; ?></td>
                    <td><?php echo $result['hersteller']; ?></td>
                    <td><?php echo $result['preis']; ?></td>
                    <td><a href="./delete_G1.php?deleteId=<?php echo $result['id'] ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button><a href="insert_G1.php">Ski anlegen</a></button>
</body>

</html>