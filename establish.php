<?php
    session_start();
    $order = $_SESSION["order"];
    $receiver = $_SESSION["receiver"];
    $work_name = $_SESSION['work_name'];
    //前文
    function preamble($order, $receiver, $work_name){
      echo "【 $order 】(以下「甲」という。)と $receiver (以下「乙」とい う。)とは、甲が乙に対して、甲の $work_name の業務を委託することについて、次の通り契約を締結する(以下「本契約」という)。";
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
            <div class="header-contents">Signup</div>
            <div class="header-contents-button">Login</div>
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
        <div class="result-container">
            <div class="result-text">
              <h1>業務委託契約書</h1>
              <?php
                preamble($order, $receiver, $work_name);
              ?>
            </div>
        </div>
        <div class="button-wrapper">
                <button class="save">保存する</button>
            </div>
    </div>
</body>
</html>