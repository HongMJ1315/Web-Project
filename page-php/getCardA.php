<?php
header('Content-Type: application/json; charset=UTF-8');

$db = new PDO('mysql: host=localhost; dbname=account', 'root', '801559');


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $round = $_POST['rd'];

    $sql = $db->prepare("SELECT card1, card2, card3, card4, card5 FROM bround WHERE round = ?");
    $sql->execute(array($round));

    $arr = array();
    while($row = $sql->fetch(PDO::FETCH_OBJ)){
        $now = $db->prepare("SELECT ID, src FROM card WHERE ID = ?");
        $now->execute(array($row->card1));
        while($ret = $now->fetch(PDO::FETCH_OBJ)){
            array_push($arr, $b = array($ret->ID, $ret->src));
        }
        $now->execute(array($row->card2));
        while($ret = $now->fetch(PDO::FETCH_OBJ)){
            array_push($arr, $b = array($ret->ID, $ret->src));
        }
        $now->execute(array($row->card3));
        while($ret = $now->fetch(PDO::FETCH_OBJ)){
            array_push($arr, $b = array($ret->ID, $ret->src));
        }
        $now->execute(array($row->card4));
        while($ret = $now->fetch(PDO::FETCH_OBJ)){
            array_push($arr, $b = array($ret->ID, $ret->src));
        }
        $now->execute(array($row->card5));
        while($ret = $now->fetch(PDO::FETCH_OBJ)){
            array_push($arr, $b = array($ret->ID, $ret->src));
        }
    }
    echo json_encode($arr);
}