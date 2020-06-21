<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="browser.css">
    <script type="text/javascript">
        function display_alert()
        {
            alert("功能未完善")
        }
    </script>
    <script>
        var proData = {"China":["Shanghai","Kunming","Beijing","Yantai"],"Japan":["Tokyo","Osaka","Kamakura"],"Italy":["Roma","Milan","Venice","Florence"],"America":["New York","San Francisco", "Washington"]};
        window.onload = function () {
            var oSelectPro = document.getElementById('pro_id');
            var oSelectCity = document.getElementById('city_id');

            oSelectPro.onchange = function () {
                //获取当前选中的标签值
                var aRrayCity = proData[this.value];
                //选择后清空option
                oSelectCity.options.length=0;
                for (var i=0;i<aRrayCity.length;i++){
                    var oOption = document.createElement('option');
                    oOption.innerHTML = aRrayCity[i];
                    oOption.value = aRrayCity[i];
                    oSelectCity.appendChild(oOption)
                }

            }
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
            }
            ?>

        </ul>

    </nav>
</div>

<section>
    <div id="aside">
        <div id="hotsearch">
            <div id="title">Search by Title</div>
            <input class="search"><div class="q" onclick="display_alert()">搜索</div>
        </div>
        <br>
        <div id="hotcountry">
            <div id="title2">Hot Country</div>
            <div class="country" onclick="display_alert()">China</div>
            <div class="country" onclick="display_alert()">China</div>
            <div class="bottom" onclick="display_alert()">China</div>
        </div>
        <br>
        <div id="hotcity">
            <div id="title3">Hot City</div>
            <div class="country" onclick="display_alert()">Chengdu</div>
            <div class="country" onclick="display_alert()">Shanghai</div>
            <div class="bottom" onclick="display_alert()">New York</div>
        </div>
        <br>
        <div id="hotcontent">
            <div id="title4">Hot Content</div>
            <div class="country" onclick="display_alert()">Scenery</div>
            <div class="country" onclick="display_alert()">City</div>
            <div class="bottom" onclick="display_alert()">People</div>
        </div>
    </div>
    <div id="filer">
        <div id="title5">filter</div>
        <div id="section">
            <select class="select" >
                <option>Filter by Content</option>
                <option>Scenery</option>
                <option>People</option>
                <option>City</option>
            </select>
            <select name="province" id="pro_id" class="select">
                <option>Filter by Country</option>
                <option value="China">China</option>
                <option value="Japan">Japan</option>
                <option value="Italy">Italy</option>
                <option value="America">America</option>
            </select>

            <select name="city" id="city_id" class="select" >
                <option>Filter by City</option>
            </select>
            <button id="xuan" onclick="display_alert()">Filter</button>
        </div>
        <div id="display">
            <ul>
                <li class="picture"><a href="details.html"><img src="images/1.png"  style="width: 200px;height: 200px"></a></li>
                <li class="picture"><a href="details.html"><img src="images/2.jpg"  style="width: 200px;height: 200px"></a></li>
                <li class="picture"><a href="details.html"><img src="images/3.jpg"  style="width: 200px;height: 200px"></a></li>
                <li class="picture"><a href="details.html"><img src="images/4.jpg"  style="width: 200px;height: 200px"></a></li>
                <li class="picture"><a href="details.html"><img src="images/5.jpg"  style="width: 200px;height: 200px"></a></li>
                <li class="picture"><a href="details.html"><img src="images/6.jpg"  style="width: 200px;height: 200px"></a></li>
                <li class="picture"><a href="details.html"><img src="images/1.png"  style="width: 200px;height: 200px"></a></li>
                <li class="picture"><a href="details.html"><img src="images/2.jpg"  style="width: 200px;height: 200px"></a></li>
                <li class="picture"><a href="details.html"><img src="images/3.jpg"  style="width: 200px;height: 200px"></a></li>
                <li class="picture"><a href="details.html"><img src="images/4.jpg"  style="width: 200px;height: 200px"></a></li>
                <li class="picture"><a href="details.html"><img src="images/5.jpg"  style="width: 200px;height: 200px"></a></li>
                <li class="picture"><a href="details.html"><img src="images/6.jpg"  style="width: 200px;height: 200px"></a></li>
                <li class="picture"><a href="details.html"><img src="images/1.png"  style="width: 200px;height: 200px"></a></li>
                <li class="picture"><a href="details.html"><img src="images/2.jpg"  style="width: 200px;height: 200px"></a></li>
                <li class="picture"><a href="details.html"><img src="images/3.jpg"  style="width: 200px;height: 200px"></a></li>
                <li class="picture"><a href="details.html"><img src="images/4.jpg"  style="width: 200px;height: 200px"></a></li>
            </ul>
            <div id="yema"><<  1    2  3  4  5  6  7  >></div>
        </div>
    </div>
</section>
<footer>
    Copyright:@2019-2021 Web fudamental All Right Reserved  备案号：19302010041
</footer>
</body>
</html>