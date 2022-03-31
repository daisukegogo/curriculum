<?php
//URL「http://localhost/LetsEngineer/curriculum/curriculum/4-1/signUp.php」

//エラーログコマンド　「tail -f /Applications/MAMP/logs/php_error.log」
//ターミナルを元に戻す　「Ctrl + c」

    include_once("dbconnect.php");
    $name = $_POST['name'];
    $password = $_POST['password']; 
    //ハッシュ化→セキュリティ面向上のためランダムな文字列に変換
    //PWハッシュ化（文字列のみなのでbindValue(変数の内容が変わらない)を使用せず、直接excuteに渡しても問題ない）        
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // nameとpassword両方送られてきたら処理実行
    // issset→変数に値がセットされたかどうか判定
    if($name <> "" && $password <> ""){

        // 実行したいSQL文を準備
        // 今回はusersテーブルにレコードを追加
        $sql = "INSERT INTO users(name, password) VALUES (?, ?)";
        // 関数db_connect()からPDOを取得する
        $pdo = db_connect();
        try {
            //PDOメソッド：引数で渡された指示（SQL文）をMySQLに分かる形に変換=「プロペアドステートメント」
            $stmt = $pdo->prepare($sql);
            //命令の実行
            $stmt->execute(array($name, $password_hash));
            echo '登録が完了しました。';
        } catch (PDOException $e) {
            echo 'データベースエラー';
            die();
        }
    }

?>

<!doctype html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h1>新規登録</h1>
    <form method="POST" action="">
        user:<br>
        <input type="text" name="name" id="name">
        <br>
        password:<br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="submit" id="signUp" name="signUp">
    </form>
</body>
</html>