<?php
if (isset($_POST['mail']) and isset($_POST['passwd']) and isset($_POST['name'])) {
    $mail = $_POST['mail'];
    $passwd = $_POST['passwd'];
    $name = $_POST['name'];
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
        <div class="container">
            <div class="name">ようこそ</div>
            <?php
            echo $user_name;
            echo "さん";
            ?>
        </div>
    </div>
    </div>
</body>

</html>