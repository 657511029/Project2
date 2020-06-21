<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="login.css">
</head>
<body>
<div id="img">
    <img src="src/images/denglu.jpg" width="100" height="70">
</div>

<div id="denglu">
    <span id="sginin">Sign in for Fisher</span>
    <br>
    <br>
    <div id="biaodan">
        <form action="" method="post">
            <p>Username:</p>
            <input type="text" name="username" required="required">
            <p>Password:</p>
            <input type="password" name="password" required="required">
            <br>
            <br>
            <input id="submit" type="submit" name="submit" value="Sign in">
        </form>
    </div>
    <span id="mo">New to Fisher? <span><a href="register.html">Create a new account?</a></span></span>
</div>
<footer>
    Copyright:@2019-2021 Web fudamental All Right Reserved  备案号：19302010041
</footer>
</body>
<?php
function validLogin()
{

    define('DBNAME', 'travel2');
    define('DBUSER', 'hometext');
    define('DBPASS', '1234567890');
    define('DBCONNSTRING','mysql:dbname=travel;charset=utf8mb4;');

    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    //very simple (and insecure) check of valid credentials.
    $sql = "SELECT * FROM traveluser WHERE UserName=:user and Pass =:pass";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(':user', $_POST['username']);
    $statement->bindValue(':pass', $_POST['password']);
    $statement->execute();
    if ($statement->rowCount() > 0) {
        return true;
    }
    return false;
}
?>
<?php
session_start();

$_SESSION["loggedIn"] =false ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(validLogin()){
        // add 1 day to the current time for expiry time
        $expiryTime = time()+60*60*24;
        $_SESSION['Username']=$_POST['username'];
        $_SESSION["loggedIn"] = true;
        header('location:home.php');

    }
    else{
        echo '<Script>alert("用户名或密码错误")</Script>';
    }
}




?></html>