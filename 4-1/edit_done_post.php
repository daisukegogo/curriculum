<?php
require_once("dbconnect.php");
require_once("function.php");

// セッション開始
session_start();

// セッション変数にuser_nameの値がなければlogin.phpにリダイレクト
redirect_login_unless_parameter($_SESSION["user_name"]);

//記事編集でPOST送信された値を取得
$id = $_POST["id"];
$title = $_POST["title"];
$content = $_POST["content"];

// titleとcontentの入力チェック
if (empty($title)) {
    echo '<script>alert("タイトルが未入力です。");</script>';
    exit;
} elseif (empty($content)) {
    echo '<script>alert("コンテンツが未入力です。");</script>';
    exit;
}

// PDOのインスタンスを取得
$pdo = db_connect();

try {
    // SQL文の準備
    $sql = "UPDATE posts SET title = :title, content = :content WHERE id = :id";
    // プリペアドステートメントの作成
    $stmt = $pdo->prepare($sql);
    // titleのバインド
    $stmt->bindParam(':title', $title);
    // contentのバインド
    $stmt->bindParam(':content', $content);
    // idのバインド
    $stmt->bindParam(':id', $id);
    // 実行
    $stmt->execute();
} catch (PDOException $e) {
    exit('データベース接続失敗。' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>編集完了</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <h1>編集完了</h1>
        <p>ID: <?php echo $id; ?>を編集しました。</p>
        <a href="main.php">ホームへ戻る</a>
    </body>
</html>