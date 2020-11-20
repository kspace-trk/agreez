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
    <!---------テキスト入力用----------
    <div class="top-wrapper">
        <div class="container">
            <div class="question">あなたの会社名はなんですか？</div>
            <div class="input-form">
                <input type="text">
            </div>
            <div class="button-wrapper">
                <button class="back">戻る</button>
                <button class="next">次へ</button>
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
    <!---------日付選択用---------->
        <div class="top-wrapper">
        <div class="container">
            <div class="question">あなたの会社名はなんですか？</div>
            <div class="input-form">
                <input type="date">
            </div>
            <div class="button-wrapper">
                <button class="back">戻る</button>
                <button class="next" onclick="location.href='establish.php'">次へ</button>
            </div>
        </div>
    </div>
    <!---------日付選択用--------->
</body>
</html>