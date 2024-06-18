<?php
$db = new PDO('mysql: host=localhost; dbname=account', 'root', '801559');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $db = new PDO('mysql: host=localhost; dbname=account', 'root', '801559');

    $round = $_POST['rd'];

    if ($round > 1) {
        $sql = "INSERT INTO around (round, HP, atk, card1, card2, card3, card4, card5, damage, defense, persist, invincible, lifesteal, purify, self_persist, pass, surrender)
            VALUES ($round, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1)";
    }
    else{
        $sql = "UPDATE around SET HP = 0, surrender = 1 WHERE round = $round";
    }

    $db->exec($sql);
    echo json_encode(1);
}