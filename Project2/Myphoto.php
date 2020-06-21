<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>myphoto</title>
    <link type="text/css" rel="stylesheet" href="my%20photo.css">
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
</div>
<section>
    <div id="myphoto1">
        <div id="title2">
            My Photo
        </div>
        <div class="result">
            <div style=" float: left;width: 240px"><a href="details.html"><img src="images/1.png" width="200" height="200" style="margin: 17px;"></a></div>
            <div class = "description"><br><br>Title<br><br>
                <span style="font-size: 15px;font-weight: normal">The beautiful scenery is enjoyable and intoxicating.
                The lofty mountains in the distance, in the sunshine, put on the gold coat, appear particularly beautiful.A right color bright, fine gorgeous,
                    is drafting the happy love sabot likely! Also has that magnificent tulip to fall the season which innumerable sweetheart  the tulip smells as sweet,
                    the tender and beautiful charming girl's smiling face like flower passes on fragrantly Spooky bund, windmill,
                    green grass, den, satisfied prosperous curcumafragrant flowers field, intermittent fragrant!
                    </span>
            </div>

            <div class="button">
                <br>
                <a href="upload.html"><button class="s1" >Modify</button></a>
                <button class="s2" onclick="display_alert()">Delete</button>
            </div>
        </div>
        <div class="result">
            <div style=" float: left;width: 240px"><a href="details.html"><img src="images/1.png" width="200" height="200" style="margin: 17px;"></a></div>
            <div class = "description"><br><br>Title<br><br>
                <span style="font-size: 15px;font-weight: normal">The beautiful scenery is enjoyable and intoxicating.
                The lofty mountains in the distance, in the sunshine, put on the gold coat, appear particularly beautiful.A right color bright, fine gorgeous,
                    is drafting the happy love sabot likely! Also has that magnificent tulip to fall the season which innumerable sweetheart  the tulip smells as sweet,
                    the tender and beautiful charming girl's smiling face like flower passes on fragrantly Spooky bund, windmill,
                    green grass, den, satisfied prosperous curcumafragrant flowers field, intermittent fragrant!
                    </span>
            </div>

            <div class="button">
                <br>
                <a href="upload.html"><button class="s1" >Modify</button></a>
                <button class="s2" onclick="display_alert()">Delete</button>
            </div>
        </div>
        <div class="result">
            <div style=" float: left;width: 240px"><a href="details.html"><img src="images/1.png" width="200" height="200" style="margin: 17px;"></a></div>
            <div class = "description"><br><br>Title<br><br>
                <span style="font-size: 15px;font-weight: normal">The beautiful scenery is enjoyable and intoxicating.
                The lofty mountains in the distance, in the sunshine, put on the gold coat, appear particularly beautiful.A right color bright, fine gorgeous,
                    is drafting the happy love sabot likely! Also has that magnificent tulip to fall the season which innumerable sweetheart  the tulip smells as sweet,
                    the tender and beautiful charming girl's smiling face like flower passes on fragrantly Spooky bund, windmill,
                    green grass, den, satisfied prosperous curcumafragrant flowers field, intermittent fragrant!
                    </span>
            </div>

            <div class="button">
                <br>
                <a href="upload.html"><button class="s1" >Modify</button></a>
                <button class="s2" onclick="display_alert()">Delete</button>
            </div>
        </div>
        <div class="result" style="height: 350px">
            <div style="width: 1340px;height: 240px">
                <div style=" float: left;width: 240px"><a href="details.html"><img src="images/1.png" width="200" height="200" style="margin: 17px;"></a></div>
                <div class = "description"><br>Title<br><br>
                    <span style="font-size: 15px;font-weight: normal">The beautiful scenery is enjoyable and intoxicating.
                The lofty mountains in the distance, in the sunshine, put on the gold coat, appear particularly beautiful.A right color bright, fine gorgeous,
                    is drafting the happy love sabot likely! Also has that magnificent tulip to fall the season which innumerable sweetheart  the tulip smells as sweet,
                    the tender and beautiful charming girl's smiling face like flower passes on fragrantly Spooky bund, windmill,
                    green grass, den, satisfied prosperous curcumafragrant flowers field, intermittent fragrant!
                    </span>
                </div>

                <div class="button">
                    <br>
                    <a href="upload.html"><button class="s1" >Modify</button></a>
                    <button class="s2" onclick="display_alert()">Delete</button>
                </div>
            </div>
            <br>
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