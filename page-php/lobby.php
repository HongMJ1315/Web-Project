<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Game Lobby</title>
    <style>
        /*背景圖案 背景淡化0.5*/
        body {
            /* background-image: url("../background/bombed-932108_960_720.jpg"); */
            background-repeat: no-repeat;
            background-position: 50% 0%;
            background-size: 80%;
            /* background-size: cover; */
            /* background-color: rgba(0, 0, 0, 0.5); */
            background-blend-mode: multiply;
        }


        .room {

            width: auto;
            height: auto;

            border: 1px solid #000;
            float: left;
            margin: 10px;
            box-sizing: border-box;
            width: calc(100% / 3 - 20px);
            height: calc(100% / 3 - 20px);
        }


        .row {
            width: 100%;
            height: 50%;
            display: flex;
            flex-wrap: wrap;
        }
    </style>
    <script>
        function init() {
            document.getElementById("room0").addEventListener("click", function () {
                window.location.href = "game.php?roomid=0";
            });
            document.getElementById("room1").addEventListener("click", function () {
                window.location.href = "game.php?roomid=1";
            });
            document.getElementById("room2").addEventListener("click", function () {
                window.location.href = "game.php?roomid=2";
            });
            document.getElementById("room3").addEventListener("click", function () {
                window.location.href = "game.php?roomid=3";
            });
            document.getElementById("room4").addEventListener("click", function () {
                window.location.href = "game.php?roomid=4";
            });
            document.getElementById("room5").addEventListener("click", function () {
                window.location.href = "game.php?roomid=5";
            });
        }
        window.addEventListener("load", init, false);
    </script>
</head>

<body>
    <div class="wrap">
        <div class="row">
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                $db = new PDO('mysql: host=localhost; dbname=account', 'root', '801559');
                $q = $db->query("SELECT roomid, player1, player2 FROM play order by roomid");
                while ($row = $q->fetch(PDO::FETCH_OBJ)) {
                    echo "<div id='room" . $row->roomid . "' class='room'>";
                    echo "<div class='game_room'>";
                    echo "<div class='room_name'>";
                    echo "<h1>Room " . $row->roomid . "</h1></div>";
                    echo "<div class='room_info'>";
                    if ($row->player1 == "") {
                        echo "<p>Players: 0/2</p>";
                    } elseif ($row->player2 == "") {
                        echo "<p>Players: 1/2</p>";
                    } else {
                        echo "<p>Players: 2/2</p>";
                    }
                    echo "</div></div></div>";
                }
            }//*
            else{
                header("location: login.php");
            }//*/
            ?>
        </div>
    </div>
</body>

</html>