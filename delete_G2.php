<?php

require __DIR__ . '/connect/connect_G2.php';

if(isset($_GET['deleteId'])) {
    $id = $_GET['deleteId'];
    echo "deleteId auf " . $id . " gesetzt";
    
    $stmt = $pdo->prepare('DELETE FROM `skier` WHERE `id`=:id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    header('location:./skiverleih_G2.php');
}

?>