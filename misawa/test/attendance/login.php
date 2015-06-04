<?php
session_start();

if(empty($_POST['id'] || $_POST['pass'])){
        header('Location: index.php');
    }

if($_SESSION['login'] == "ログインしていません．"){
    $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
    $st = $pdo->prepare("SELECT * FROM member WHERE id = ? AND pass = ?");//SQL文の発行
    $st->execute(array($_POST['id'], $_POST['pass']));
        
    while ($row = $st->fetch()) {
        $id = htmlspecialchars($row['id']);
        $name = htmlspecialchars($row['name']);
        $pass = htmlspecialchars($row['pass']);
    }
    if(@$id == $_POST['id']){//while文から結果が得られた->idとpassが一致
        $_SESSION['userId'] = $id;
        $_SESSION['userName'] = $name;
        $_SESSION['userPass'] = $pass;
        
        $_SESSION['login'] = "ログイン中！";
        header('Location: top.php');
    }
    else
        echo 'ログインに失敗しました．<br />IDとパスワードを確認して下さい．<br /><a href="index.php">戻る</a>';
    
}
else{
    echo $name,'さんが<p>すでにログイン中です．<a href="logout.php">ログアウト</a></p>';
    echo '<a href="top.php">進む</a>';
}
   
?>