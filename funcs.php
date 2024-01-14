<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str) {
    return htmlspecialchars( $str ,ENT_QUOTES);
  }

function connectDB() {
    $param = 'mysql:dbname=gs_db_kadai;host=localhost';
    try {
        $pdo = new PDO($param, 'root', '');
        return $pdo;

    } catch (PDOException $e) {
      
      exit('DBConnectError:'.$e->getMessage());
    }
}

function redirect($filename){
  //*** function化する！*****************
  header("Location: $filename");
  exit();
}

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}

//ログインチェック
function loginCheck(){

  if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
    echo "LOGIN Error!";
    redirect('login.php');
    exit();
  }else{
    session_regenerate_id(true);
    $_SESSION["chk_ssid"]=session_id();

  }
}