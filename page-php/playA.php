<?php
header('Content-Type: application/json; charset=UTF-8');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $db = new PDO('mysql: host=localhost; dbname=account', 'root', '801559');
    
    $round = $_POST['rd'];
    $HP = $_POST['HP'];
    $atk = $_POST['atk'];
    $card = $_POST['id'];
    $len = $_POST['len'];
    

    $damage = 0;
    $defense = 0;
    $persist = 0;
    $invincible = 0;
    $lifesteal = 0;
    $purify = 0;
    
    $sql = $db->prepare("SELECT type, DATA FROM card WHERE ID = ?");
    if ($len > 0) {
        for ($i = 0; $i < $len; $i++) {
            $sql->execute(array($card[$i]));
            while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
                if ($row->type == 1) // atk
                    $damage += $row->DATA;
                elseif ($row->type == 2) // def
                    $defense += $row->DATA;
                elseif ($row->type == 3) // per
                    $persist += $row->DATA;
                elseif ($row->type == 4) // inv
                    $invincible = 1;
                elseif ($row->type == 5) // pur
                    $purify = 1;
                elseif ($row->type == 6) { // lif
                    $lifesteal += ($row->DATA / 2);
                    $damage += $row->DATA;
                }
            }
        }
    }
    // HP loss or get in this round
    if ($round > 1) {
        $now_HP = $db->prepare("SELECT HP FROM around WHERE round = ?");
        $now_HP->execute(array($round - 1));
        $now = $now_HP->fetch(PDO::FETCH_OBJ);
        $HP = $now->HP;
    }

    $self_persist = 0;
    if ($purify == 0 && $invincible == 0) {
        $per = $db->prepare("SELECT self_persist FROM around WHERE round = ?");
        $per->execute(array($round - 1));
        while ($row1 = $per->fetch(PDO::FETCH_OBJ)) { // self-per level in last round
            $self_persist += $row1->self_persist;
        }
        $ed = $db->prepare("SELECT persist FROM bround WHERE round = ?");
        $ed->execute(array($round));
        while($row2 = $ed->fetch(PDO::FETCH_OBJ)){ // self-per level get in this round
            $self_persist += $row2->persist;
        }
    }
    $HP -= $self_persist * 2;
    $HP += $lifesteal;

    // get atk
    $get_damage = $db->prepare("SELECT damage FROM bround WHERE round = ?");
    $get_damage->execute(array($round));
    if($invincible == 0){
        while($row = $get_damage->fetch(PDO::FETCH_OBJ)){
            if($row->damage > $defense){
                $HP -= ($row->damage - $defense);
            }
        }
    }

    if($round == 1){
        if ($len == 0)
            $sql = "UPDATE around SET HP = $HP, self_persist = $self_persist, pass = 1 WHERE round = $round";
        elseif ($len == 1)
            $sql = "UPDATE around SET HP = $HP, card1 = $card[0], damage = $damage, defense = $defense, persist = $persist, invincible = $invincible, 
                    lifesteal = $lifesteal, purify = $purify, self_persist = $self_persist, pass = 0 WHERE round = $round";
        else if ($len == 2)
            $sql = "UPDATE around SET HP = $HP, card1 = $card[0], card2 = $card[1], damage = $damage, defense = $defense, persist = $persist, 
                    invincible = $invincible, lifesteal = $lifesteal, purify = $purify, self_persist = $self_persist, pass = 0 WHERE round = $round";
        else if ($len == 3)
            $sql = "UPDATE around SET HP = $HP, card1 = $card[0], card2 = $card[1], card3 = $card[2], damage = $damage, defense = $defense, 
                    persist = $persist, invincible = $invincible, lifesteal = $lifesteal, purify = $purify, self_persist = $self_persist, pass = 0 WHERE round = $round";
        else if ($len == 4)
            $sql = "UPDATE around SET HP = $HP, card1 = $card[0], card2 = $card[1], card3 = $card[2], card4 = $card[3], damage = $damage, 
                    defense = $defense, persist = $persist, invincible = $invincible, lifesteal = $lifesteal, purify = $purify, self_persist = $self_persist, pass = 0 WHERE round = $round";
        else if ($len == 5)
            $sql = "UPDATE around SET HP = $HP, card1 = $card[0], card2 = $card[1], card3 = $card[2], card4 = $card[3], card5 = $card[4], 
                    damage = $damage, defense = $defense, persist = $persist, invincible = $invincible, lifesteal = $lifesteal, purify = $purify, self_persist = $self_persist, pass = 0 WHERE round = $round";
    } else {
        if($len == 0)
            $sql = "INSERT INTO bround (round, HP, atk, card1, card2, card3, card4, card5, damage, defense, persist, invincible, lifesteal, purify, self_persist, pass, surrender) 
                    VALUES ($round, $HP, $atk, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $self_persist, 1, 0)";
        else if ($len == 1)
            $sql = "INSERT INTO around (round, HP, atk, card1, card2, card3, card4, card5, damage, defense, persist, invincible, lifesteal, purify, self_persist, pass, surrender) 
                VALUES ($round, $HP, $atk, $card[0], 0, 0, 0, 0, $damage, $defense, $persist, $invincible, $lifesteal, $purify, $self_persist, 0, 0)";
        else if ($len == 2)
            $sql = "INSERT INTO around (round, HP, atk, card1, card2, card3, card4, card5, damage, defense, persist, invincible, lifesteal, purify, self_persist, pass, surrender) 
                VALUES ($round, $HP, $atk, $card[0], $card[1], 0, 0, 0, $damage, $defense, $persist, $invincible, $lifesteal, $purify, $self_persist, 0, 0)";
        else if ($len == 3)
            $sql = "INSERT INTO around (round, HP, atk, card1, card2, card3, card4, card5, damage, defense, persist, invincible, lifesteal, purify, self_persist, pass, surrender) 
                VALUES ($round, $HP, $atk, $card[0], $card[1], $card[2], 0, 0, $damage, $defense, $persist, $invincible, $lifesteal, $purify, $self_persist, 0, 0)";
        else if ($len == 4)
            $sql = "INSERT INTO around (round, HP, atk, card1, card2, card3, card4, card5, damage, defense, persist, invincible, lifesteal, purify, self_persist, pass, surrender) 
                VALUES ($round, $HP, $atk, $card[0], $card[1], $card[2], $card[3], 0, $damage, $defense, $persist, $invincible, $lifesteal, $purify, $self_persist, 0, 0)";
        else if ($len == 5)
            $sql = "INSERT INTO around (round, HP, atk, card1, card2, card3, card4, card5, damage, defense, persist, invincible, lifesteal, purify, self_persist, pass, surrender) 
                VALUES ($round, $HP, $atk, $card[0], $card[1], $card[2], $card[3], $card[4], $damage, $defense, $persist, $invincible, $lifesteal, $purify, $self_persist, 0, 0)";
    }
    $db->exec($sql);
    echo json_encode(1);
}