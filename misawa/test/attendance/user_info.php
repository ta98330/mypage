<?php
    require "header.php";//ヘッダー読み込み 
        
    if($_SESSION['login'] == "ログインしていません．"){
        header('Location: index.php');
    }
        
    require "state.php";//ヘッダー読み込み
    



if(!empty($_POST['pass'])){
    if($_SESSION['userPass'] == $_POST['pass']){
        echo '<h2>ユーザー情報</h2>';
        echo '<table border="1"><br /><tr><th>ID</th><th>名前</th><th>パスワード</th></tr><br />';
        $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
        $st = $pdo->query("SELECT * FROM member WHERE id = {$_SESSION['userId']}");//SQL文の発行
                
        while ($row = $st->fetch()) {
            $id = htmlspecialchars($row['id']);
            $name = htmlspecialchars($row['name']);
            $pass = htmlspecialchars($row['pass']);
        }
        
        
        
        echo "<tr><td>$id</td><td>$name</td><td>$pass</td></tr></table>";
        echo '<br /><a href="top.php">戻る</a>'; 
    }
    else
        echo 'パスワードが違います．<br />','<a href="top.php">戻る</a>'; 
}
else
    echo 'パスワードを入力してください．<br />','<a href="top.php">戻る</a>';

?>


<?php require "footer.php" //フッター読み込み?>