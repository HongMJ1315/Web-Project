<?php
$a = array();
$db = new PDO('mysql: host=localhost; dbname=account', 'root', '801559');

$sql = $db->prepare("SELECT atk FROM around WHERE round = ?");
$sql->execute(array(1));
while($row = $sql->fetch(PDO::FETCH_OBJ)){
    array_push($a, $row->atk);
}

for($i = 0; $i < 2; $i++){
    $now = rand(1, 15);
    $sql = $db->prepare("SELECT ID, src, type FROM card WHERE ID = ?");
    $sql->execute(array($now));
    while($row = $sql->fetch(PDO::FETCH_OBJ)){
        array_push($a, $b = array($now, $row->src, $row->type));
    }
}
$now = rand(16, 30);
$sql = $db->prepare("SELECT ID, src, type FROM card WHERE ID = ?");
$sql->execute(array($now));
while($row = $sql->fetch(PDO::FETCH_OBJ)){
    array_push($a, $b = array($now, $row->src, $row->type));
}
$now = rand(1, 49);
$sql = $db->prepare("SELECT ID, src, type FROM card WHERE ID = ?");
$sql->execute(array($now));
while($row = $sql->fetch(PDO::FETCH_OBJ)){
    array_push($a, $b = array($now, $row->src, $row->type));
}

echo json_encode($a);