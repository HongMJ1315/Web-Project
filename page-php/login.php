<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Game</title>
    <style>
        .setpassword {
            display: none;
        }
    </style>
    <script>
        function submit() {
            var box = document.querySelector(".setpassword");
            // 資料褲檢查帳號 帳號不存在 box.style.backgroundColor = "block";
            if (box.style.display == "block") {
                var form = document.getElementById("form");
                form.submit();
            }
        }
        function init() {
            document.getElementById("start").addEventListener("click", submit, false);
        }
        window.addEventListener("load", init, false);
    </script>
</head>

<body>
    <div>
        <form action="lobby.php" name="login" id="form">
            <div class="user">user name：<input type="text"></div>
            <div class="setpassword" name="setingpassword">password：<input type="password"></div>
            <div class="password" name="password">password：<input type="password"></div>
            <button id="start">Join</button>
        </form>
    </div>
</body>

</html>