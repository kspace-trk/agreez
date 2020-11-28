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
if (isset($_POST['view_agreement'])) {
    $id = $_POST['view_agreement'];
    echo $id;
    //データベース接続
    $hostname = '127.0.0.1';
    $username = 'root';
    $password = 'dbpass';
    $dbname = 'agreez';
    $user_table = 'users';
    $agreements_table = 'agreements';
    $user_id = $_SESSION['user_id'];
    $link = mysqli_connect($hostname, $username, $password);
    if (!$link) {
        exit("Connect error!");
    }
    $result = mysqli_query($link, "USE $dbname");

    $result = mysqli_query($link, "SELECT * FROM $agreements_table WHERE id = '$id'");
    if (!$result) {
        echo "Select error on table ($user_table)!";
    }
    while ($row = mysqli_fetch_row($result)) {
        foreach ($row as $key => $value) {
            $agreements_info[$key] = $value;
        }
    }

    $_SESSION['buyer'] = $agreements_info[2];
    $_SESSION['receiver'] = $agreements_info[3];
    $_SESSION['work_name'] = $agreements_info[4];
    $_SESSION['money'] = $agreements_info[5];
    $_SESSION['delivery_date'] = $agreements_info[6];
    //header('Location: establish.php');
}

function get_agreement()
{
    //$n = 0;
    //データベース接続
    $hostname = '127.0.0.1';
    $username = 'root';
    $password = 'dbpass';
    $dbname = 'agreez';
    $user_table = 'users';
    $agreements_table = 'agreements';
    $user_id = $_SESSION['user_id'];
    $link = mysqli_connect($hostname, $username, $password);
    if (!$link) {
        exit("Connect error!");
    }
    $result = mysqli_query($link, "USE $dbname");

    $result = mysqli_query($link, "SELECT * FROM $agreements_table WHERE user_id = '$user_id'");
    if (!$result) {
        echo "Select error on table ($user_table)!";
    }
    while ($row = mysqli_fetch_row($result)) {
        foreach ($row as $key => $value) {
            $agreements_info[$key] = $value;
        }
        //$agreements_id[$n] = $agreements_info[0];
        echo '<input type="" name="view_agreement" value="' . $agreements_info[0] . '">';
        echo '<button class="mypage-contents" type="submit">';
        echo $agreements_info[4] . " - 業務委託契約書";
        echo "</button>";
        //$n += 1;
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
        <div class="mypage-title">マイページ</div>
        <form class="mypage-container" method="post" action="mypage.php">
            <div class="user-name">
                <svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m437.019531 74.980469c-48.351562-48.351563-112.640625-74.980469-181.019531-74.980469-68.382812 0-132.667969 26.628906-181.019531 74.980469-48.351563 48.351562-74.980469 112.636719-74.980469 181.019531 0 68.378906 26.628906 132.667969 74.980469 181.019531 48.351562 48.351563 112.636719 74.980469 181.019531 74.980469 68.378906 0 132.667969-26.628906 181.019531-74.980469 48.351563-48.351562 74.980469-112.640625 74.980469-181.019531 0-68.382812-26.628906-132.667969-74.980469-181.019531zm-308.679687 367.40625c10.707031-61.648438 64.128906-107.121094 127.660156-107.121094 63.535156 0 116.953125 45.472656 127.660156 107.121094-36.347656 24.972656-80.324218 39.613281-127.660156 39.613281s-91.3125-14.640625-127.660156-39.613281zm46.261718-218.519531c0-44.886719 36.515626-81.398438 81.398438-81.398438s81.398438 36.515625 81.398438 81.398438c0 44.882812-36.515626 81.398437-81.398438 81.398437s-81.398438-36.515625-81.398438-81.398437zm235.042969 197.710937c-8.074219-28.699219-24.109375-54.738281-46.585937-75.078125-13.789063-12.480469-29.484375-22.328125-46.359375-29.269531 30.5-19.894531 50.703125-54.3125 50.703125-93.363281 0-61.425782-49.976563-111.398438-111.402344-111.398438s-111.398438 49.972656-111.398438 111.398438c0 39.050781 20.203126 73.46875 50.699219 93.363281-16.871093 6.941406-32.570312 16.785156-46.359375 29.265625-22.472656 20.339844-38.511718 46.378906-46.585937 75.078125-44.472657-41.300781-72.355469-100.238281-72.355469-165.574219 0-124.617188 101.382812-226 226-226s226 101.382812 226 226c0 65.339844-27.882812 124.277344-72.355469 165.578125zm0 0" />
                </svg>
                <span><?php echo "$name"?>さん</span>
            </div>
            <div class="mypage-subtitle">保存した契約書</div>
            <?php
                get_agreement();
            ?>
            <div class="button-wrapper">
                <button class="back" type="submit" name="logout">ログアウト</button>
            </div>
        </form>
    </div>
    </div>
</body>

</html>