<?php
$db = new PDO('mysql: host=localhost; dbname=account', 'root', '801559');

$up = "UPDATE play SET player1 = '', player2 = ''";
$delA = "DELETE FROM around";
$delB = "DELETE FROM bround";

$db->exec($up);
$db->exec($delA);
$db->exec($delB);

echo json_encode(1);