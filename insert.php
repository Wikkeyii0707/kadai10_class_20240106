<?php
session_start();
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

$image= '';

if (isset($_FILES["image"])) {
    //画像の名前をリネーム処理
    //一時保存されている画像をimgフォルダに移動させる。
    $upload_file =$_FILES['image']['tmp_name'];
    
      //送られてきた名前を確認する。
    $extension =pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
    $new_name=uniqid() . '.' . $extension;
    $image_path = 'img/' . $new_name;

    //一時保存ファイルをimgフォルダに移動される（保存する）
    if (move_uploaded_file($upload_file, $image_path)){
        $image =$image_path;
    }

    //保存する。
}

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
$stmt = $pdo->prepare("
  INSERT INTO 
    gs_kadai_table(id,book_name,book_url,book_comment,reg_date,image)
  VALUES
    (NULL,:book_name, :book_url, :book_comment, sysdate(),:image);"); 

// "sysdate": Unknown word.
//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR);
$stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);
$stmt->bindValue(':book_comment', $book_comment, PDO::PARAM_STR);
$stmt->bindValue(':image', $image, PDO::PARAM_STR);

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
  redirect('index.php');
}


?>
