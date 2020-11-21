<?php
    session_start();
    $order = $_SESSION["order"];
    $receiver = $_SESSION["receiver"];
    $work_name = $_SESSION['work_name'];
    $delivery_date = new DateTime($_SESSION['delivery_date']);
    $delivery_date = $delivery_date->format('Y年m月d日');
    if(isset($_SESSION['is_web'])){
      $work_def = "甲により提示された仕様に従い、甲から提供されるテキスト原稿、画像等のスクリプトデータと、乙の提供するレイアウトデータおよび画像データ、スクリプト等と組み合わせることを「Webサイト制作」という。";
    }else if(isset($_SESSION['is_logo'])){
      $work_def = "甲により提示された仕様に従い、甲から提供されるイメージ画像を元に制作したロゴ画像の制作を「ロゴ画像制作」という。";
    }else if(isset($_SESSION['is_img'])){
      $work_def = "甲により提示された仕様に従い、甲から提供されるイメージ画像を元に制作したイラスト画像の制作を「イラスト画像制作」という。";
    }
    //////////////////////ここから契約書文章
    //前文
    function preamble($order, $receiver, $work_name){
      echo "【 $order 】(以下「甲」という。)と $receiver (以下「乙」という。)とは、甲が乙に対して、甲の $work_name の業務を委託することについて、次の通り契約を締結する(以下「本契約」という)。";
    }
    //第１条 目的
    function goal($work_name){
      echo "第１条 目的";
      echo "<br>";
      echo "1. 甲は、別紙記載の $work_name (以下「本業務」という)を乙に委託し、乙はこれを受託する。";
      echo "<br>";
      echo "2. 甲は、乙が本業務を遂行するに際して、必要な協力を行う。";
    }
    //第２条 定義
    function work_def($work_def){
      echo "第２条 定義";
      echo "<br>";
      echo $work_def;
    }
    //第３条 制作期間
    function delivery_date($delivery_date){
      echo "第３条 制作期間";
      echo "<br>";
      echo "1. 乙は、本件業務を $delivery_date までに完成し、本件成果物を甲に提出する。";
      echo "<br>";
      echo "2. 乙は前項に定める期日までに本件業務を完成することができないおそれが生じたときは、ただちにその旨を甲に通知し、甲の指示に従う。";
      echo "<br>";
      echo "3. 本契約の締結後、甲からの指示により委託内容に変更があり、その変更により納期を遵守できないおそれが生じた場合は、第1項の完成期日は無効とし、甲乙で協議し、改めて完成期日を定める。";
    }
    //第４条 納品
    function delivery(){
      echo "第４条 納品";
      echo "<br>";
    }
    
    ////////////////////ここまで契約書文章
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
              echo '<div class="text-span">';
                preamble($order, $receiver, $work_name);
              echo "</div>";
              echo '<div class="text-span">';
                goal($work_name);
              echo "</div>";
              echo '<div class="text-span">';
                work_def($work_def);
              echo "</div>";
              echo '<div class="text-span">';
                delivery_date($delivery_date);
              echo "</div>";
              ?>
            </div>
        </div>
        <div class="button-wrapper">
                <button class="save">保存する</button>
            </div>
    </div>
</body>
</html>