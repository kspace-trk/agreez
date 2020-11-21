<?php
    session_start();
    if(isset($_POST['index'])){
        $index = $_POST['index'];
    }else{
        $index = 1;
    }
    if(isset($_POST['my_company'])){
        $_SESSION['my_company'] = $_POST['my_company'];
    }
    if(isset($_POST['your_company'])){
        $_SESSION['your_company'] = $_POST['your_company'];
    }
    if(isset($_POST['is_receive']) and $index == 4){
        $_SESSION['is_receive'] = $_POST['is_receive'];
        $_SESSION['receiver'] = $_SESSION['my_company'];
        $_SESSION['order'] = $_SESSION['your_company'];
    }else if(!isset($_POST['is_receive']) and $index == 4){
        $_SESSION['is_receive'] = false;
        $_SESSION['order'] = $_SESSION['my_company'];
        $_SESSION['receiver'] = $_SESSION['your_company'];
    }
    if(isset($_POST['is_web'])){
        $_SESSION['is_web'] = $_POST['is_web'];
        $_SESSION['work_name'] = $_SESSION['is_web'];
    }else if(!isset($_POST['is_web'])){
        $_SESSION['is_web'] = false;
    }
    if(isset($_POST['is_logo'])){
        $_SESSION['is_logo'] = $_POST['is_logo'];
        $_SESSION['work_name'] = $_SESSION['is_logo'];
    }else if(!isset($_POST['is_logo'])){
        $_SESSION['is_logo'] = false;
    }
    if(isset($_POST['is_img'])){
        $_SESSION['is_img'] = $_POST['is_img'];
        $_SESSION['work_name'] = $_SESSION['is_img'];
    }else if(!isset($_POST['is_img'])){
        $_SESSION['is_img'] = false;
    }
    if(isset($_POST['money'])){
        $_SESSION['money'] = $_POST['money'];
    }
    if(isset($_POST['delivery_date'])){
        $_SESSION['delivery_date'] = $_POST['delivery_date'];
    }
    //自社名入力画面
    function my_company(){
        echo <<<EOT
        <div class="top-wrapper">
        <form class="container" action="prepare.php" method="post">
            <div class="question">あなたの会社名はなんですか？</div>
            <div class="input-form">
                <input type="text" name="my_company" required>
            </div>
            <div class="button-wrapper">
                <button class="next" type="submit" name="index" value="2">次へ</button>
            </div>
        </form>
    </div>
EOT;
    }
    //相手の会社名入力画面
    function your_company(){
        echo <<<EOT
        <div class="top-wrapper">
        <form class="container" action="prepare.php" method="post">
            <div class="question">相手の会社名はなんですか？</div>
            <div class="input-form">
                <input type="text" name="your_company" required>
            </div>
            <div class="button-wrapper">
            <button class="next" type="submit" name="index" value="3">次へ</button>
            <button class="back" type="submit" name="index" value="1">戻る</button>
            </div>
        </form>
    </div>
EOT;
    }
    //発注or受注選択画面
    function is_receive(){
        echo <<<EOT
        <div class="top-wrapper">
        <form class="container" action="prepare.php" method="post">
            <div class="question">発注側ですか？受注側ですか？</div>
            <div class="select-form">
                <input type="hidden" name="index" value="4">
                <button type="submit">発注側</button>
                <button type="submit" name="is_receive" value="True">受注側</button>
            </div>
            <div class="button-wrapper">
                <button class="back" type="submit" name="index" value="2">戻る</button>
            </div>
        </form>
    </div>
EOT;
    }
    //業務内容入力画面
    function content($type){
        echo <<<EOT
        <div class="top-wrapper">
        <form class="container" action="prepare.php" method="post">
            <div class="question"> $type 内容はなんですか？</div>
            <div class="select-form">
                <input type="hidden" type="submit" name="index" value="5">
                <button type="submit" name="is_web" value="Webサイト制作">Web制作</button>
                <button type="submit" name="is_logo" value="ロゴ画像制作">ロゴ画像制作</button>
                <button type="submit" name="is_img" value="イラスト画像制作">画像制作</button>
            </div>
            <div class="button-wrapper">
                <button class="back" type="submit" name="index" value="3">戻る</button>
            </div>
        </form>
    </div>
EOT;
    }
    //金額入力画面
    function money($type){
        echo <<<EOT
        <div class="top-wrapper">
        <form class="container" action="prepare.php" method="post">
            <div class="question"> $type 金額はいくらですか？</div>
            <div class="input-form">
                <input type="text" name="money" required>円
            </div>
            <div class="button-wrapper">
            <button class="next" type="submit" name="index" value="6">次へ</button>
            <button class="back" type="submit" name="index" value="4">戻る</button>
            </div>
        </form>
    </div>
EOT;
    }
    //納期入力画面
    function delivery_date(){
        echo <<<EOT
        <div class="top-wrapper">
        <form class="container" action="prepare.php" method="post">
            <div class="question">納期はいつですか？</div>
            <div class="input-form">
                <input type="date" name="delivery_date" required>
            </div>
            <div class="button-wrapper">
            <button class="next" type="submit" name="index" value="7">次へ</button>
                <button class="back"  type="submit" name="index" value="5">戻る</button>
            </div>
        </form>
    </div>
EOT;
    }
    //コンテンツ出力
    function echo_contents($index){
        if($index == 1){
            my_company();
        }
        else if($index == 2){
            your_company();
        }
        else if($index == 3){
            is_receive();
        }
        else if($index == 4 and $_SESSION['is_receive']){//受託の場合
            content("受注");
        }
        else if($index == 4 and !$_SESSION['is_receive']){//発注の場合
            content("発注");
        }
        else if($index == 5 and $_SESSION['is_receive']){//受託の場合
            money("受注");
        }
        else if($index == 5 and !$_SESSION['is_receive']){//発注の場合
            money("発注");
        }
        else if($index == 6){
            delivery_date();
        }
        else if($index == 7){
            header('Location: establish.php');
            exit;
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
    <?php
       echo_contents($index);
    ?>
    <!---------テキスト入力用----------
    <div class="top-wrapper">
        <div class="container">
            <div class="question">あなたの会社名はなんですか？</div>
            <div class="input-form">
                <input type="text">
            </div>
            <div class="button-wrapper">
                <button class="back">戻る</button>
                <button class="next" onclick="location.href='establish.php'">次へ</button>
            </div>
        </div>
    </div>
    ---------テキスト入力用---------->
    <!---------選択肢用----------
    <div class="top-wrapper">
        <div class="container">
            <div class="question">発注側ですか？受注側ですか？</div>
            <div class="select-form">
                <button>発注側</button>
                <button>発注側</button>
                <button>Web制作</button>
            </div>
            <div class="button-wrapper">
                <button class="back">戻る</button>
            </div>
        </div>
    </div>
    ---------選択肢用---------->
    <!---------日付選択用----------
        <div class="top-wrapper">
        <div class="container">
            <div class="question">納期はいつですか？</div>
            <div class="input-form">
                <input type="date">
            </div>
            <div class="button-wrapper">
                <button class="back">戻る</button>
                <button class="next" onclick="location.href='establish.php'">次へ</button>
            </div>
        </div>
    </div>
    !---------日付選択用--------->
</body>
</html>