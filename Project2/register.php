<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="register.css">
</head>
<body>
<div id="img">
    <img src="images/denglu.jpg" width="100" height="70">
</div>

<div id="denglu">
    <span id="sginin">Sign up for Fisher</span>
    <br>
    <br>
    <div id="biaodan">
        <form action="" method="post">
            <p>Username:</p>
            <input type="text" name="username" required="required">
            <p>E-mail</p>
            <input type="email" name="email"  pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" required="required"><!--设置邮箱文本框-->
            <p>Password:</p>
            <input type="password" name="password1" required="required">
            <p>Comfirm Your Password</p>
            <input type="password" name="password2" required="required">
            <br>
            <br>
            <input id="submit" type="submit" name="submit" value="Sign up">
        </form>
    </div>
</div>
<?php
function validLogin1()
{
    define('DBNAME', 'travel2');
    define('DBUSER', 'hometext');
    define('DBPASS', '1234567890');
    define('DBCONNSTRING','mysql:dbname=travel;charset=utf8mb4;');

    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $sql = "SELECT * FROM traveluser WHERE UserName=:user";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':user', $_POST['username']);
    $statement->execute();
    if ($statement->rowCount() > 0) {
        return true;
    }
    return false;
}
function utf8_strlen($string = null) {
    // 将字符串分解为单元
    preg_match_all("/./us", $string, $match);
    // 返回单元个数
    return count($match[0]);
}

?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST['username'];
    $b = $_POST['password1'];
    $c = $_POST['password2'];
    $d = $_POST['email'];
    if(validLogin1()){
        echo '<Script>alert("用户名已被注册")</Script>';
    }
    else{
        if($b == $c){

            if(utf8_strlen($b) <= 6){
                echo '<Script>alert("密码强度弱，请重新输入")</Script>';
            }
            else{
                if($a == 'huangyixiong'){
                    echo '<Script>alert("非法用户名，请重新输入")</Script>';
                }
                else{
                    $pdo = new PDO('mysql:dbname=travel;charset=utf8mb4;', 'hometext', '1234567890');
                    $sql = 'INSERT INTO traveluser (Email,UserName,Pass) VALUES (:email,:username,:password)';
                    $statement = $pdo->prepare($sql);
                    $statement->bindValue(':email', $_POST['email']);
                    $statement->bindValue(':username', $_POST['username']);
                    $statement->bindValue(':password', $_POST['password1']);
                    $statement->execute();
                    if ($statement->rowCount() > 0) {
                        header('Location:login.php');
                    }
                    else{
                        echo '<Script>alert("未知错误导致注册失败,请稍后再试")</Script>';
                    }
                }
            }
        }else{
            echo '<Script>alert("确认密码错误")</Script>';
        }
    }
}

?>
<footer>
    Copyright:@2019-2021 Web fudamental All Right Reserved  备案号：19302010041
</footer>
</body>
</html>