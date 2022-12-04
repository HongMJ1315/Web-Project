<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Game</title>
    <style>
        .error{
            color: red;
        }
    </style>
    <script>
    </script>
</head>

<body>
    <div>
        <form method="post" action="login.php" name="login" id="form">
            user name：<input type="text" name="username" id="id"></br>
            password：<input type="password" name="password"></br>
            <button id="start">Join</button>
        </form>
        <form action="sign_up.php" name=sign_up>
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
</body>

</html>