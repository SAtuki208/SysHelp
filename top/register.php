<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
</head>
<body>
    <?php
        // フォームからの値をそれぞれ変数に代入
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $dsn = "mysql:host=localhost; dbname=xxx; charset=utf8";
        $username = "xxx";
        $password = "xxx";

        try {
            $dbh = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            $msg = $e->getMessage();
            echo "<h1>$msg</h1>";
            exit;
        }

        // フォームに入力されたmailがすでに登録されていないかチェック
        $sql = "SELECT * FROM users WHERE mail = :mail";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
        $stmt->execute();
        $member = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($member && $member['mail'] === $mail) {
            $msg = '同じメールアドレスが存在します。';
            $link = '<a href="signup.php">戻る</a>';
        } else {
            // 登録されていなければinsert 
            $sql = "INSERT INTO users(name, mail, pass) VALUES (:name, :mail, :pass)";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
            $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
            $stmt->execute();
            $msg = '会員登録が完了しました';
            $link = '<a href="login.php">ログインページ</a>';
        }
    ?>

    <h1><?php echo $msg; ?></h1><!--メッセージの出力-->
    <?php echo $link; ?>
</body>
</html>
