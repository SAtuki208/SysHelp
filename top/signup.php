<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        <h1>新規会員登録</h1>
        //処理を行う宛先を指定
        <form action="register.php" method="post">
        <div>
            <label>
                名前：
                <input type="text" name="name" required>
            </label>
        </div>
        <div>
            <label>
                メールアドレス：
                <input type="text" name="mail" required>
            </label>
        </div>
        <div>
            <label>
                パスワード：
                <input type="password" name="pass" required>
            </label>
        </div>
        <input type="submit" value="新規登録">
        </form>
        <p>すでに登録済みの方は<a href="login.html">こちら</a></p>
    ?>
</body>
</html>


