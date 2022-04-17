<?php
    require_once("function.php");

    // セッション開始
    session_start();
    
    // セッション変数にuser_nameの値がなければlogin.phpにリダイレクト
    redirect_login_unless_parameter($_SESSION["user_name"]);

    require_once("getData.php");

    //getDataをインスタンス化&コンストラクタ実行
    $getdata = new getData(); 
    $book = $getdata->getBooksData(); //関数の実行
    
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>メイン</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <h1>在庫一覧画面</h1>

        <div class="box">
            <form method="post" action="input_books.php">
                <input class="botann1" type="submit" value="新規登録">
            </form>
            <form method="post" action="logout.php">
                <input class="botann2" type="submit" value="ログアウト">
            </form>
        </div>

        <table class="table1">

            <tr>
                <th>タイトル</th>
                <th>発売日</th>
                <th>在庫数</th>
                <th></th>
            </tr>  
                            
            <?php while ($row = $book->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <!-- IDを各PHPファイルに渡す(POST通信) -->
                <td>
                <form method="post" action="delete_books.php">
                    <input type="hidden" name="delete" value="<?php echo $row['id']; ?>">
                    <input class="botann3" type="submit" value="削除">
                </form>
                </td>

            </tr>
            <?php } ?>      

        </table>    
    </body>
</html>

