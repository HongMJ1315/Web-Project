<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Game</title>
    <style>
    </style>
    <script>
    </script>
</head>

<body>
    <div>
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
</body>

</html>