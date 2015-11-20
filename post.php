<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=semi;charset=utf8','root','',
        array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (PDOException $e) {
    exit('a'.$e->getMessage());
} 



// $stmt = $pdo -> prepare("INSERT INTO a (date, place) VALUE(:date, :place)");

// $stmt->bindValue(':date', $_POST["date"], PDO::PARAM_STR);
// $stmt->bindValue(':place', $_POST["place"], PDO::PARAM_STR);
// $stmt->execute();
// TODO: データ構造を直す
foreach ($_POST["date"] as $i => $date) {
    $place = $_POST["place"][$i];

    $stmt = $pdo->prepare("INSERT INTO a (date, place) VALUES (:date, :place)");
    $stmt->bindValue(':date', $date, PDO::PARAM_STR);
    $stmt->bindValue(':place', $place, PDO::PARAM_STR);
    $stmt->execute();
}

var_dump($_POST);