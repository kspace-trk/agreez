<?php
session_start();
if (isset($_SESSION['is_login'])) {
    $name = $_SESSION['name'];
}
if (isset($_POST['logout'])) {
    $_SESSION['is_login'] = false;
    $_SESSION['user_id'] = null;
    $_SESSION['user_id'] = null;
    header('Location: index.php');
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
        <form class="container" method="post" action="mypage.php">
            <div class="name">ようこそ</div>
            <?php
                echo "$name";
                echo "さん";
            ?>
            <div class="button-wrapper">
                <button class="back" type="submit" name="logout">ログアウト</button>
            </div>
        </form>
    </div>
    </div>
</body>

</html>