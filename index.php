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
        <a href="#about" class="header-contents">About</a>
        <a href="#contact" class="header-contents">Contact</a>
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
              <a href="#about">About</a>
              <a href="#contact">Contact</a>
              <?php
                if ($_SESSION['is_login']) {
                    echo '<a href="mypage.php">My Page</a>';
                } else {
                    echo '<a href="signup.php">Signup</a>';
                    echo '<a href="login.php">Login</a>';
                }
              ?>
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
  <div id="about">
    <div class="about-contents">
      <svg id="hand" xmlns="http://www.w3.org/2000/svg" width="120.637" height="107.429" viewBox="0 0 120.637 107.429">
        <g id="グループ_10" data-name="グループ 10" transform="translate(16.461 55.174)">
          <g id="グループ_9" data-name="グループ 9">
            <path id="パス_162" data-name="パス 162"
              d="M62.743,263.972a2.743,2.743,0,1,0,2.743,2.743A2.744,2.744,0,0,0,62.743,263.972Z"
              transform="translate(-60 -263.972)" fill="#4e86de" />
          </g>
        </g>
        <g id="グループ_12" data-name="グループ 12" transform="translate(0 0)">
          <g id="グループ_11" data-name="グループ 11">
            <path id="パス_163" data-name="パス 163"
              d="M120.637,91.868a10.586,10.586,0,0,0-3.946-8.245,10.613,10.613,0,0,0,3.8-10.013,10.931,10.931,0,0,0-10.9-8.839H87.149l.7-2.1c3.993-11.977.285-24.775-8.5-32.262A9.965,9.965,0,0,0,63.485,34.6a2.356,2.356,0,0,0-.036,1.519c1.957,6.226,1.985,10.412.1,14.448-1.959,4.187-6.173,8.583-14.092,14.7A35.007,35.007,0,0,1,44.284,68.5a21.707,21.707,0,0,0-7.418,5.7H28.274V71.84a2.356,2.356,0,0,0-2.356-2.356H2.356A2.356,2.356,0,0,0,0,71.84V133.1a2.356,2.356,0,0,0,2.356,2.356H25.918a2.356,2.356,0,0,0,2.356-2.356v-7.069H41.49a37.315,37.315,0,0,0,24.865,9.425H95.9a10.6,10.6,0,0,0,8.811-16.493h.614a10.594,10.594,0,0,0,8.346-17.131A10.6,10.6,0,0,0,120.637,91.868ZM23.562,130.745H4.712V74.2h18.85Zm86.472-32.987H87.415a2.356,2.356,0,0,0,0,4.712h17.907a5.89,5.89,0,0,1,0,11.781H87.415a2.356,2.356,0,0,0,0,4.712H95.9a5.89,5.89,0,1,1,0,11.781H66.355a32.618,32.618,0,0,1-22.345-8.79,2.356,2.356,0,0,0-1.608-.634H28.274V78.909h9.745a2.356,2.356,0,0,0,1.9-.959c2.125-2.887,4.005-3.9,6.607-5.307a39.471,39.471,0,0,0,5.81-3.65C68.466,56.532,72.158,48.9,68.205,35.554a5.243,5.243,0,0,1,8.227-1.424,25.162,25.162,0,0,1,6.945,27.056l-1.195,3.586H79.168a2.356,2.356,0,0,0,0,4.712h30.425a6.187,6.187,0,0,1,6.249,4.884,5.892,5.892,0,0,1-5.808,6.9H87.415a2.356,2.356,0,1,0,0,4.712h22.619a5.89,5.89,0,1,1,0,11.78Z"
              transform="translate(0 -28.029)" fill="#4e86de" />
          </g>
        </g>
        <g id="グループ_14" data-name="グループ 14" transform="translate(16.461 58.046)">
          <g id="グループ_13" data-name="グループ 13">
            <path id="パス_164" data-name="パス 164"
              d="M62.743,303.972A2.743,2.743,0,0,0,60,306.715V334.15a2.743,2.743,0,1,0,5.487,0V306.715A2.743,2.743,0,0,0,62.743,303.972Z"
              transform="translate(-60 -303.972)" fill="#4e86de" />
          </g>
        </g>
      </svg>

      <div class="card-title">Easy</div>
      <div class="card-text">Easily create an agreement by simply answering the questions</div>
    </div>
    <div class="about-contents">
      <svg id="free" xmlns="http://www.w3.org/2000/svg" width="123.527" height="123.527" viewBox="0 0 123.527 123.527">
        <g id="グループ_16" data-name="グループ 16" transform="translate(21.276 47.474)">
          <g id="グループ_15" data-name="グループ 15">
            <path id="パス_165" data-name="パス 165"
              d="M99.622,192H88.191a2.859,2.859,0,0,0-2.858,2.858v22.863a2.858,2.858,0,0,0,5.716,0V197.716h8.574a2.858,2.858,0,1,0,0-5.716Z"
              transform="translate(-85.333 -192)" fill="#4e86de" />
          </g>
        </g>
        <g id="グループ_18" data-name="グループ 18" transform="translate(21.352 58.906)">
          <g id="グループ_17" data-name="グループ 17">
            <path id="パス_166" data-name="パス 166"
              d="M93.907,234.667H88.191a2.858,2.858,0,1,0,0,5.716h5.716a2.858,2.858,0,1,0,0-5.716Z"
              transform="translate(-85.333 -234.667)" fill="#4e86de" />
          </g>
        </g>
        <g id="グループ_20" data-name="グループ 20" transform="translate(0)">
          <g id="グループ_19" data-name="グループ 19">
            <path id="パス_167" data-name="パス 167"
              d="M61.764,0a61.764,61.764,0,1,0,61.764,61.764A61.835,61.835,0,0,0,61.764,0Zm0,118.157a56.393,56.393,0,1,1,56.393-56.393A56.455,56.455,0,0,1,61.764,118.157Z"
              transform="translate(0)" fill="#4e86de" />
          </g>
        </g>
        <g id="グループ_22" data-name="グループ 22" transform="translate(23.244 17.147)">
          <g id="グループ_21" data-name="グループ 21">
            <path id="パス_168" data-name="パス 168"
              d="M177.97,82.216a48.513,48.513,0,0,0-75.779,0,2.856,2.856,0,1,0,4.453,3.578,42.8,42.8,0,0,1,66.868,0,2.858,2.858,0,0,0,4.458-3.578Z"
              transform="translate(-101.56 -64)" fill="#4e86de" />
          </g>
        </g>
        <g id="グループ_24" data-name="グループ 24" transform="translate(25.757 86.374)">
          <g id="グループ_23" data-name="グループ 23">
            <path id="パス_169" data-name="パス 169"
              d="M182.065,352.779a2.86,2.86,0,0,0-4.035.109,42.747,42.747,0,0,1-62.158,0,2.856,2.856,0,1,0-4.144,3.933,48.453,48.453,0,0,0,70.446,0A2.856,2.856,0,0,0,182.065,352.779Z"
              transform="translate(-110.941 -351.994)" fill="#4e86de" />
          </g>
        </g>
        <g id="グループ_26" data-name="グループ 26" transform="translate(42.552 47.474)">
          <g id="グループ_25" data-name="グループ 25">
            <path id="パス_170" data-name="パス 170"
              d="M180.348,209.073A8.572,8.572,0,0,0,179.24,192h-5.716a2.859,2.859,0,0,0-2.858,2.858v22.863a2.858,2.858,0,0,0,5.716,0v-4.532l6.55,6.556a2.871,2.871,0,0,0,2.023.835,2.83,2.83,0,0,0,2.018-.84,2.86,2.86,0,0,0,0-4.041Zm-3.967-5.641v-5.716h2.858a2.858,2.858,0,1,1,0,5.716h-2.858Z"
              transform="translate(-170.666 -192)" fill="#4e86de" />
          </g>
        </g>
        <g id="グループ_28" data-name="グループ 28" transform="translate(63.828 47.474)">
          <g id="グループ_27" data-name="グループ 27">
            <path id="パス_171" data-name="パス 171"
              d="M270.288,214.863h-8.574V197.716h8.574a2.858,2.858,0,1,0,0-5.716H258.857A2.859,2.859,0,0,0,256,194.858v22.863a2.859,2.859,0,0,0,2.858,2.858h11.432a2.858,2.858,0,0,0,0-5.716Z"
              transform="translate(-255.999 -192)" fill="#4e86de" />
          </g>
        </g>
        <g id="グループ_30" data-name="グループ 30" transform="translate(64.055 58.906)">
          <g id="グループ_29" data-name="グループ 29">
            <path id="パス_172" data-name="パス 172"
              d="M264.574,234.667h-5.716a2.858,2.858,0,1,0,0,5.716h5.716a2.858,2.858,0,1,0,0-5.716Z"
              transform="translate(-256 -234.667)" fill="#4e86de" />
          </g>
        </g>
        <g id="グループ_32" data-name="グループ 32" transform="translate(85.104 47.474)">
          <g id="グループ_31" data-name="グループ 31">
            <path id="パス_173" data-name="パス 173"
              d="M355.622,214.863h-8.574V197.716h8.574a2.858,2.858,0,1,0,0-5.716H344.191a2.859,2.859,0,0,0-2.858,2.858v22.863a2.859,2.859,0,0,0,2.858,2.858h11.431a2.858,2.858,0,0,0,0-5.716Z"
              transform="translate(-341.333 -192)" fill="#4e86de" />
          </g>
        </g>
        <g id="グループ_34" data-name="グループ 34" transform="translate(85.406 58.906)">
          <g id="グループ_33" data-name="グループ 33">
            <path id="パス_174" data-name="パス 174"
              d="M349.907,234.667h-5.716a2.858,2.858,0,1,0,0,5.716h5.716a2.858,2.858,0,1,0,0-5.716Z"
              transform="translate(-341.333 -234.667)" fill="#4e86de" />
          </g>
        </g>
      </svg>
      <div class="card-title">Unlimited Free</div>
      <div class="card-text">Free to use forever without restrictions</div>
    </div>
    <div class="about-contents">
      <svg xmlns="http://www.w3.org/2000/svg" width="112.254" height="124.943" viewBox="0 0 112.254 124.943">
        <g id="support" transform="translate(0)">
          <g id="グループ_39" data-name="グループ 39" transform="translate(80.53 96.636)">
            <g id="グループ_38" data-name="グループ 38">
              <path id="パス_175" data-name="パス 175"
                d="M358.44,396a2.44,2.44,0,1,0,2.44,2.44A2.441,2.441,0,0,0,358.44,396Z" transform="translate(-356 -396)"
                fill="#4e86de" />
            </g>
          </g>
          <g id="グループ_41" data-name="グループ 41" transform="translate(0)">
            <g id="グループ_40" data-name="グループ 40">
              <path id="パス_176" data-name="パス 176"
                d="M114.979,88.745l-11.6-3.865-4.164-8.328a26.728,26.728,0,0,0,7.234-14.139l.519-3.113h4.441a7.329,7.329,0,0,0,7.321-7.321V36.6a36.6,36.6,0,0,0-73.209,0V51.978a7.333,7.333,0,0,0,4.881,6.9v2.86a7.329,7.329,0,0,0,7.321,7.321h2.143A26.474,26.474,0,0,0,63.96,75.4c.346.4.706.782,1.075,1.157l-4.162,8.323-11.6,3.866C35.789,93.242,26,107.439,26,122.5a2.44,2.44,0,0,0,2.44,2.44H135.814a2.44,2.44,0,0,0,2.44-2.44C138.254,107.439,128.466,93.242,114.979,88.745Zm-1.128-36.766a2.443,2.443,0,0,1-2.44,2.44h-3.724c.62-4.8,1.034-9.918,1.2-14.954,0-.142.009-.28.013-.42h4.952Zm-61.008,2.44a2.443,2.443,0,0,1-2.44-2.44V39.045h4.953q.012.382.026.768c0,.009,0,.017,0,.026v0c.171,4.9.579,9.879,1.185,14.578H52.843Zm4.881,9.761a2.443,2.443,0,0,1-2.44-2.44V59.3h2l.519,3.114c.1.592.221,1.181.362,1.767ZM55.288,34.164H50.5a31.725,31.725,0,0,1,63.262,0h-4.792a24.716,24.716,0,0,0-24.655-24.4H79.943A24.716,24.716,0,0,0,55.288,34.164ZM79.943,14.642h4.368A19.843,19.843,0,0,1,104.09,34.508c0,.768-.006,1.437-.019,2.045,0,.008,0,.016,0,.024l-3.052-.436A39.212,39.212,0,0,1,78.972,25.118a2.441,2.441,0,0,0-1.726-.715,22.077,22.077,0,0,0-16.974,8.031A19.837,19.837,0,0,1,79.943,14.642ZM63.224,64.18C62,60.116,60.6,48.159,60.3,40.5l3.284-4.379a17.177,17.177,0,0,1,12.7-6.806,44.139,44.139,0,0,0,24.046,11.661l3.593.513c-.24,5.1-.731,10.211-1.434,14.915v0c-.224,1.512-.4,2.485-.85,5.2-1.292,7.752-7.076,14.761-14.712,16.67A19.2,19.2,0,0,1,65.37,69.061h4.975a7.332,7.332,0,0,0,6.9,4.881h4.881a7.321,7.321,0,0,0,0-14.642H77.246a7.324,7.324,0,0,0-6.905,4.881ZM77.041,83.218a24.477,24.477,0,0,0,9.076.2l-4.312,4.56Zm1.41,8.312-7.74,8.185a92.978,92.978,0,0,1-5.464-12.669l2.907-5.813ZM95.687,80.406l3.32,6.64a92.951,92.951,0,0,1-5.464,12.673l-8.284-8.284ZM74.806,66.62a2.441,2.441,0,0,1,2.44-2.44h4.881a2.44,2.44,0,0,1,0,4.881H77.246A2.443,2.443,0,0,1,74.806,66.62ZM30.978,120.063c.967-12.089,9.013-23.077,19.84-26.688l10.272-3.423a97.825,97.825,0,0,0,6.946,15.066l.014.025h0a97.853,97.853,0,0,0,6.68,10.2l3,4.819Zm51.149-2.175-3.31-5.313q-.056-.089-.119-.174a93.046,93.046,0,0,1-5.5-8.215l8.7-9.2,9.17,9.17a92.944,92.944,0,0,1-5.518,8.247C85.436,112.56,85.606,112.309,82.127,117.888Zm4.395,2.175,3-4.819a97.81,97.81,0,0,0,6.726-10.281l.036-.065,0-.008a97.745,97.745,0,0,0,6.873-14.938l10.272,3.423c10.828,3.611,18.873,14.6,19.84,26.688H86.522Z"
                transform="translate(-26)" fill="#4e86de" />
            </g>
          </g>
          <g id="グループ_43" data-name="グループ 43" transform="translate(89.105 101.294)">
            <g id="グループ_42" data-name="グループ 42">
              <path id="パス_177" data-name="パス 177"
                d="M401.976,423.982a24.4,24.4,0,0,0-6.908-8.387,2.44,2.44,0,0,0-2.976,3.868,19.488,19.488,0,0,1,5.518,6.7,2.44,2.44,0,0,0,4.366-2.181Z"
                transform="translate(-391.139 -415.089)" fill="#4e86de" />
            </g>
          </g>
        </g>
      </svg>
      <div class="card-title">Any Time Support</div>
      <div class="card-text">Respond to inquiries at any time</div>
    </div>
  </div>
  <div id="contact">
    <div class="contact-contents">
      <div class="result-contact-wrapper">
        <form
          action="https://docs.google.com/forms/u/0/d/e/1FAIpQLSfekmFwZc4Lr3STHXnoHMkbgsxeyiGvUxABxhXf28Sx795gcg/formResponse">
          <div class="form-contents">
            <p>氏名(必須)</p>
            <input type="text" placeholder="氏名" name="entry.1220325291" required />
          </div>
          <div class="form-contents">
            <p>メールアドレス(必須)</p>
            <input type="email" placeholder="example@mail.com" name="entry.222640255" required />
          </div>
          <div class="form-contents">
            <p>お問い合わせ内容(必須)</p>
            <textarea placeholder="お問い合わせ内容" name="entry.264940659" required></textarea>
          </div>
          <div class="contact-btn">
            <button type="submit" class="form-button">
              <p>送信</p>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>