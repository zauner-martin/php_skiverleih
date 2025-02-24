<?php

require __DIR__ . '/connect/connect_G2.php';

//Vorbefüllen der Input-Felder
if(isset($_GET['updateId'])) {
    $id = $_GET['updateId'];
    
    $stmt = $pdo->prepare('SELECT * FROM `skier` WHERE `id`=:id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    //Vorsicht: $result enthält ein einfaches Array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $hersteller = $result['hersteller'];
    $preis = $result['preis'];
}

//Update in der DB
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $hersteller = $_POST['hersteller'];
    $preis = $_POST['preis'];
    
    //Aufruf der Methode prepare() auf das Objekt $pdo 
    $stmt = $pdo->prepare('UPDATE `skier` SET `id`=:id, `hersteller`=:hersteller, `preis`=:preis WHERE `id`=:id');
    
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':hersteller', $hersteller);
    $stmt->bindValue(':preis', $preis);

    $stmt->execute();

    header('location:./skiverleih_G2.php');
}

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKI ÄNDERN</title>
</head>
<body>
    <form action="" method="POST">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" value="<?php echo $id ?>" required>
        <br><br>
        
        <label for="hersteller">Hersteller:</label>
        <input type="text" id="hersteller" name="hersteller" value="<?php echo $hersteller ?>" required>
        <br><br>
        
        <label for="preis">Preis:</label>
        <input type="number" id="preis" name="preis" step="1" value="<?php echo $preis ?>" required>
        <br><br>
        
        <button type="submit">Ski ändern</button>
    </form>
</body>
</html>
