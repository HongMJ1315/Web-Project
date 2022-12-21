<!DOCTYPE html>
<html>

<head>
    <?php
    session_start();
    if (isset($_SESSION['username'])) 
        $player = $_SESSION['username'];
    else 
        header("location: login.php");
    ?> 
    <style>
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
/*
        @media (max-width: 960px) {
            .total {
                height: 100%;
                width: 100%;
            }

            .background {
                width: 100%;
                height: auto;
            }
        }

        /*
        @media (max-height: 500px) {
            .background {
                width: 100%;
                height: auto;
            }
        }*/

        .rival {
            width: 10%;
            position: absolute;
            top: 10%;
            right: 10%;
            text-align: center;
        }

        .ourside {
            width: 10%;
            position: absolute;
            bottom: 10%;
            left: 10%;
            text-align: center;
        }

        .card-on-desk {
            width: 50%;
            height: 50%;
            position: absolute;
            bottom: 25%;
            pointer-events: none;
            left: 25%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .hp {
            top: 0%;
            left: 0%;
            width: 100%;
            height: 10%;
            background-color: red;
        }


        .hands {
            display: flex;
            flex-wrap: nowrap;
            width: 50%;
            height: 25%;
            left: 25%;
            position: absolute;
            bottom: 0%;
        }

        .card>img, .N>img {
            width: 100%;
            height: auto;
            background-color: blue;
            pointer-events: none;
        }

        .card, .N {
            box-sizing: border-box;
            position: relative;

            width: 12.5%;
            height: auto;
        }

        .on-desk {
            display: flex;
            flex-wrap: wrap;
            height: 50%;
            width: auto;
            position: relative;
        }

        .on-desk>img {
            height: 100%;
        }

        .moving {
            display: none;
            border: 5px;
            border-style: solid;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0%;
            left: 0%;
            pointer-events: none;
            box-sizing: border-box;
            color: #fff;
        }

        .mycard {
            position: absolute;
            display: flex;
            flex-wrap: wrap;
            top: 0%;
            left: 0%;
            width: 50%;
            height: 100%;
            z-index: 1;
        }

        .rival-card {
            position: absolute;
            top: 0%;
            right: 0%;
            width: 50%;
            height: 100%;
            z-index: 1;
        }

        .post {
            position: absolute;
            top: 45%;
            left: 80%;
            width: 10%;
            height: 10%;
            z-index: 1;
            background-color: rgba(0, 0, 0, 0.5);
            text-align: center;
            color: rgb(255, 255, 255);
            line-height: 65px;
            font-size: 35px;
            cursor: pointer;
        }
        .surrender{
            position: absolute;
            top: 65%;
            left: 80%;
            width: 10%;
            height: 10%;
            z-index: 1;
            background-color: rgba(0, 0, 0, 0.5);
            text-align: center;
            color: #fff;
            line-height: 65px;
            font-size: 35px;
            cursor: pointer;
        }
        .atk{
            position: absolute;
            top: 85%;
            left: 80%;
            width: 10%;
            height: 10%;
            z-index: 1;
            background-color: rgba(0, 0, 0, 0.5);
            text-align: center;
            color: #fff;
            line-height: 65px;
            font-size: 35px;
        }
        .display {
            position: absolute;
            top: 10%;
            left: 40%;
            width: 25%;
            height: 25%;
            display: block;
            z-index: 2;
        }

        .display>img {
            width: 100%;
            height: auto;
        }
    </style>
    <script src="http://code.jquery.com/jquery-1.9.0rc1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">
        var move = false;
        var element;
        var now = [];
        var round, HP, atk;
        var run = setInterval(function(){getCard()}, 5000);
        var check_round_end;
        function Padding(){
            // console.log(atk);
            if(atk == 1){
                for(var i = 0; i < 8; i++){
                    var nowC = document.getElementById("card" + i);
                    if(nowC.type == 2){
                        nowC.className = "N";
                    }
                    else{
                        nowC.className = "card";
                    }
                }
            }
            else if(atk == 0){
                for(var i = 0; i < 8; i++){
                    var nowC = document.getElementById("card" + i);
                    if(nowC.type == 1)
                        nowC.className = "N";
                    else
                        nowC.className = "card";
                }
            }
        }
        
        function Check_Round(){
            $.ajax({
                type: "POST",
                url: "solve.php",
                dataType: "json",
                data: {
                    rd: round
                },
                success: function(data){
                    // console.log(1);
                    if(data[0] == 1){
                        round++;
                        //*這條
                        document.getElementById("mycard").innerHTML = "";
                        //*/
                        document.getElementById("rival-card").innerHTML = "";
                        while(now.length > 0)
                            now.pop();
                        run = setInterval(function(){getCard()}, 5000);
                        
                        var cnt = 0;
                        var id = 1;
                        for(var i = 0; i < 8; i++){
                            var nowC = document.getElementById("card" + i);
                            if(nowC.innerHTML == "" && cnt < 4){
                                nowC.type = data[id][2];
                                nowC.innerHTML = "<img id='"+ data[id][0] + "' src='" + data[id][1] + "'>";
                                id++;
                                cnt++;
                            }
                            else{
                                cnt++;
                            }
                        }
                        document.getElementById("hp").innerHTML = data[5][1];
                        // $("#hp").css("width", parseInt(data[5][1]) / 50 + "%");
                        document.getElementById("rival-hp").innerHTML = data[5][0];
                        // $("#rival-hp").css("width", parseInt(data[5][1]) / 50 + "%");
                        if(data[5][1] <= 0){
                            setTimeout(function(){
                                $.ajax({
                                    type: "POST",
                                    url: "init.php",
                                    dataType: "json",
                                    success: function(data){
                                        window.location.href = "defeat.php";
                                    }
                                })
                            }, 3000);
                        }
                        if(data[5][0] <= 0){
                            setTimeout(function(){
                                $.ajax({
                                    type: "POST",
                                    url: "init.php",
                                    dataType: "json",
                                    success: function(data){
                                        window.location.href = "victory.php";
                                    }
                                })
                            }, 3000);
                        }
                        atk = data[5][2];
                        if(atk == 1)
                            document.getElementById("atk").innerHTML = "攻方";
                        else
                            document.getElementById("atk").innerHTML = "防方";
                        Padding();
                        clearInterval(check_round_end);
                    }
                },
                error: function(jqXHR){
                    // console.log(0);
                }
            })
        }

        function getCard(){
            $.ajax({
                type: "POST",
                url: "getCardB.php",
                dataType: "json",
                data: {
                    rd: round
                },
                success: function(data){
                    var rival = document.getElementById("rival-card");
                    console.log(round, data);
                    if(data[0][0] == 1){
                        rival.innerHTML = "<h1>PASS!</h1>";
                        check_round_end = setInterval(function(){Check_Round()}, 5000);
                    }
                    else if(data[0][1] == 1){
                        rival.innerHTML = "<h1>對手投降!</h1>";
                        setTimeout(function() {
                            $.ajax({
                                type: "POST",
                                url: "init.php",
                                dataType: "json",
                                success: function(data){
                                    window.location.href = "victory.php";
                                }
                            })
                        }, 5000);
                    }
                    else{
                        for(var i = 1; i < data.length; i++){
                            rival.innerHTML += "<div class='on-desk'><img id='"+ data[i][0] + "' src='" + data[i][1] + "'></div>";
                        }
                    }
                    if(data.length > 1){
                        clearInterval(run);    
                        check_round_end = setInterval(function(){Check_Round()}, 10000);
                    }
                },
                error: function(){
                    console.log("failed");
                }
            })
        }
        var nowx = 0, nowy = 0;
        $(function () {
            var _x, _y;
            $(".card").mousedown(function (e) {
                element = $(this);
                var className = element.attr("class");
                if(className != "card")
                    return;
                _x = e.pageX - parseInt($(this).css("left"));
                _y = e.pageY - parseInt($(this).css("top"));
                move = true;
            })
            $(document).mousemove(function (e) {
                if (move) {
                    var x = e.pageX - _x;
                    var y = e.pageY - _y;
                    $(element).css({ "top": y, "left": x });
                    $(".moving").css({ display: "block" });
                }
            }).mouseup(function () {
                // console.log("click up", move);
                $(".moving").css({ display: "none" });
                //如果再桌子上
                var desk_x = $(".card-on-desk").offset().left;
                var desk_y = $(".card-on-desk").offset().top;
                var desk_w = $(".card-on-desk").width();
                var desk_h = $(".card-on-desk").height();
                if (element.offset().left > desk_x && element.offset().left < desk_x + desk_w && element.offset().top > desk_y && element.offset().top < desk_y + desk_h && move) {
                    now.push(parseInt(element.children("img").attr("id")));
                    //把卡片放到桌子上 並疊在最上面
                    var tmp = element.clone();
                    element.css({ "top": 0, "left": 0 });
                    $(".mycard").append(tmp);
                    element.children("img").remove();
                    var card_x = nowx;
                    var card_y = nowy;
                    nowx = nowx + element.height() / 4;
                    nowy = nowy + element.width() / 4;
                    tmp.attr("class", "on-desk");
                    tmp.css({ "top": card_y, "left": card_x, "z-index": 1/*, "transform": "rotate(" + rotate + "deg)"*/ });
                    move = false;
                    var id = element.attr("id");
                    var hand = $("#hands");
                    for (var i = id.substr(4, 1); i <= 9; i++) {
                        var nowC = hand.children("#card" + i);
                        var next = hand.children("#card" + (parseInt(i) + 1));
                        nowC[0].innerHTML = next[0].innerHTML;
                        nowC[0].className = next[0].className; 
                        nowC[0].type = next[0].type;
                        // console.log(nowC);
                    }
                    Padding();
                }
                else if (move) {
                    element.css({ "top": 0, "left": 0 });
                    move = false;
                }
            })
            $(".card").dblclick(function () {
                var element = $(this);
                var className = element.attr("class");
                if(className != "card")
                    return;
                now.push(parseInt(element.children("img").attr("id")));
                var tmp = element.clone();
                element.css({ "top": 0, "left": 0 });
                $(".mycard").append(tmp);
                element.children("img").remove();
                var card_x = nowx;
                var card_y = nowy;
                nowx = nowx + element.height() / 4;
                nowy = nowy + element.width() / 4;
                tmp.attr("class", "on-desk");
                tmp.css({ "top": card_y, "left": card_x, "z-index": 1/*, "transform": "rotate(" + rotate + "deg)"*/ });
                move = false;
                var id = element.attr("id");
                var hand = $("#hands");
                for (var i = id.substr(4, 1); i <= 9; i++) {
                    var nowC = hand.children("#card" + i);
                    var next = hand.children("#card" + (parseInt(i) + 1));
                    nowC[0].innerHTML = next[0].innerHTML;
                    nowC[0].className = next[0].className; 
                    nowC[0].type = next[0].type;
                    // console.log(nowC);
                }
                Padding();
            });
            $(".card").mouseover(function () {
                var obj = $(this);
                var tmp = obj.clone();
                var img = tmp.children("img")[0];
                $(img).mouseover(function () {
                    $(".display").css({ "display": "none" });
                })
                tmp.css({ "display": "none" });
                $(".display").html("");
                $(".display").append(img);
                $(".display").css({ "display": "block" });
            })
            $(".card").mouseout(function () {
                $(".display").css({ "display": "none" });
            })
        })
        function post(){
            $.ajax({
                type: "POST",
                url: "playB.php",
                dataType: "json",
                data: {
                    id: now,
                    rd: round,
                    HP: HP,
                    atk: atk,
                    len: now.length
                },
                success: function(data){
                    if(atk == 0){
                        check_round_end = setInterval(function(){Check_Round()}, 10000);
                    }
                },
                error: function(jqXHR){
                    console.log("fail");
                }
            })
        }
        function init(){
            round = 1;
            HP = 50;
            while(now.length > 0)
                now.pop();
            $.ajax({
                type: "POST",
                url: "start.php",
                dataType: "json",
                success: function(data){
                    // console.log(data);
                    atk = (data[0]) ^ 1;
                    if(atk == 1)
                        document.getElementById("atk").innerHTML = "攻方";
                    else
                        document.getElementById("atk").innerHTML = "防方";
                    for(var i = 0; i < data.length - 1; i++){
                        var nowC = document.getElementById("card" + i);
                        nowC.type = data[i + 1][2];
                        // console.log(now.type);
                        nowC.innerHTML = "<img id='"+ data[i + 1][0] + "' src='" + data[i + 1][1] + "'>";
                    }
                    Padding();
                }
            })
            
        }
        function surrender(){
            $.ajax({
                type: "POST",
                url: "Bsurrender.php",
                dataType: "json",
                data: {
                    rd: round,
                },
                success: function(data){
                    window.location.href = "defeat.php";
                }
            })
        }
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

            //$(".total").css({ "height": tw * (639 / 960) });
            var bh = $(".post").height();
            $(".post").css({ "line-height": bh + "px", "font-size": bh - 40 * ((639 / 960)) + "px", "color": "#fff" });
            $(".surrender ").css({ "line-height": bh + "px", "font-size": bh - 40 * ((639 / 960)) + "px", "color": "#fff" });
            var deskchild = $(".mycard").children();
            if (deskchild.length > 3) {
                deskchild.css({
                    "width": "33%"
                });
            }
            //sh-40*($(".total").height() / 4- 20)/100 
            $(".hp").css({ "font-size": $(".hp").height() * 0.8 + "px" });
            $(".rival-name").css({ "font-size": $(".rival-name").height() * 0.8 + "px" });
            $(".name").css({ "font-size": $(".name").height() * 0.8 + "px" });

        }, 10);
    </script>
</head>

<body onload = init()>

    <div class="total">
        <img class="background" src="../background/war-6111531_960_7201.jpg">
        <div class="display"></div>
        <div class="rival" id="rival">
            <img src="">
            <div class="hp" id="rival-hp" name="rival-hp">50</div>
            <div class="rival-name" id="rival-name" name="rival-name">name</div>
        </div>
        <div class="ourside" id="ourside" name="ourside">
            <div class="name" id="name" name="name">name</div>
            <div class="hp" id="hp" name="hp">50</div>
            <img src="">
        </div>
        <div class="card-on-desk" id="card-on-desk" name="card-on-desk">
            <div class="rival-card" id="rival-card" name="rival-card"></div>
            <!-- 牌的顯示太大了 -->
            <div class="mycard" id="mycard" name="mycard"></div>
            <div class="moving">移動到此處按下左鍵</div>
        </div>
        <div class="hands" id="hands" name="hands">
            <div class="card" id="card0"></div>
            <div class="card" id="card1"></div>
            <div class="card" id="card2"></div>
            <div class="card" id="card3"></div>
            <div class="card" id="card4"></div>
            <div class="card" id="card5"></div>
            <div class="card" id="card6"></div>
            <div class="card" id="card7"></div>
        </div>
        <div class="post" onclick="post()">出牌</div>
        <div class="atk" id="atk"></div>
        <div class="surrender" onclick="surrender()">投降</div>
    </div>
</body>

</html>