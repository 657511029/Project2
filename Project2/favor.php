<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>favor</title>
    <link type="text/css" rel="stylesheet" href="favor.css">
    <script>
        function display_alert() {
            alert("功能未完善")
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
</div><section>
    <div id="myphoto1">
        <div id="title2">
            My Favorite
        </div>
        <?php
        $uid = '';
        $pdo = new PDO('mysql:dbname=travel;charset=utf8mb4;','hometext','1234567890');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT * FROM traveluser WHERE UserName ="'.$_SESSION['Username'].'"';
        $result = $pdo->query($sql);
        while ($row = $result->fetch()) {
            $uid = $row['UID'];
        }
        $pdo = null;
        $pdo = new PDO('mysql:dbname=travel;charset=utf8mb4;','hometext','1234567890');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'select * from travelimagefavor where UID = '.$uid;
        $result = $pdo->query($sql);
        while ($row = $result->fetch()) {
            $sql1 = 'select * from travelimage where ImageID = '.$row['ImageID'];
            $result1 = $pdo->query($sql1);
            while ($row1 = $result1->fetch()) {
                echo '<div class="result">
            <div style=" float: left;width: 240px"><a href="details.php?url=' . $row1['PATH'] . '"><img src="travel-images/square-medium/' . $row1['PATH'] . '" width="200" height="200" style="margin: 17px;"></a></div>
            <div class = "description"><br><br>' . $row1['Title'] . '<br><br>
                <span style="font-size: 15px;font-weight: normal">' . $row1['Description'] . '
                    </span>
            </div>

            <div class="button">
                <br>
                <form method="post">
                 <button class="s2" name="ee">Delete</button>
              </form>
               
            </div>
        </div>';
                if (isset($_POST['ee'])) {
                    $sql1 = 'delete from travelimagefavor where ImageID = '.$row1['ImageID'];
                    $result1 = $pdo->query($sql1);
                    header('Location:favor.php');
                }
            }
        }
        $pdo = null;
        ?>

        
            <br>
            <br>
            <div style="text-align: center;font-size: 20px;font-weight: normal;width: 1350px;">

                << 1  2  3  4  5  6  7  8  >></div>
        </div>
    </div>
</section>
<footer>
    Copyright:@2019-2021 Web fudamental All Right Reserved  备案号：19302010041
</footer>
</body>
</html>
