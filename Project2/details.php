<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>details</title>
    <link type="text/css" rel="stylesheet" href="details.css">

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
            Details
        </div>
        <?php
        try {
            $a = $_GET['url'];
            $title = '';
            $path = '';
            $contexnt ='';
            $description = '';
            $citycode = '';
            $countrycode = '';
            $imageID = 1;
            $pdo = new PDO('mysql:dbname=travel;charset=utf8mb4;','hometext','1234567890');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'select * from travelimage where PATH = "'.$a.'"';
            $result = $pdo->query($sql);
            while ($row = $result->fetch()) {
                $title = $row['Title'];
                $path = $row['PATH'];
                $description = $row['Description'];
                $contexnt = $row['Content'];
                $citycode = $row['CityCode'];
                $countrycode = $row['Country_RegionCodeISO'];
                $imageID = $row['ImageID'];
            }
            $pdo = null;
        }catch (PDOException $e) {
            die( $e->getMessage() );
        }
        ?>
        <?php
        $city = '';
        $pdo = new PDO('mysql:dbname=travel;charset=utf8mb4;','hometext','1234567890');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'select * from geocities where GeoNameID = "'.$citycode.'"';
        $result = $pdo->query($sql);
        while ($row = $result->fetch()) {
          $city = $row['AsciiName'];
        }
        $pdo = null;
        ?>
        <?php
        $country = '';
        $pdo = new PDO('mysql:dbname=travel;charset=utf8mb4;','hometext','1234567890');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'select * from geocountries_regions where ISO = "'.$countrycode.'"';
        $result = $pdo->query($sql);
        while ($row = $result->fetch()) {
            $country = $row['Country_RegionName'];
        }
        $pdo = null;
        ?>
        <?php
        $number = '';
        $pdo = new PDO('mysql:dbname=travel;charset=utf8mb4;','hometext','1234567890');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT COUNT(0) FROM travelimagefavor WHERE ImageID ="'.$imageID.'"';
        $result = $pdo->query($sql);
        while ($row = $result->fetch()) {
            $number = $row[0];
        }
        $pdo = null;
        ?>
        <div id="detail">
            <br>
            <br>
            <div id="title2">
                <span id="title3"><?php
                    echo $title;
                    ?></span> <samll id="small">by zxz</samll>
            </div>

            <div id="des">
                <?php
                echo '<div id="picture"><img src="travel-images/square-medium/'.$path.'" width="560px" height="400px"></div>'
                ?>

                <div id="information">
                    <div class="sd">
                        <div id="title4">Like Number</div>
                        <div id="number">
                            <?php
                            echo $number;
                            ?>
                        </div>
                    </div>
                    <div class="sd">
                        <div id="title5">Image Details</div>
                        <div class="imagedetails">Content:
                            <?php
                            echo $contexnt;
                            ?></div>
                        <div class="imagedetails">Country:
                            <?php
                            echo $country;
                            ?></div>
                        <div class="imagedetails" id="imagedetail1">City:
                            <?php
                            echo $city;
                            ?></div>
                    </div>
                    <?php
                    $sssss = "收藏";
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
                    $sql = 'select * from travelimagefavor where UID = :uid and ImageID = :imageid';
                    $statement = $pdo->prepare($sql);
                    $statement->bindValue(':uid', $uid);
                    $statement->bindValue(':imageid',$imageID);

                    $statement->execute();
                    if ($statement->rowCount() > 0) {
                      $sssss= "已收藏";
                    }

                    $pdo = null;
                    ?>
                    <div class="sd">
                        <form method="post">
                            <button id="shoucang" name="qq"><?php
                                echo $sssss;
                                ?></button>
                        </form>
                        <?php

                        if(isset($_POST['qq']) & $sssss == "收藏"){
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
                            $sql = 'INSERT INTO travelimagefavor (UID,ImageID) VALUES (:uid,:imageid)';
                            $statement = $pdo->prepare($sql);
                            $statement->bindValue(':uid', $uid);
                            $statement->bindValue(':imageid',$imageID);

                            $statement->execute();
                            if ($statement->rowCount() > 0) {
                              echo '<script>
        document.getElementById("shoucang").innerText = "已收藏";
    </script>';
                            }
                            else{
                                echo '<Script>alert("未知错误导致收藏失败,请稍后再试")</Script>';
                            }
                            $pdo = null;
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div id="wenzi">
                <span style="font-size: 15px;font-weight: bold; line-height: 40px;"><?php
                    echo $description;
                    ?>
                    </span>
            </div>
        </div>
    </div>
</section>
<footer>
    Copyright:@2019-2021 Web fudamental All Right Reserved  备案号：19302010041
</footer>
</body>
</html>
<?php
$a = $_GET['url'];
echo $a;
