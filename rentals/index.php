<?php

require dirname(__DIR__) . '/connect/connect.php';

// Alle Datensätze anzeigen
$stmt = $pdo->prepare('
    SELECT `verleih`.`id`, `verleih`.`beginn`, `verleih`.`dauer`, `kunden`.`nachname`, `kunden`.`vorname`, `skier`.`hersteller`
    FROM `verleih`
    JOIN `kunden` ON `verleih`.`kunden_id` = `kunden`.`id`
    JOIN `skier` ON `verleih`.`skier_id` = `skier`.`id`
    ORDER BY `verleih`.`beginn` DESC
');
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Test-Ausgabe
// var_dump($results);
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
    <h3 class="display-6 py-2 text-center text-dark">VERLEIH</h3>
    <div class="container w-50">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nr</th>
                <th>Beginn</th>
                <th>Dauer</th>
                <th>Nachname</th>
                <th>Vorname</th>
                <th>Ski</th>
                <th>Verleih löschen</th>
                <th>Verleih ändern</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($results as $result): ?>
            <tr>
                <td><?php echo $result['id'] ?></td>
                <td><?php echo $result['beginn'] ?></td>
                <td><?php echo $result['dauer'] ?></td>
                <td><?php echo $result['nachname'] ?></td>
                <td><?php echo $result['vorname'] ?></td>
                <td><?php echo $result['hersteller'] ?></td>
                <td><button class="btn btn-danger"><a href="./delete.php?deleteId=<?php echo $result['id'] ?>" class="text-white">Delete</a></button></td>
                <td><button class="btn btn-warning"><a href="./update.php?updateId=<?php echo $result['id'] ?>" class="text-white">Update</a></button></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        <button class="btn btn-primary"><a class="text-white" href="./submit.php">Neuer Verleih</a></button>
    </div>
</body>
</html>
