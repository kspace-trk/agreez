<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>agreez</title>
</head>
<body>
    <?php
        if(!isset($_POST['my_company'])){
            echo <<<EOT
                <form action="prepare.php" method="post">
                    あなたの会社名<input type="text" name="my_company">
                    <button>次へ</button>
                </form>
            EOT;
        }
        if(isset($_POST['my_company'])){
            echo <<<EOT
                <form action="prepare.php" method="post">
                    相手の会社名<input type="text" name="my_company">
                    <button>次へ</button>
                </form>
            EOT;
        }
    ?>
</body>
</html>