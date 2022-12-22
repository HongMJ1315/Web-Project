<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Game Lobby</title>
    <style>
        /*背景圖案 背景淡化0.5*/
        body {
            overflow: hidden;
        }

        /*total 高度最大化 左右置中*/

        .total {
            position: absolute;
            top: 0%;
            left: 0%;
            max-width: 960px;
            max-height: 639px;
            z-index: 1;
        }

        .background {
            position: absolute;
            pointer-events: none;
            height: 100%;
            top: 0%;
            left: 0%;
            background-color: rgba(0, 0, 0, 0.5);

        }


        .room {
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
            width: 10%;
            height: 10%;
            border: 1px solid #000;
            position: absolute;
            bottom: 5%;
            right: 5%;
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
        setInterval(function () {
            var wh = $(window).height();
            var ww = $(window).width();
            var th = $(".total").height();
            var tw = $(".total").width();
            if (ww / wh > (960 / 639)) {
                $(".total").css({ "width": wh * (960 / 639) });
                $(".total").css({ "height": wh });
            }
            else {
                $(".total").css({ "width": ww });
                $(".total").css({ "height": ww * (639 / 960) });
            }
            
        }, 10);
        $(function(){
            $(".start").mouseover(function () {
                $(this).css({ "width": "12%", "height": "12%", "right": "4%", "buttom": "4%" });
            }).mouseout(function () {
                $(this).css({ "width": "10%", "height": "10%", "right": "5%", "buttom": "5%" });
            }).mousedown(function () {
                $(this).css({ "width": "12%", "height": "12%", "right": "4%", "buttom": "4%", "background-color": "rgba(0,0,0,1)" });
            }).mouseup(function () {
                $(this).css({ "width": "12%", "height": "12%", "right": "4%", "buttom": "4%", "background-color": "rgba(0,0,0,0.5)" });
            })
        })
            
        function start(){
            //*
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
    <div class="total">
        <img class="background" src="../background/bombed-932108_960_720.jpg">
        <div class="start" onclick="start()">
            start
        </div>
    </div>
</body>

</html>