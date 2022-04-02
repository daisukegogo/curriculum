<?php
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
    redirect_main_unless_parameter($id);

    $row = find_post_by_id($id);
    // 関数から取得した値(返された値)を格納
    $id = $row['id'];
    $title = $row['title'];
    $content = $row['content'];

    //コメントを一括取得
    try {
        // PDOのインスタンスを生成
        $pdo_comments = db_connect();
        // SQL文の準備
        $sql_comments = "SELECT * FROM comments WHERE post_id = :post_id";
        // プリペアドステートメントの作成
        $stmt_comments = $pdo_comments->prepare($sql_comments);
        // idのバインド
        $stmt_comments->bindParam(':post_id', $id);
        $stmt_comments->execute();
    } catch (PDOException $e) {
        // エラーメッセージの出力
        echo 'Error: ' . $e->getMessage();
         //終了
        die();
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>記事詳細</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <table>
            <tr>
                <td>ID</td>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <td>タイトル</td>
                <td><?php echo $title; ?></td>
            </tr>
            <tr>
                <td>本文</td>
                <td><?php echo $content; ?></td>
            </tr>
        </table>
        <a href="create_comment.php?post_id=<?php echo $id ?>">この記事にコメントする</a><br />
        <a href="main.php">メインページに戻る</a>
         <div>
        <?php
            // 結果が1行取得できたら
            while ($row = $stmt_comments->fetch(PDO::FETCH_ASSOC)) {
                echo '<hr>';
                echo $row['name'];
                echo '<br />';
                echo $row['content'];
            }
        ?>
        </div> 
    </body>
</html>