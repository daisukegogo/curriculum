<?php
    // セッション開始
    session_start();
    // セッション変数にuser_nameの値がなければlogin.phpにリダイレクト
    if (empty($_SESSION["user_name"])) {
        header("Location: login.php");
        exit;
    }

    require_once("getData.php");

    //getDataをインスタンス化&コンストラクタ実行
    $getdata = new getData(); 
    $post = $getdata->getPostData(); //関数の実行
    
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>メイン</title>
    </head>
    <body>
        <h1>メインページ</h1>
        <p>ようこそ<?php echo $_SESSION["user_name"]; ?>さん</p>
        <a href="logout.php">ログアウト</a><br/>
        <a href="create_post.php">記事投稿！</a><br/>

        <table class="table1">

            <tr>
                <td>記事ID</td>
                <td>タイトル</td>
                <td>本文</td>
                <td>投稿日</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>  
                            
            <?php while ($row = $post->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['content']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <!-- IDを各PHPファイルに渡す(GET通信) -->
                <td><a href="detail_post.php?id=<?php echo $row['id']; ?>">詳細</a></td>
                <td><a href="edit_post.php?id=<?php echo $row['id']; ?>">編集</a></td>
                <td><a href="delete_post.php?id=<?php echo $row['id']; ?>">削除</a></td>
            </tr>
            <?php } ?>      

        </table>    
    </body>
</html>

