<?php
//課題2-18 URL「http://localhost/LetsEngineer/curriculum/curriculum/2-18/index.php」
?>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>2章チェックテスト</h1>
    <hr>
    <!--名前を入力してquestion.phpに移動するフォームを作成-->
    
    <form action="question.php" method="post">
        <input type="text" name="myname" placeholder="名前を入力してください"/>
        <input type="submit" value="テスト開始" />
    </form>
</body>
</html>