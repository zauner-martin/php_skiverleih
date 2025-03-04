<?php

require dirname(__DIR__) . '/connect/connect.php';

if(isset($_GET['updateId'])) {
    $id = $_GET['updateId'];
    //echo "<p>" . $id . "</p>"; 

    $stmt = $pdo->prepare('SELECT * FROM `skier` WHERE `id`=:id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //Testen, ob $result als Array existiert
    //var_dump($result);

    $hersteller = $result['hersteller'];
    $preis = $result['preis'];

    //Testen, ob Variable gesetzt wurde
    //echo "$hersteller";
    
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    //echo "<p>Update gesendet</p>";
    $hersteller = $_POST['hersteller'];
    $preis = $_POST['preis'];

    //echo "$id, $hersteller, $preis";
    
    $stmt = $pdo->prepare('UPDATE `skier` SET `id`=:id, `hersteller`=:hersteller, `preis`=:preis WHERE `id`=:id');
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':hersteller', $hersteller);
    $stmt->bindValue(':preis', $preis);
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
        <h3 class="display-6 py-2 text-center text-dark">SKI ÄNDERN</h3>
        <form action="" method="POST">
            <div class="">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" required value="<?php echo $id ?>">
                
                <label for="hersteller" class="form-label">Hersteller</label>
                <input type="text" class="form-control" id="hersteller" name="hersteller" required value="<?php echo $hersteller ?>">
                
                <label for="preis" class="form-label">Preis</label>
                <input type="text" class="form-control" id="preis" name="preis" required value="<?php echo $preis ?>">
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-warning">UPDATE</button>
            </div>
        </form>
    </div>
</body>
</html>