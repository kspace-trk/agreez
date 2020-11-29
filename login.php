<?php
session_start();
function echo_warning($message)
{
    echo $message;
}
//ログイン処理
$hostname = '127.0.0.1';
$username = 'root';
$password = 'dbpass';
$dbname = 'agreez';
$user_table = 'users';
$agreements_table = 'agreements';
$pass_unmatch = false;
$link = mysqli_connect($hostname, $username, $password);
    if (!$link) {
        exit("Connect error!");
    }
    $result = mysqli_query($link, "USE $dbname");

if (isset($_POST['mail']) and isset($_POST['passwd'])) {
    $mail = $_POST['mail'];
    $passwd = $_POST['passwd'];
    $result = mysqli_query($link, "SELECT * FROM $user_table WHERE user_mail = '$mail'");

    if (!$result) {
        echo "Select error on table ($user_table)!";
    }
    while ($row = mysqli_fetch_row($result)) {
        foreach ($row as $key => $value) {
            $user_info[$key] = $value;
        }
    }
    if (!isset($user_info[3])) {
    } elseif (password_verify($passwd, $user_info[3])) {
        $_SESSION['user_id'] = $user_info[0];
        $_SESSION['name'] = $user_info[1];
        $_SESSION['is_login'] = true;

        header('Location: mypage.php');
    } else {
        $pass_unmatch = true;
    }
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
            <?php
            if ($_SESSION['is_login']) {
                echo '<a href="mypage.php" class="header-contents-button">My Page</a>';
            } else {
                echo '<a href="signup.php" class="header-contents">Signup</a>';
                echo '<a href="login.php" class="header-contents-button">Login</a>';
            }
            ?>
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
        <form class="container" method="post" action="login.php">
            <div class="question">ログイン</div>
            <div class="sign-form">
                <span>メールアドレス</span>
                <input type="text" name="mail" required>
            </div>
            <div class="sign-form">
                <span>パスワード</span>
                <input type="password" name="passwd" required>
            </div>
            <div class="button-wrapper">
                <button class="next" type="submit">ログイン</button>
            </div>
            <div class="warning">
                <?php
                if (!isset($user_info[3]) or $pass_unmatch) {
                    echo_warning("ユーザー名またはパスワードが違います");
                }
            ?>
            </div>
        </form>
    </div>
</body>

</html>