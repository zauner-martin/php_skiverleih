<?php

require dirname(__DIR__) . '/connect/connect.php';

if(isset($_GET['updateId'])) {
    $id = $_GET['updateId'];

    $stmt = $pdo->prepare('SELECT * FROM `kunden` WHERE `id`=:id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $nachname = $result['nachname'];
    $vorname = $result['vorname'];
    $ausweis = $result['ausweis'];
    $telefon = $result['telefon'];    
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nachname = $_POST['nachname'];
    $vorname = $_POST['vorname'];
    $ausweis = $_POST['ausweis'];
    $telefon = $_POST['telefon'];
    
    $stmt = $pdo->prepare('UPDATE `kunden` SET `id`=:id, `nachname`=:nachname, `vorname`=:vorname, `ausweis`=:ausweis, `telefon`=:telefon WHERE `id`=:id');
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
    <title>Kunde ändern</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container w-50">
        <h3 class="display-6 py-2 text-center text-dark">KUNDE ÄNDERN</h3>
        <form action="" method="POST">
            <div class="">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" required value="<?php echo $id ?>">
                
                <label for="nachname" class="form-label">Nachname</label>
                <input type="text" class="form-control" id="nachname" name="nachname" required value="<?php echo $nachname ?>">
                
                <label for="vorname" class="form-label">Vorname</label>
                <input type="text" class="form-control" id="vorname" name="vorname" required value="<?php echo $vorname ?>">

                <label for="ausweis" class="form-label">Ausweis</label>
                <input type="text" class="form-control" id="ausweis" name="ausweis" required value="<?php echo $ausweis ?>">

                <label for="telefon" class="form-label">Telefon</label>
                <input type="text" class="form-control" id="telefon" name="telefon" required value="<?php echo $telefon ?>">
            </div>
            <div class="d-flex justify-content-center py-4">
                <button type="submit" class="btn btn-warning m-2">UPDATE</button>
                <button class="btn btn-secondary m-2"><a class="text-white" href="../index.php">Home</a></button>
            </div>
        </form>
    </div>
</body>
</html>