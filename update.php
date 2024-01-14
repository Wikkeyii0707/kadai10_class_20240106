<?php
require_once('funcs.php');

/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得
$book_name =$_POST['book_name'];
$book_url =$_POST['book_url'];
$book_comment =$_POST['book_comment'];
$id = $_POST['id'];

//2. DB接続します
// try {
//   //ID:'root', Password: xamppは 空白 ''
//   $pdo = new PDO('mysql:dbname=gs_db_kadai;charset=utf8;host=localhost','root','');
// } catch (PDOException $e) {
//   exit('DBConnectError:'.$e->getMessage());
// }
$pdo = connectDB();

//３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare('UPDATE 
    gs_kadai_table
    SET
    book_name=:book_name, book_url=:book_url,book_comment=:book_comment, reg_date=sysdate()
    where id=:id;
    )'); 

// "sysdate": Unknown word.
//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR);
$stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);
$stmt->bindValue(':book_comment', $book_comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
  //５．index.phpへリダイレクト
  // echo 'test';
  // header('Location: index.php');
  redirect('select.php');
}



