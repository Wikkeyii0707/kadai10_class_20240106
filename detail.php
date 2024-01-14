<?php
//1.  DB接続します
// function h($str) {
//   return htmlspecialchars( $str ,ENT_QUOTES);
// }
$id = $_GET['id'];

session_start();
require_once('funcs.php');

loginCheck();
// try {
//   //Password:MAMP='root',XAMPP=''
//   $pdo = new PDO('*******:dbname=****;charset=utf8;host=*****','****','*****');
// } catch (PDOException $e) {
//   exit('DBConnectError'.$e->getMessage());
// }
// try {
//   //ID:'root', Password: xamppは 空白 ''
//   $pdo = new PDO('mysql:dbname=gs_db_kadai;charset=utf8;host=localhost','root','');
// } catch (PDOException $e) {
//   exit('DBConnectError:'.$e->getMessage());
// }
$pdo = connectDB();

//２．データ取得SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_kadai_table WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view='';
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit('SQLError:' . print_r($error, true));

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  // while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){

    $result=$stmt->fetch();

  }
?>

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/review.css">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
    
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <p><img src="./img/header.png" alt="ヘッダー画像"></p>
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="update.php" enctype="multipart/form-data">
        <div class="jumbotron">
            <fieldset>
                <legend>情報共有掲示板</legend>
                <label>タイトル：<input type="text" name="book_name" value="<?= $result['book_name'] ?>" ></label><br>
                <label>参考URL：<input type="text" name="book_url"value=" <?= $result['book_url'] ?>"> </label><br>
                <label>コメント<textArea name="book_comment" rows="4" cols="40" ><?= $result['book_comment'] ?></textArea></label><br>
                <?php 
                if(!empty( $result['image'])){
                    echo '<img src="' . $result['image']  . '" width="200px" height: auto;>';
                }
                ?><br>
                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                <input type="submit" value="送信">
                
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->



</body>

</html>
