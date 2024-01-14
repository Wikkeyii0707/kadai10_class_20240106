<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link rel="stylesheet" href="css/style.css">

    
</head>
    
<!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <p><img src="./img/header.png" alt="ヘッダー画像"></p>
                <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="register.php">会員登録</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="insert.php" enctype="multipart/form-data">
        <div class="jumbotron">
            <fieldset>
                <legend>情報共有掲示板</legend>
                <label>タイトル：<input type="text" name="book_name"></label><br>
                <label>参考URL：<input type="text" name="book_url"></label><br>
                <label>コメント<textArea name="book_comment" rows="4" cols="40"></textArea></label><br>
                <div>
                    <label for="image">画像：</label>
                    <input type="file" id="image" name="image">
                </div>
                <input type="submit" value="送信">
                
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->



</body>

</html>
