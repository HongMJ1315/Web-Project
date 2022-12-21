<?php
header('Content-Type: application/json; charset=UTF-8');

$db = new PDO('mysql: host=localhost; dbname=account', 'root', '801559');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $round = $_POST['rd'];
    $ret = array();

    array_push($ret, 1);
    
    for ($i = 0; $i < 4; $i++) {
        $ID = rand(1, 49);
        $card = $db->prepare("SELECT src, type FROM card WHERE ID = ?");
        $card->execute(array($ID));
        $CARD = $card->fetch(PDO::FETCH_OBJ);
        array_push($ret, $tmp = array($ID, $CARD->src, $CARD->type));
    }

    $dataA = $db->prepare("SELECT HP, atk FROM around WHERE round = ?");
    $dataB = $db->prepare("SELECT HP, atk FROM bround WHERE round = ?");
    $dataA->execute(array($round));
    $dataB->execute(array($round));

    $DATAA = $dataA->fetch(PDO::FETCH_OBJ);
    $DATAB = $dataB->fetch(PDO::FETCH_OBJ);

    array_push($ret, $tmp = array($DATAA->HP, $DATAB->HP, $DATAA->atk));

    echo json_encode($ret);
}
