<?php
//フォームからの値をそれぞれ変数に代入
$name = $_POST['name'];
$email = $_POST['email'];
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
$dsn = "mysql:dbname=app;host=localhost";
$username = "root";
$password = "pass";
try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $msg = $e->getMessage();
}

$dbh=new PDO('mysql:host=localhost;dbname=mysql;charset=utf8', 'root', '');

//フォームに入力されたmailがすでに登録されていないかチェック
$sql = "SELECT * FROM users WHERE email = '$email'";

if($result = $dbh->query($sql)){

    if($result->num_rows == 1) {

        $msg = '同じメールアドレスが存在します。';
        $link = '<a href="signup.php">戻る</a>';

    }else{
        //登録されていなければinsert
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$pass')";

        if($dbh->query($sql)){
            $msg = '会��登録が完了しました';
            $link = '<a href="login.php">ログインページ</a>';
        }else{
            echo "Error: ". $sql. "<br>". $dbh->error;
        }

    }

}else{
    echo "Error: ". $sql. "<br>". $dbh->error;
}


?>



<h1><?php echo $msg; ?></h1><!--メッセージの出力-->
<?php echo $link; ?>

