<?php
session_start();

define('DB_HOST', '127.0.0.1');  //地址
define('DB_USER', 'root');       //用户名
define('DB_PWD', '');            //密码
define('DB_NAME', 'register');    //数据库名

//mysqli_connect和mysqli_close 配对使用
//mysql_connect 和 mysql_close配对使用
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}
//echo '数据库连接成功！';

//设置字符编码
mysqli_query($conn, "set names utf8");
$id =  (int)$_GET["id"];
//echo $id;
//echo gettype($id);
//echo $clean['username'];
// //查询
$sql = "select * from tb_user where id=$id";
//尝试输出查询语句：
//echo $sql;

$queryResult = mysqli_query($conn, $sql);
if (!$queryResult) {
    die('找不到当前用户' . mysqli_error($conn));
}

$queryResult = mysqli_query($conn, $sql);
if (!$queryResult) {
    die('无法输出用户信息' . mysqli_error($conn));
}

$row = mysqli_fetch_array($queryResult, MYSQLI_ASSOC);
$_SESSION['id'] = $row["id"];
if(!isset($_SESSION['img'])) {
    $imgTemp=$row['img'];
    echo "从数据库读取img:" . "{$imgTemp}";
}else{
    $imgTemp=$_SESSION['img'];
    echo "从session 中读取temp" . "{$imgTemp}";
}


$tempName = $row["username"];
$tempPassword = $row["password"];

//最终目的是：从后台进入修改个人信息时，从数据库中获取个人的信息，图片加载的是数据库中的图片，而当重置图片时，仅仅更新了session中的信息
//而当在加载该页面时，sessoin['img']再一次被充值为数据库中的信息，导致无法更新图片。
//希望

$tempPhoneNum = $row["phoneNum"];
$tempEmail = $row["email"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员更改用户信息</title>
    <link rel="stylesheet" type="text/css" href="css/updateUser.css">
    <script src="js/updateUser.js"></script>
</head>
<body>


<!-- header -->
<div id = "header" class="header"><span><?php echo '你好!&nbsp;' . $tempName; ?></span> <a href="logout.php">退出登陆</a></div>
<!-- main -->
<div class="main" id="main">
    <form action="AdminUpDateDb.php" method="post" enctype="multipart/form-data">
        <!--   添加图片     -->
        <div class="addImgButtonWrapper">
            <input type=button class="addImgButton" value="点击添加图片" onclick="open_win()" />
        </div>
        <div class="imgPic">
            <?php
            if($imgTemp!=null){
                echo "<img src='{$imgTemp}'>";}?>
        </div>

        <div class="form-item" id="form-item-account">
            <label>用  户  名</label>
            <input type="text" id="username" name="username" class="field" value=<?php echo "{$tempName}"; ?>>
        </div>


        <!--输入密码-->
        <div class="input-tip"><span></span></div>
        <div class="form-item">
            <label>修 改 密 码</label>
            <input type="password" id="password1"  class="field" name="password" value=<?php echo "{$tempPassword}"; ?>>
            <!--            <i class="i-status"></i>-->
        </div>
        <!--        确认密码-->
        <div class="input-tip" id="tishi"><span></span></div>
        <div class="form-item">
            <label>确 认 密 码</label>
            <input type="password" id="password2"  class="field" name="password2" onkeyup="validate()" value=<?php echo "{$tempPassword}"; ?> >
            <i class="i-status"></i>
        </div>

        <!--   手机号码-->
        <div class="input-tip"><span></span></div>
        <div class="form-item">
            <label>手 机 号 码</label>
            <input type="text" id="phoneNum"  class="field" name="phoneNum" value=<?php echo "{$tempPhoneNum}"; ?>>
            <i class="i-status"></i>
        </div>

        <!--   邮箱地址-->
        <div class="input-tip"><span></span></div>
        <div class="form-item">
            <label>常 用 邮 箱</label>
            <input type="text" id="email"  class="field" name="email" value=<?php echo "{$tempEmail}"; ?>>
            <i class="i-status"></i>
        </div>

        <div class="submitWrapper">
            <button id = "submit" class="submitButton" type="submit">确 认 修 改</button>
        </div>
    </form>

</div>
<?php

if(!isset($_SESSION['username'])){
    echo "<script> alert('检测不到您的登陆状态！')</script>";
    echo " <a href=\"login.php\">请重新登陆</a>";
    echo "<script> document.getElementById('main').setAttribute('style','display:none');</script>";
    echo "<script> document.getElementById('header').setAttribute('style','display:none');</script>";
}
?>
</body>
</html>



