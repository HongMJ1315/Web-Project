<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>歐勒の趟</title>
    <script src="http://code.jquery.com/jquery-1.9.0rc1.js"></script>
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

        .login {
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
            max-height: 959px;
            z-index: 1;
        }

        .link{
            position: absolute;
            left : 0%;
            bottom: 0%;
            height :10%;
            display: flex;
            flex-wrap: nowrap;
        }
        
        .icon{
            height: 100%
        }
    </style>
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
            // console.log(lw, lh, iw, ih);
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
        <div class="link">
            <a  href="https://github.com/xiaoyo123/Web-Project">
                <img class="icon" src="https://miro.medium.com/max/1400/0*c43pw7UiQgpfjDCl.jpg">
            </a>
            <a href="https://1drv.ms/p/s!AuERejR772uKi85Rt4_vvpK2xk6MQw">
                <img class="icon" src="https://icons.iconarchive.com/icons/carlosjj/microsoft-office-2013/256/PowerPoint-icon.png">
            </a>
        </div> 
        <div class="login">
            <form method="post" action="login.php" name="login" id="form">
                user name：<input type="text" name="username" id="id" class="user"></br>
                password：<input type="password" name="password" class="user"></br>
                <button id="start">Join</button>
            </form>
            <form action="sign_up.php" name=sign_up id="but">
                <button id="sign">sign up</button>
            </form>
            <?php
            session_start();
            if (isset($_POST['username'], $_POST['password'])) {
                try {
                    $db = new PDO('mysql: host=localhost; dbname=account', 'root', '801559');
                    $stmt = $db->prepare('SELECT username FROM login WHERE username = ? and password = ?');
                    $stmt->execute(array($_POST['username'], $_POST['password']));
                    $row = $stmt->fetchAll();
                    if (count($row) == 0) {
                        print "<span class='error'>wrong password or username</span>";
                    } else {
                        $_SESSION['username'] = $_POST['username'];
                        header("location: lobby.php");
                    }
                } catch (PDOException $e) {
                    print "error " . $e->getMessage();
                }
            }
            ?>
        </div>
        
    </div>
</body>

</html>