<?php
header('Content-Type: application/json; charset=UTF-8');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $db = new PDO('mysql: host=localhost; dbname=account', 'root', '801559');
    $card = $_POST['id'];
    $len = count($card);
    $round = $_POST['rd'];
    $HP = $_POST['HP'];
    $atk = $_POST['atk'];
    if($round == 1){
        if ($len == 1)
            $sql = "UPDATE around SET card1 = $card[0] WHERE round = $round";
        else if ($len == 2)
            $sql = "UPDATE around SET card1 = $card[0], card2 = $card[1] WHERE round = $round";
        else if ($len == 3)
            $sql = "UPDATE around SET card1 = $card[0], card2 = $card[1], card3 = $card[2] WHERE round = $round";
        else if ($len == 4)
            $sql = "UPDATE around SET card1 = $card[0], card2 = $card[1], card3 = $card[2], card4 = $card[3] WHERE round = $round";
        else if ($len == 5)
            $sql = "UPDATE around SET card1 = $card[0], card2 = $card[1], card3 = $card[2], card4 = $card[3], card5 = $card[4] WHERE round = $round";
    } else {
        if($len == 1)
        $sql = "INSERT INTO around (round, HP, atk, card1, card2, card3, card4, card5) 
                VALUES ($round, $HP, $atk, $card[0], 0, 0, 0, 0)";
    else if($len == 2)
        $sql = "INSERT INTO around (round, HP, atk, card1, card2, card3, card4, card5) 
                VALUES ($round, $HP, $atk, $card[0], $card[1], 0, 0, 0)";
    else if($len == 3)
        $sql = "INSERT INTO around (round, HP, atk, card1, card2, card3, card4, card5) 
                VALUES ($round, $HP, $atk, $card[0], $card[1], $card[2], 0, 0)";
    else if($len == 4)
        $sql = "INSERT INTO around (round, HP, atk, card1, card2, card3, card4, card5) 
                VALUES ($round, $HP, $atk, $card[0], $card[1], $card[2], $card[3], 0)";
    else if($len == 5)
        $sql = "INSERT INTO around (round, HP, atk, card1, card2, card3, card4, card5) 
                VALUES ($round, $HP, $atk, $card[0], $card[1], $card[2], $card[3], $card[4])";
    }
    $db->exec($sql);
    // echo json_encode($sql);
}