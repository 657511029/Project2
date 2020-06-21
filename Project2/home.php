<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="home.css">
    <script type="text/javascript">
        function display_alert()
        {
            alert("图片已刷新")
        }
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</head>
<body>
<div id="w" >
    <nav id="daohang">
        <ul>
            <li > <a href="home.php" id="home">Home</a></li>
            <li><a href="browser.php">Browse</a></li>
            <li> <a href="Search.php">Search</a></li>
            <?php
            session_start();
            if(!$_SESSION['loggedIn']){
                echo '<div id="account3"><a href="login.php">登录</a></div>';
            }
            else{
                echo '<div id="account2">
                <span id="account">Account</span>
                <div id="account1">
                    <p> <a  href="upload.php"><img src="images/logo1.jpg.png" width="15" height="15">上传</a></p>
                    <p>   <a href="Myphoto.php"><img src="images/logo2.png" width="15" height="15">我的照片</a></p>
                    <p><a href="favor.php"><img src="images/logo3.png" width="15" height="15">我的收藏</a></p>
                    <p> <a href="loginout.php"><img src="images/logo4.jpg" width="15" height="15">登出</a></p>
                </div>
            </div>';
}           ?>

        </ul>

    </nav>
</div>

<?php
try {
    $pdo = new PDO('mysql:dbname=travel;charset=utf8mb4;','hometext','1234567890');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'select ImageID,count(*) time from travelimagefavor  group by ImageID order by time desc limit 1';
    $ax = 1;
    $result = $pdo->query($sql);
    while ($row = $result->fetch()) {
        $ax = $row['ImageID'];
    }
    $pdo = null;
}catch (PDOException $e) {
    die( $e->getMessage() );
}

?>
<?php
$pdo = new PDO('mysql:dbname=travel;charset=utf8mb4;','hometext','1234567890');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql1 = 'SELECT * FROM travelimage WHERE ImageID = '.$ax;
$result = $pdo->query($sql);
while ($row = $result->fetch()) {
    echo '<img width=100% height="600px" src="travel-images/large/'.$row['PATH'].'">';
}
$pdo = null;
?>
<section>
    <ul>
        <?php
        try {
            $pdo = new PDO('mysql:dbname=travel;charset=utf8mb4;','hometext','1234567890');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'select * from travelimage order by rand() limit 6';
            $result = $pdo->query($sql);
            while ($row = $result->fetch()) {
                echo '  <li>
        <a href="details.php?url='.$row['PATH'].'">
            <img src="travel-images/square-medium/'.$row['PATH'].'"></a>
        '.$row['Title'].'<br>
        <small>'.$row['Description'].'</small>

    </li>';
            }
            $pdo = null;
        }catch (PDOException $e) {
            die( $e->getMessage() );
        }

        ?>
    </ul>

</section>
<form method="post">
    <button class="sideMenuControl" name="aaa">≡</button>
</form>
<?php
if(isset($_POST['aaa'])){
    header('Location:home.php');
}
?>
<button class="top" onclick="topFunction()">x</button>
<footer>
    <br><br><br><br>
    <div>Copyright:@2019-2021 Web fudamental All Right Reserved  备案号：19302010041</div>
</footer>
</body>
</html>