<?php
/**
 * MySQLに接続しデータを取得する
 *
 */

//-------------------------------------------------
// 準備
//-------------------------------------------------
$dsn  = 'mysql:dbname=sgrpg;host=127.0.0.1';  // 接続先を定義
$user = 'senpai';      // MySQLのユーザーID
$pw   = 'indocurry';   // MySQLのパスワード

// 実行したいSQL
$sql = 'SELECT * FROM user';  // Userテーブルの全ての列を取得する


//-------------------------------------------------
// SQLを実行
//-------------------------------------------------
$dbh = new PDO($dsn, $user, $pw);   // 接続
$sth = $dbh->prepare($sql);         // SQL準備
$sth->execute();                    // 実行

// 取得した内容を表示する
while( $buff = $sth->fetch(PDO::FETCH_ASSOC) ){  // 実行結果から1レコード取ってくる
  $id    = $buff['id'];
  $lv    = $buff['lv'];
  $exp   = $buff['exp'];
  $money = $buff['money'];

  // 表示する
  printf("%d, %d, %d, %d\n", $id, $lv, $exp, $money);
}