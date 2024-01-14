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
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="register_insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>会員登録</legend>
                <label>名前：<input type="text" name="reg_name"></label><br>
                <label>ログインID：<input type="text" name="reg_id"></label><br>
                <label>パスワード：<input type="password" name="reg_pw"></label><br>

                <input type="submit" value="送信">
                
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->



</body>

</html>
