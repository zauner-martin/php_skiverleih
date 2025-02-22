<?php

require __DIR__ . '/connect/connect_G2.php';

//Aufruf der Methode prepare() auf das Objekt $pdo
$stmt = $pdo->prepare("SELECT * FROM `skier`");

//Sicherheitsfeature gegen MySQL-Injections
//$stmt->bindValue(':id', $_GET['id']);

//Ausführen des SQL-Statements von oben (SELECT ...)
$stmt->execute();

//Holen der Datensätze (nur als key/value-Paare = assoziatives Array)
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Ausgabe der Datensätze
//var_dump($results);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skier</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Skier</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Hersteller</th>
                <th>Preis</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($results as $result): ?>
            <tr>
                <td><?php echo $result['id'] ?></td>
                <td><?php echo $result['hersteller'] ?></td>
                <td><?php echo $result['preis'] ?></td>
                <td><a href="delete_G2.php?deleteId=2">Delete</a></td>
                <td>Update</td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <button><a href="insert_G2.php">Ski anlegen</a></button>
</body>
</html>
