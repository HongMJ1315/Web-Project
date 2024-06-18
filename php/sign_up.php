<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Game</title>
   <style>
        .error {
            color: red;
        }

        .background {
            position: absolute;
            pointer-events: none;
            height: 100%;
            top: 0%;
            left: 0%;
            background-color: rgba(0, 0, 0, 0.5);

        }

        .signed {
            position: absolute;
            background-color: #7c7153;
            width: 30%;
            right: 0%;
            bottom: 10%;
        }

        form {
            position: relative;
        }

        button {
            right: 0%;
        }

        .total {
            position: absolute;
            top: 0%;
            left: 0%;
            max-width: 1280px;
            max-height: 950px;
            z-index: 1;
        }
    </style>
    <script src="http://code.jquery.com/jquery-1.9.0rc1.js"></script>
    <script>
        setInterval(function () {
            var wh = $(window).height();
            var ww = $(window).width();
            var th = $(".total").height();
            var tw = $(".total").width();
            if (ww / wh > (1280 / 959)) {
                $(".total").css({ "width": wh * (1280 / 959) });
                $(".total").css({ "height": wh });
            }
            else {
                $(".total").css({ "width": ww });
                $(".total").css({ "height": ww * (959 / 1280) });
            }
            var sh = $(".start").height();
            var sw = $(".start").width();
            $(".start").css({ "width": $(".total").width() / 3 - 20, "height": $(".total").height() / 4 - 20, "font-size": sh - 40 * ($(".total").height() / 4 - 20) / 100 });
            var lw = $(".login").width();
            var lh = $(".login").height();
            var iw = $("#id").width();
            var ih = $("#id").height();
            if (lw < 150) {
                $(".user").css({ "width": lw - 20 });
            }
            else {
                $(".user").css({ "width": 140 });
            }
        }, 10);
    </script>
</head>

<body>
    <div class="total">
        <img src="../background/login.jpg" class="background">
        <div class="signed">
        <form method="post" action="sign_up.php" name="login" id="form">
            user name：<input type="text" name="username" id="id"></br>
            password：<input type="password" name="password"></br>
            check password：<input type="check" name="check"></br>
            <button id="start">submit</button>
            <?php
            if (isset($_POST['username'], $_POST['password'], $_POST['check'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $check = $_POST['check'];
                $db = new PDO('mysql: host=localhost; dbname=account', 'root', '801559');
                if ($check == $password) {
                    $stmt = $db->prepare('SELECT username FROM login WHERE username = ? and password = ?');
                    $stmt->execute(array($_POST['username'], $_POST['password']));
                    $row = $stmt->fetchAll();
                    if (count($row)) {
                        print "<span class='error'>username exist!</span>";
                    } else {
                        $sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
                        $db->exec($sql);
                        print "</br><h1>register successful</br>";
                        print "<a href='login.php'>back to login</a>";
                    }
                } else {
                    echo "密碼和確認密碼不同!";
                }
            }
            ?>
        </form>
        </div>
    </div>
</body>

</html>