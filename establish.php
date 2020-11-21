<?php
    session_start();
    $order = $_SESSION['order'];
    $receiver = $_SESSION['receiver'];
    $work_name = $_SESSION['work_name'];
    $money = $_SESSION['money'];
    $delivery_date = new DateTime($_SESSION['delivery_date']);
    $delivery_date = $delivery_date->format('Y年m月d日');
    if($_SESSION['is_web']){
      $work_def = "甲により提示された仕様に従い、甲から提供されるテキスト原稿、画像等のスクリプトデータと、乙の提供するレイアウトデータおよび画像データ、スクリプト等と組み合わせることを「Webサイト制作」という。";
    }else if($_SESSION['is_logo']){
      $work_def = "甲により提示された仕様に従い、甲から提供されるイメージ画像を元に制作したロゴ画像の制作を「ロゴ画像制作」という。";
    }else if($_SESSION['is_img']){
      $work_def = "甲により提示された仕様に従い、甲から提供されるイメージ画像を元に制作したイラスト画像の制作を「イラスト画像制作」という。";
    }
    //////////////////////ここから契約書文章
    //前文
    function preamble($order, $receiver, $work_name){
      echo "$order (以下「甲」という。)と $receiver (以下「乙」という。)とは、甲が乙に対して、甲の $work_name の業務を委託することについて、次の通り契約を締結する(以下「本契約」という)。";
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
      echo "<ol>";
      echo "<li>乙は、本件業務を $delivery_date までに完成し、本件成果物を甲に提出する。</li>";
      echo "<li>乙は前項に定める期日までに本件業務を完成することができないおそれが生じたときは、ただちにその旨を甲に通知し、甲の指示に従う。</li>";
      echo "<li>本契約の締結後、甲からの指示により委託内容に変更があり、その変更により納期を遵守できないおそれが生じた場合は、第1項の完成期日は無効とし、甲乙で協議し、改めて完成期日を定める。</li>";
      echo "</ol>";
    }
    //第４条 納品
    function delivery($delivery_date){
      echo "第４条 納品";
      echo "<br>";
      echo "<ol>";
      echo "<li>甲は本件成果物が提出された後、遅滞なく検収を行い、合格したときは、乙に対して速やかに合格の通知を発する。</li>";
      echo "<li>乙が甲に対して本件成果物を提出した後14日以内に、甲より乙への連絡が無い場合は、前項の検収に合格したものとみなす。</li>";
      echo "<li>検収に合格しなかった場合、乙は遅滞なく代品を納入する。</li>";
      echo "</ol>";
    }
    //第５条 制作料金
    function money($money){
      echo "第５条 制作料金";
      echo "<br>";
      echo "<ol>";
      echo "<li>甲は、乙に対し、本業務の制作料金として金 $money 円(消費税込み)を、納品日が属する翌月末日までに乙指定の銀行口座に振り込むものとする。</li>";
      echo "<li>委託者の責めに帰す事由（委託者が本件仕様書とは異なる要求を行うこと、本件業務に必要な資料を受託者に提供しないこと等を含み、これらの事由に限られない）により、作業期間までに納入物を納入できなかった場合、委託者は受託者に対し、前項に定める委託料を前項に従い支払うものとする。</li>";
      echo "</ol>";
    }
    //第６条 責任制限
    function responsibility(){
      echo "第６条 責任制限";
      echo "<br>";
      echo "乙は、制作物自体または制作物の使用から直接的または間接的に生じたいかなる損害についても、乙に故意または重大な過失がある場合を除いては、一切責任を負わない。また乙が責任を負う場合でも、第5条記載の制作料金の金額を限度とする。";
    }
    //第７条 解除
    function cansel(){
      echo "第７条 解除";
      echo "<br>";
      echo "<ol>";
      echo "<li>甲又は乙は、相手方が本契約のいずれかの条項に違反し、相当期間を定めて是正を求める催促後もその期間内にこれを是正しない場合は、本契約の全部または一部を解除することができる。</li>";
      echo "<li>甲又は乙は、相手方が本契約のいずれかの条項に違反し、相当期間を定めて是正を求める催促後もその期間内にこれを是正しない場合は、本契約の全部または一部を解除することができる。</li>";
      echo "<ol>";
      echo "<li>監督官庁より営業の取消又は停止等の処分を受けた時。</li>";
      echo "<li>自ら振り出し、又は裏書きした手形又は小切手の不渡り処分を受けたとき。</li>";
      echo "<li>第三者より仮差押、仮処分又は差押等の強制執行を受けたとき。</li>";
      echo "<li>破産、会社法人の特別清算、民事再生又は会社更生の手続き開始の申し立てがあったとき。</li>";
      echo "<li>公租公課の滞納処分を受けたとき。</li>";
      echo "<li>解散、合併、又は事業の全部若しくは重要な一部の譲渡の決議をしたとき。</li>";
      echo "<li><財産状態が悪化し、又はそのおそれがあると認めることができる相当の事由があるとき。</li>";
      echo "<li>その他前各号の準ずる事由があるとき。</li>";
      echo "</ol>";
      echo "<li>甲又は乙は、相当の対価を払うことにより、本契約を解除することができる。</li>";
      echo "</ol>";
    }
    //第８条 協議
    function discuss(){
      echo "第６条 責任制限";
      echo "<br>";
      echo "本契約定めのない事項及び本契約の解釈等に疑義が生じた事項については、甲乙は誠意を持って協議し、円満に解決を図るものとする。";
    }
    //後文
    function afterword(){
      echo "本契約成立の証として、本書の電磁場記録を作成し、双方が合意の後電子署名を施し、各自電場記録を保管する。";
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
              echo '<div class="text-span">';
                delivery($delivery_date);
              echo "</div>";
              echo '<div class="text-span">';
                money($money);
              echo "</div>";
              echo '<div class="text-span">';
                responsibility();
              echo "</div>";
              echo '<div class="text-span">';
                cansel();
              echo "</div>";
              echo '<div class="text-span">';
                discuss();
              echo "</div>";
              echo '<div class="text-span">';
                afterword();
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