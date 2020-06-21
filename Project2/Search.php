<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <link type="text/css" rel="stylesheet" href="Search.css">
    <script>
        function display_alert() {
            alert("功能未完善")
        }
    </script>
    <script>
        function shu() {
            document.getElementById("first1").readOnly = false;
            document.getElementById("second1").readOnly=true;
        }
        function sun1() {
            document.getElementById("second1").readOnly=false;
            document.getElementById("first1").readOnly=true;
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
<section>
    <div id="s">
        <div id="title1">
            Search
        </div>
        <div id="xuanze" style="width: 1350px">
            <form method="post">
                <input type="radio"  id = "first" name="filter" value="filter by title" checked="checked" onclick="shu()" style="margin: 10px"> Filter by Title
                <br>
                <input  class="t" id = "first1" style="width: 1000px;height: 30px;" name = "title" value="">
                <br>
                <input type="radio" onclick="sun1()" id= "second" name="filter"  value="filter by description" style="margin: 10px"> Filter by Description
                <br>
                <textarea class="t" id="second1" name = "description" readonly="readonly" style="width: 1000px; height: 120px;" value = ""></textarea>
                <br>
                <button id="filter" type="submit" ">Filter</button>
            </form>
            <div id="r">
                <div id="title2">Result
                </div>
            <?php
            error_reporting(0);
            $searchtitle = $_POST['title'];
            $searchdescription = $_POST['description'];
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $pdo = new PDO('mysql:dbname=travel;charset=utf8mb4;','hometext','1234567890');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               if(!$searchtitle == ''){
                   $sql = 'select * from travelimage where Title Like "%'.$searchtitle.'%"';
                   $result = $pdo->query($sql);
                   while ($row = $result->fetch()) {
                       echo '
        <div class="result">
            <div style=" float: left;width: 240px"><a href="details.php?url='.$row['PATH'].'"><img src="travel-images/square-medium/'.$row['PATH'].'" width="200" height="200" style="margin: 17px;"></a></div>
            <div class = "description"><br><br>'.$row['Title'].'<br><br>
                <span style="font-size: 15px;font-weight: normal">'.$row['Description'].'</span>
            </div>
        </div>

        
    ';}
               }
               if(!$searchdescription == ''){
                   $sql1 = 'select * from travelimage where Description LIKE "'.$searchdescription.'%"';
                   $result1 = $pdo->query($sql1);
                   while ($row1 = $result1->fetch()) {
                       echo '
        <div class="result">
            <div style=" float: left;width: 240px"><a href="details.php?url='.$row1['PATH'].'"><img src="travel-images/square-medium/'.$row1['PATH'].'" width="200" height="200" style="margin: 17px;"></a></div>
            <div class = "description"><br><br>'.$row1['Title'].'<br><br>
                <span style="font-size: 15px;font-weight: normal">'.$row1['Description'].'</span>
            </div>
        </div>

        
    ';
                   }
               }
                $pdo = null;

            }
            ?>
            </div>
            <br>
            <br>
            <br>
            <div style="text-align: center;font-size: 20px;font-weight: normal;width: 1350px;">
                << 1  2  3  4  5  6  7  8  >></div>
        </div>
        </div>
    </div>


</section>

</body>
<footer>
    Copyright:@2019-2021 Web fudamental All Right Reserved  备案号：19302010041
</footer>
</html>