<?php
session_start();

    if (!isset($_SESSION['is_login'])) {
        $_SESSION['is_login'] = false;
    }
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
    //ここからないとき
    if (!$result) {
        $result = mysqli_query($link, "CREATE DATABASE $dbname CHARACTER SET utf8");
        if (!$result) {
            echo "Create database $dbname failed!\n";
        }
        $result = mysqli_query($link, "USE $dbname");
        if (!$result) {
            echo "USE failed!";
        }
        //テーブル作成
        $result1 = mysqli_query($link, "CREATE TABLE $user_table (id INT NOT NULL AUTO_INCREMENT, user_name VARCHAR(100)BINARY NOT NULL, user_mail VARCHAR(50)BINARY UNIQUE NOT NULL, user_password VARCHAR(500)BINARY NOT NULL,PRIMARY KEY(id)) CHARACTER SET utf8");
        $result2 = mysqli_query($link, "CREATE TABLE $agreements_table (id INT NOT NULL AUTO_INCREMENT, user_id INT NOT NULL, buyer VARCHAR(100)BINARY NOT NULL, receiver VARCHAR(100)BINARY NOT NULL, work_name VARCHAR(100)BINARY NOT NULL, money VARCHAR(100)BINARY NOT NULL, delivery_date DATE NOT NULL,PRIMARY KEY(id)) CHARACTER SET utf8");

        if (!$result1) {
            exit("Create table $user_table failed!\n");
        }
        if (!$result2) {
            exit("Create table $agreements_table failed!\n");
        }
    }
    //ここまでないとき
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="style.css">
  <title>agreez</title>
</head>

<body>
  <div class="main-visual">
    <img class="main-visual-img" src="img/main-background.png" alt="main-background" clip-path="url(#main-background)">
    <div class="header">
      <div class="header-l">agreez</div>
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
              <a href="index.php">agreez</a>
              <a href="#">About</a>
              <a href="#">Contact</a>
              <a href="#">Signup</a>
              <a href="#">Signin</a>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="main-contents">
      <div class="main-contents-l">
        <span>Eazy to make an agreement</span>
        <a href="prepare.php" class="get-start">
          Get Start
          <div class="arrow"></div>
        </a>
      </div>
      <div class="main-contents-r">
        <img src="img/Consulting.svg" alt="">
      </div>
    </div>
  </div>
</body>

</html>