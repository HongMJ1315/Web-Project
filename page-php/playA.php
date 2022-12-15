<?php
header('Content-Type: application/json; charset=UTF-8');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $db = new PDO('mysql: host=localhost; dbname=account', 'root', '801559');
    $card = $_POST['src'];
    $len = count($card);
    $round = $_POST['rd'];
    $HP = $_POST['HP'];
    if($len == 1)
        $sql = "INSERT INTO around (round, HP, atk, card1, card2, card3, card4, card5) 
                VALUES ($round, $HP, 1, '$card[0]', '', '', '', '')";
    else if($len == 2)
        $sql = "INSERT INTO around (round, HP, atk, card1, card2, card3, card4, card5) 
                VALUES ($round, $HP, 1, '$card[0]', '$card[1]', '', '', '')";
    else if($len == 3)
        $sql = "INSERT INTO around (round, HP, atk, card1, card2, card3, card4, card5) 
                VALUES ($round, $HP, 1, '$card[0]', '$card[1]', '$card[2]', '', '')";
    else if($len == 4)
        $sql = "INSERT INTO around (round, HP, atk, card1, card2, card3, card4, card5) 
                VALUES ($round, $HP, 1, '$card[0]', '$card[1]', '$card[2]', '$card[3]', '')";
    else if($len == 5)
        $sql = "INSERT INTO around (round, HP, atk, card1, card2, card3, card4, card5) 
                VALUES ($round, $HP, 1, '$card[0]', '$card[1]', '$card[2]', '$card[3]', 'card[4]')";
    $db->exec($sql);
    echo json_encode($sql);
}