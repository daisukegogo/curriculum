<?php
// 外部ファイルを取り込む→関数db_connect()が使用可能
// 作成したdbconnect.phpを読み込む
require_once("dbconnect.php");
require_once("function.php");

// セッション開始
session_start();

// セッション変数にuser_nameの値がなければlogin.phpにリダイレクト
redirect_login_unless_parameter($_SESSION["user_name"]);

// URLの?以降で渡されるIDをキャッチ
$id = $_GET['id'];
// もし、$idが空であったらmain.phpにリダイレクト
// 不正なアクセス対策
if (empty($id)) {
    header("Location: main.php");
    exit;
}

// PDOのインスタンスを取得
$pdo = db_connect();

try {
    // SQL文の準備
    $sql = "DELETE FROM posts WHERE id = :id";
    // プリペアドステートメントの作成
    $stmt = $pdo->prepare($sql);
    // idのバインド
    $stmt->bindParam(':id', $id);
    // 実行
    $stmt->execute();
    // main.phpにリダイレクト
    header("Location: main.php");
    exit;
} catch (PDOException $e) {
    exit('データベース接続失敗。' . $e->getMessage());
    exit;
}
?>
