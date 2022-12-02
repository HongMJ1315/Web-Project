<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            margin: 0px;
            padding: 0px;
            border: none;
            /*position: relative;*/
        }

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
            background-color: aqua;
        }

        .hp {
            top: 0%;
            left: 0%;
            width: 100%;
            height: 10%;
            background-color: red;
        }


        .hands {
            width: 50%;
            height: 25%;
            left: 25%;
            position: absolute;
            bottom: 0%;
        }

        .card>img {
            width: 100%;
            height: auto;
            background-color: blue;
            pointer-events: none;
        }

        .card {
            position: relative;
            display: inline-block;
            width: 100px;
            height: 100px;
            background-image: url(../atk/2022_11_17_22_25_IMG_7586.PNG);
        }

        .on-desk {
            position: absolute;
            width: 20%;
        }

        .on-desk>img {
            width: 100%;
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
        }

        .mycard {
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            z-index: 1;

        }
    </style>
    <script src="http://code.jquery.com/jquery-1.9.0rc1.js"></script>
    <script type="text/javascript">
        var move = false;
        var element;
        $(function () {
            var _x, _y;
            $(".card").mousedown(function (e) {
                element = $(this);
                _x = e.pageX - parseInt($(this).css("left"));
                _y = e.pageY - parseInt($(this).css("top"));
                move = true;
                console.log("click", move);
            })
            $(document).mousemove(function (e) {
                console.log("moving", move);
                if (move) {
                    var x = e.pageX - _x;
                    var y = e.pageY - _y;
                    $(element).css({ "top": y, "left": x });
                    $(".moving").css({ display: "block" });
                }
            }).mouseup(function () {
                console.log("click up", move);
                $(".moving").css({ display: "none" });
                //如果再桌子上
                var desk_x = $(".card-on-desk").offset().left;
                var desk_y = $(".card-on-desk").offset().top;
                var desk_w = $(".card-on-desk").width();
                var desk_h = $(".card-on-desk").height();
                console.log(desk_x, desk_y, desk_w, desk_h);
                if (element.offset().left > desk_x && element.offset().left < desk_x + desk_w && element.offset().top > desk_y && element.offset().top < desk_y + desk_h && move) {
                    console.log("在桌子上");
                    //把卡片放到桌子上 並疊在最上面
                    element.remove();
                    $(".mycard").append(element);
                    var card_x = ((Math.random() * 1000) % (50));
                    var card_y = ((Math.random() * 1000) % (10) + element.height() / 4);
                    var rotate = ((Math.random() * 1000) % (30) - 15);
                    //更改卡片類別
                    element.attr("class", "on-desk");
                    element.css({ "top": card_y, "left": card_x, "z-index": 1, "transform": "rotate(" + rotate + "deg)" });
                }
                else if (move) {
                    console.log("不在桌子上");
                    element.css({ "top": 0, "left": 0 });
                }
                move = false;
            })
        })
    </script>
</head>

<body>
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
        <div class="mycard" id="mycard" name="mycard"></div>
        <div class="moving">移動到此處按下左鍵</div>
    </div>
    <div class="hands" id="hands" name="hands">
        <div class="card" id="card0">
            <img src="../atk/2022_11_17_22_25_IMG_7586.PNG">
        </div>
        <div class="card" id="card1">
            <img src="../atk/2022_11_18_15_18_IMG_7591.JPG">
        </div>
    </div>
</body>

</html>