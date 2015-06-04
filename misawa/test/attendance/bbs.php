<?php
session_start();
$today = date("Y-m-d H:m:s");
$pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");

$st = $pdo->prepare("INSERT INTO bbs_logs VALUES(?, '$today', ?)");//SQL文の発行
$st->execute(array($_POST['contributeName'], $_POST['contributeContent']));

echo "{$_POST['contributeName']}","{$_POST['contributeContent']}";

header('Location: top.php#bbs');
?>