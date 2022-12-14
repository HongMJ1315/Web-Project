<?php
header('Content-Type: application/json; charset=UTF-8');

$db = new PDO('mysql: host=localhost; dbname=account', 'root', '801559');


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $round = $_POST['rd'];

    $sql = $db->query("SELECT card1, card2, card3, card4, card5 FROM around WHERE round = $round");
    
    $row = $sql->fetchAll();
    echo json_encode($row);
}