<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Game Lobby</title>
    <style>
        /*背景圖案 背景淡化0.5*/
        body {
            background-image: url("../background/bombed-932108_960_720.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-color: rgba(0, 0, 0, 0.5);
            background-blend-mode: multiply;
        }


        .room {
            background-image: url("../background/war-6111531_960_720.jpg");
            background-size: 100% 100%;

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


        .start {
            background-color: rgba(0, 0, 0, 0.5);
            background-blend-mode: multiply;
            width: 300px;
            height: 100px;
            border: 1px solid #000;
            position: absolute;
            bottom: 50px;
            right: 50px;
            /*文字在正中間*/
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            color: #fff;

            margin: 10px;
            box-sizing: border-box;
        }
    </style>
    <script src="http://code.jquery.com/jquery-1.9.0rc1.js"></script>
    <script>
        function start(){
            window.location.href = "gameA.php";
            /*
            $.ajax({
                type: "POST",
                url: "check.php",
                dataType: "json",
                success: function(data){
                    console.log(data);
                    if(data == 1){
                        alert("busy line");
                    }
                    else{
                        window.location.href = "gameA.php";
                    }
                }   
            })//*/
        }
    </script>
</head>

<body>
    <div class="wrap">
        <div class="row">
            <!-- 開始遊戲 -->
            <div class="start" onclick="start()">
                start
            </div>
        </div>
    </div>
</body>

</html>