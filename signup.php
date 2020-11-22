<?php
session_start();

//データベース追加処理
$hostname = '127.0.0.1';
$username = 'root';
$password = 'dbpass';
$dbname = 'agreez';
$user_table = 'users';
$agreements_table = 'agreements';
$link = mysqli_connect($hostname, $username, $password);
    if (!$link) {
        exit("Connect error!");
    }
    $result = mysqli_query($link, "USE $dbname");

if (isset($_POST['mail']) and isset($_POST['passwd']) and isset($_POST['name'])) {
    $mail = $_POST['mail'];
    $passwd = $_POST['passwd'];
    $name = $_POST['name'];
    $_SESSION['name'] = $name;
    $result = mysqli_query($link, "INSERT INTO $user_table SET user_name='$name', user_mail='$mail', user_password='$passwd'");
    if (!$result) {
        exit("INSERT error!(メアドもうあるかも)");
    }
    $result = mysqli_query($link, "SELECT * FROM $user_table WHERE user_mail = '$mail'");

    if (!$result) {
        echo "Select error on table ($user_table)!";
    }
    while ($row = mysqli_fetch_row($result)) {
        foreach ($row as $key => $value) {
            $user_info[$key] = $value;
        }
    }
    $_SESSION['user_id'] = $user_info[0];

    header('Location: mypage.php');
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="common.css">
    <title>agreez</title>
</head>

<body>
    <div class="header">
        <a href="index.php" class="header-l">agreez</a>
        <div class="header-r">
            <div class="header-contents">About</div>
            <div class="header-contents">Contact</div>
            <a href="signup.php" class="header-contents">
                Signup
            </a>
            <a href="login.php" class="header-contents-button">
                Login
            </a>
        </div>
    </div>
    <div class="header-min">
        <div class="header-min-l">agreez</div>
        <div class="header-min-r">
            <input id="toggle" type="checkbox" />
            <label class="hamburger" for="toggle">
                <div class="top"></div>
                <div class="meat"></div>
                <div class="bottom"></div>
            </label>
            <div class="nav">
                <div class="nav-wrapper">
                    <nav>
                        <a href="#">agreez</a>
                        <a href="#">About</a>
                        <a href="#">Contact</a>
                        <a href="#">Signup</a>
                        <a href="#">Signin</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="top-wrapper">
        <form class="container" method="post" action="signup.php">
            <div class="question">新規登録</div>
            <div class="sign-form">
                <span>ユーザー名</span>
                <input type="text" name="name">
            </div>
            <div class="sign-form">
                <span>メールアドレス</span>
                <input type="text" name="mail">
            </div>
            <div class="sign-form">
                <span>パスワード</span>
                <input type="password" name="passwd">
            </div>
            <div class="button-wrapper">
                <button class="back" type="submit">新規登録</button>
            </div>
        </form>
    </div>
</body>

</html>