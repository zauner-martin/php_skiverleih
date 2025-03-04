<?php

require dirname(__DIR__) . '/connect/connect.php';

$stmt = $pdo->prepare('SELECT * FROM `kunden`');
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Erst später HTML-Code in views-Directory verschieben
//require __DIR__ . '/views/view_index.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventar-Skier</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <h3 class="display-6 my-4 text-center text-dark">KUNDEN</h3>
    <div class="container w-75">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Kundennummer</th>
                <th>Nachname</th>
                <th>Vorname</th>
                <th>Ausweis</th>
                <th>Telefon</th>
                <th>Kunde löschen</th>
                <th>Kunde ändern</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($results as $result):
                //Evtl. Felder auslesen und in Variablen speichern
                //$id = $result['id'];
            ?>
            <tr>
                <td><?php echo $result['id'] ?></td>
                <td><?php echo $result['nachname'] ?></td>
                <td><?php echo $result['vorname'] ?></td>
                <td><?php echo $result['ausweis'] ?></td>
                <td><?php echo $result['telefon'] ?></td>
                <td><button class="btn btn-danger"><a href="./delete.php?deleteId=<?php echo $result['id'] ?>" class="text-white">Delete</a></button></td>
                <td><button class="btn btn-warning"><a href="./update.php?updateId=<?php echo $result['id'] ?>" class="text-white">Update</a></button></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-center py-4">
        <button class="btn btn-primary m-2"><a class="text-white" href="./submit.php">Kunde anlegen</a></button>
        <button class="btn btn-secondary m-2"><a class="text-white" href="../index.php">Home</a></button>
    </div>
</body>
</html>
