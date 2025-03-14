<?php

/** @var PDO $pdo */

require dirname(__DIR__) . '/connect/connect.php';

$stmt = $pdo->prepare('SELECT * FROM `kunden`');
$stmt->execute();
$result_customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare('SELECT * FROM `skier`');
$stmt->execute();
$result_skier = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $beginn = $_POST['beginn'];
    $dauer = $_POST['dauer'];
    $kunden_id = $_POST['kunden_id'];
    $skier_id = $_POST['skier_id'];

    $stmt = $pdo->prepare("INSERT INTO `verleih` (`id`, `beginn`, `dauer`, `kunden_id`, `skier_id`) VALUES (:id, :beginn, :dauer, :kunden_id, :skier_id)");
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':beginn', $beginn);
    $stmt->bindValue(':dauer', $dauer);
    $stmt->bindValue(':kunden_id', $kunden_id);
    $stmt->bindValue(':skier_id', $skier_id);
    $stmt->execute();
    
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

                <label for="beginn" class="form-label">Beginn</label>
                <input type="date" class="form-control" id="beginn" name="beginn" required>

                <label for="dauer" class="form-label">Dauer</label>
                <input type="number" class="form-control" id="dauer" step="1" name="dauer" required>

                <label for="kunden_id" class="form-label">Kunde</label>
                <select class="form-control" id="kunde_id" name="kunden_id" required>
                    <option value="">Bitte wählen</option>
                    <?php foreach ($result_customers as $result): ?>
                    <option value="<?php echo $result['id'] ?>"><?php echo $result['nachname'] . " " . $result['vorname'] ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="skier_id" class="form-label">Ski</label>
                <select class="form-control" id="skier_id" name="skier_id" required>
                    <option value="">Bitte wählen</option>
                    <?php foreach ($result_skier as $result): ?>
                    <option value="<?php echo $result['id'] ?>"><?php echo $result['hersteller'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-primary">ANLEGEN</button>
            </div>
        </form>
    </div>
</body>

</html>