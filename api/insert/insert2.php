<?php
/**
 * MySQLに接続しデータを追加する
 * 
 */

//-------------------------------------------------
// 準備
//-------------------------------------------------
$dsn  = 'mysql:dbname=sgrpg;host=127.0.0.1';  // 接続先を定義
$user = 'senpai';      // MySQLのユーザーID
$pw   = 'indocurry';   // MySQLのパスワード

// 実行したいSQL
$sql = 'INSERT INTO user(lv, exp, money) VALUES(:lv,:exp,:money)';

// 挿入したいデータ
$lv    = 6;
$exp   = 4000;
$money = 20000;

//-------------------------------------------------
// SQLを実行
//-------------------------------------------------
$dbh = new PDO($dsn, $user, $pw);   // 接続
$sth = $dbh->prepare($sql);         // SQL準備

// プレースホルダに値を入れる
$sth->bindValue(':lv',    $lv,    PDO::PARAM_INT);
$sth->bindValue(':exp',   $exp,   PDO::PARAM_INT);
$sth->bindValue(':money', $money, PDO::PARAM_INT);

// 実行
$sth->execute();