<?php
require_once("dbconnect.php");
require_once("function.php");

// セッション開始
session_start();

// セッション変数にuser_nameの値がなければlogin.phpにリダイレクト
redirect_login_unless_parameter($_SESSION["user_name"]);

// 提出ボタンが押された場合
if (!empty($_POST)) {
    // titleとcontentの入力チェック
    if (empty($_POST["title"])) {
        echo 'タイトルが未入力です。';
    } elseif (empty($_POST["content"])) {
        echo 'コンテンツが未入力です。';
    }

    // 両方共入力されている場合
    if (!empty($_POST["title"]) && !empty($_POST["content"])) {
        // 入力したtitleとcontentを格納
        $title = $_POST['title'];
        $content = $_POST['content'];

        // ログイン処理開始
        $pdo = db_connect();

        try {
            $sql = "INSERT INTO `posts` (`title`, `content`) VALUES(:title, :content)";// SQL文の準備
            $stmt = $pdo->prepare($sql);// プリペアドステートメントの準備
            $stmt->bindParam(':title', $title);// タイトルをバインド
            $stmt->bindParam(':content', $content);// 本文をバインド
            $stmt->execute();// 実行
            header("Location: main.php");// main.phpにリダイレクト
            
        } catch (PDOException $e) {
            // エラーメッセージの出力
            echo $e->getMessage();
            exit;
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h1>記事登録</h1>
    <form method="POST" action="">
        title:<br>
        <input type="text" name="title" id="title" style="width:200px;height:50px;">
        <br>
        content:<br>
        <input type="text" name="content" id="content" style="width:200px;height:100px;"><br>
        <input type="submit" value="submit" id="post" name="post">
    </form>
</body>
</html>
