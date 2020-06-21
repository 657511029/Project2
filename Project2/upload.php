<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>upload</title>
    <link type="text/css" rel="stylesheet" href="upload.css">
    <script>
        function changepic() {
            var reads = new FileReader();
            f = document.getElementById('file').files[0];
            reads.readAsDataURL(f);
            reads.onload = function(e) {
                document.getElementById('img').src = this.result;
                document.getElementById('url').innerText = "";
            };
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
            Upload
            <input type="file" style="opacity: 0" id="file" onchange="changepic()" accept="image/jpeg,image/jpg,image/png">
        </div>
        <div id="r">
            <div id="shuangchuang">
                <div id="picture"><img id="img" width="350px" height="300px">
                </div>
                <div id="url">
                    图片未上传
                </div>
                <br>
                <button class="up2" onclick="document.getElementById('file').click()">修改</button>
            </div>
            <div id="form">
                <form action="" method="post">
                    <select class="select" name="content">
                        <option>Content</option>
                        <option>Scenery</option>
                        <option>City</option>
                        <option>People</option>
                        <option>Animal</option>
                        <option>Building</option>
                        <option>Wonder</option>
                        <option>Other</option>
                    </select>
                    <p class="title2">图片标题：</p>
                    <input type="text" id="tupianbiaoti" name="title3">
                    <p class="title2">图片描述：</p>
                    <textarea id="tupianmiaoshu" name="description3"></textarea>
                    <p class="title2">拍摄国家：</p>
                    <select  id="paisheguojia" name="country3">
                        <?php
                        error_reporting(0);
                        $pdo = new PDO('mysql:dbname=travel;charset=utf8mb4;','hometext','1234567890');
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = 'SELECT * FROM geocountries_regions order by ISO ';
                        $result = $pdo->query($sql);
                        while ($row = $result->fetch()) {
                            echo '<option>'.$row['Country_RegionName'].'</option>';
                        }
                        ?>
                    </select>
                    <script language="javascript">
                        function check(value){
                            $.ajax({
                            url:'ajax.php?action=ok',
                            type:'post',data:
                                'value='+value,
                            async : false,
                            success:
                                function(){}});
                        }</script>
                    <p class="title2">拍摄城市：</p>
                    <select  id="paishechengshi" name="city3">

                    </select>
                    <br>
                    <br>
                    <input type="submit" id="submit" value="submit">
                </form>
                <?php
                $upcontent = $_POST['content'];
                $uptitle = $_POST['title3'];
                $updesscription = $_POST['description3'];
                $upcountry = $_POST['country3'];
                $upcity = $_POST['city3'];
                $uid = '';
                $pdo = new PDO('mysql:dbname=travel;charset=utf8mb4;','hometext','1234567890');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'SELECT * FROM traveluser WHERE UserName ="'.$_SESSION['Username'].'"';
                $result = $pdo->query($sql);
                while ($row = $result->fetch()) {
                    $uid = $row['UID'];
                }

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if($uptitle==''|$updesscription==''|$upcountry==''|$upcity==''){
                        $iso = '';
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = 'SELECT * FROM geocountries_regions WHERE Country_RegionName ="'.$upcountry.'"';
                        $result = $pdo->query($sql);
                        while ($row = $result->fetch()) {
                            $iso = $row['ISO'];
                        }
                        $geoname = '';
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = 'SELECT * FROM geocities WHERE AsciiName ="'.$upcity.'"';
                        $result = $pdo->query($sql);
                        while ($row = $result->fetch()) {
                            $geoname = $row['GeoNameID'];
                        }
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "insert into travelimage (Title,Description,CityCode,Country_RegionCodeISO,UID,PATH,Content) value (:title,:d,:ci,:co,:uid,:path,:content)";

                        $statement = $pdo->prepare($sql);
                        $statement->bindValue(':title', $uptitle);
                        $statement->bindValue(':d', $updesscription);
                        $statement->bindValue(':ci', $geoname);
                        $statement->bindValue(':co', $iso);
                        $statement->bindValue(':uid', $uid);
                        $statement->bindValue(':path', $_POST['password']);
                        $statement->bindValue(':content', $upcontent);
                    }
                }
                ?>
            </div>
        </div>

    </div>
</section>
<footer>
    Copyright:@2019-2021 Web fudamental All Right Reserved  备案号：19302010041
</footer>
</body>
</html>