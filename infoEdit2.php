<?php
//在页面加载之前开启session(),使表单中使用的session 信息能够顺利加载。
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人信息编辑页</title>
    <link rel="stylesheet" type="text/css" href="css/infoEdit.css">
    <link rel="stylesheet" href="css/input.css">
    <script src="js/register.js"></script>
</head>

<body onload="init()">

<!-- header -->
<div id = "header" class="header"><span><?php echo '你好!&nbsp;' . $_SESSION['username']; ?></span> <a href="logout.php">退出登陆</a></div>
<!-- main -->
<div class="main" id="main">
    <form name = "myForm" action="upDateDb.php" method="post" enctype="multipart/form-data">
        <div class="input-tip" id="nameTip"><span></span></div>
        <div class="form-item" id="form-item-account">
            <label>用  户  名</label>
            <input type="text" id="username" name="username" class="field" value=<?php echo "{$_SESSION['username']}"; ?>>
        </div>

<!-- 添加图片-->
        <div class="content">
            <div class="file_upload">
                <div class="file_con">
                    <div>
                        <a href="javascript:;" class="selectFile">
                        <!-- name="img"上传服务器检测检测文件时使用-->
                            <input type="file" class="hide" id="upload" name="img">修改图片
                        </a>
                    </div>
                    <!--                    session中的临时图片-->
                    <div class="sessionImg"><img onerror="this.style.display='none'" src=<?php echo "{$_SESSION['img']}" ?>></div>
                    <div class="img_holder"> </div>
                    <div class="progress"> <span ></span></div>
                    <div class="imgConfirm">
                        <button type="button" id="btn" value="submit">上&nbsp;&nbsp;传</button>
                    </div>
                </div>

            </div>
        </div>
        <script type="text/javascript" src="js/jquery-1.11.1.js"></script>
        <script type="text/javascript" src="js/input.js"></script>


        <!--输入密码-->

        <div class="input-tip" id="tishi2"><span></span></div>
        <div class="form-item">
            <label>修 改 密 码</label>
            <input type="password" id="password1"  class="field" name="password" value=<?php echo "{$_SESSION['password']}"; ?>>
            <!--            <i class="i-status"></i>-->
        </div>

        <!--        确认密码-->
        <div class="input-tip" id="tishi"><span></span></div>
        <div class="form-item">
            <label>确 认 密 码</label>
            <input type="password" id="password2"  class="field" name="password2" onkeyup="validate()" value=<?php echo "{$_SESSION['password']}"; ?> >
            <i class="i-status"></i>
        </div>

        <!--   手机号码-->
        <div class="input-tip" id="phoneTip"><span></span></div>
        <div class="form-item">
            <label>手 机 号 码</label>
            <input type="text" id="phoneNum"  class="field" name="phoneNum" value=<?php echo "{$_SESSION['phoneNum']}"; ?>>
            <i class="i-status"></i>
        </div>

        <!--   邮箱地址-->
        <div class="input-tip" id="emailTip"><span></span></div>
        <div class="form-item">
            <label>常 用 邮 箱</label>
            <input type="text" id="email"  class="field" name="email" value=<?php echo "{$_SESSION['email']}"; ?>>
            <i class="i-status"></i>
        </div>

        <div class="submitWrapper">
            <button id = "submit" class="submitButton" type="submit" onclick="check()">确 认 修 改</button>
        </div>
    </form>

</div>
<?php

if(!isset($_SESSION['username'])){
    echo "<script> alert('检测不到您的登陆状态！')</script>";
    echo " <a href=\"login.php\">请重新登陆</a>";
    //在文档加载止呕才能获取main 和 header
    echo "<script> document.getElementById('main').setAttribute('style','display:none');</script>";
    echo "<script> document.getElementById('header').setAttribute('style','display:none');</script>";
}
?>
</body>
</html>



