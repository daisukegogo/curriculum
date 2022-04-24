<?php
require_once("dbconnect.php");
require_once("function.php");

// セッション開始
session_start();

// セッション変数にuser_nameの値がなければlogin.phpにリダイレクト
redirect_login_unless_parameter($_SESSION["user_name"]);

// 提出ボタンが押された場合
if (!empty($_POST)) {
    if (empty($_POST["title"])) {
        echo 'タイトルが未入力です。';
    } elseif (empty($_POST["release_day"])) {
        echo '発売日が未入力です。';
    } elseif (empty($_POST["example"])) {
        echo '在庫数が未選択です。';    
    }

    // 両方共入力されている場合
    if (!empty($_POST["title"]) && !empty($_POST["release_day"]) && !empty($_POST["example"])) {
        $title = $_POST['title'];
        $release_day = $_POST['release_day'];
        $books_cnt = $_POST['example'];

        // ログイン処理開始
        $pdo = db_connect();

        try {
            $sql = "INSERT INTO `books` (`title`, `date`, `stock`) VALUES(:title, :date, :stock)";// SQL文の準備
            $stmt = $pdo->prepare($sql);// プリペアドステートメントの準備
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':date', $release_day);
            $stmt->bindParam(':stock', $books_cnt);
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
    <link rel="stylesheet" href="input.css">
</head>
<body>
    <h1>本 登録画面</h1>
    <form method="POST" action="">
        <input type="text" placeholder="タイトル" name="title" size="35"><br>
        <input type="date" placeholder="発売日" name="release_day" size="35"><br>
            
        在庫数<br>
        <div class="box">
            <select name="example">
                <option value="">選択してください</option>
                
                <?php
                for($i=1;$i<=100;$i++){
                    $cnt[$i] = $i;
                }

                foreach ($cnt as $value) {
                    echo "<option value='".$value."'>".$value."</option>";
                } 
                ?>
            </select>
            <br>
            <input class="botann" type="submit" value="登録" id="post" name="post" size="20">
        </div>
    </form>
</body>
</html>
