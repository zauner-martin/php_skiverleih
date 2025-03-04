<?php

require dirname(__DIR__) . '/connect/connect.php';

if(isset($_GET['deleteId'])) {
    $id = $_GET['deleteId'];
    
    $stmt = $pdo->prepare('DELETE FROM `skier` WHERE `id`=:id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    header('location:index.php');
} else {
    echo "keine Datensatz-ID zum Löschen übertragen";
}
