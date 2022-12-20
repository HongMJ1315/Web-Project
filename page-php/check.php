<?php
$db = new PDO('mysql: host=localhost; dbname=account', 'root', '801559');
$sql = $db->query("SELECT player1, player2 FROM play");
$ret = 1;
while($row = $sql->fetch(PDO::FETCH_OBJ)){
    if ($row->player1 == "" || $row->player2 == "")
        $ret = 0;
    else
        $ret = 1;
}
echo json_encode($ret);