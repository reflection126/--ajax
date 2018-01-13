<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册页面</title>

    <link rel="stylesheet" type="text/css" href="css/register2.css">
    <link rel="stylesheet" type="text/css" href="css/input.css">
    <script src="js/jquery-1.11.1.js"></script>
    <script src="js/register.js"></script>
    <script src="js/html5.js"></script>
</head>
<body onload="init()">
<!-- header -->
<div class="header">欢迎注册！</div>
<!-- main -->
<div class="main">
    <form name="myForm" action="insertDb.php" method="post" enctype="multipart/form-data">
        <!--  用户名-->
        <div class="input-tip" id="nameTip"><span></span></div>
        <div class="form-item" id="form-item-account">
            <label>用 户 名</label>
            <input type="text" id="username" name="username" class="field" placeholder="请填写您的姓名">
        </div>
        <!--  插入图片      -->
        <div class="content">
            <div class="file_upload">
                <div class="file_con">
                    <div>
                        <a href="javascript:;" class="selectFile">
                            <!-- name="img"上传服务器检测检测文件时使用-->
                            <input type="file" class="hide" id="upload" name="img">选择图片
                        </a>

                    </div>
                    <div class="img_holder"></div>
                    <div class="progress"></div>
                    <div class="imgConfirm">
                        <button type="button" id="btn" value="submit">上传</button>
                    </div>

                </div>
            </div>
            <script src="js/imgAjax.js"></script>
            <script type="text/javascript" src="js/jquery-1.11.1.js"></script>
            <script type="text/javascript" src="js/input.js"></script>

            <!--输入密码-->
            <div class="input-tip" id="tishi2"><span></span></div>
            <div class="form-item">
                <label>设 置 密 码</label>
                <input type="password" id="password1" class="field" name="password" placeholder="建议至少两种字符组合">
                <!--            <i class="i-status"></i>-->
            </div>

            <!-- 确认密码-->
            <div class="input-tip" id="tishi"><span></span></div>
            <div class="form-item">
                <label>确 认 密 码</label>
                <input type="password" id="password2" class="field" name="password2" placeholder="请再次输入密码"
                       onkeyup="validate()">
                <i class="i-status"></i>
            </div>

            <!--   手机号码-->
            <div class="input-tip" id="phoneTip"><span></span></div>
            <div class="form-item">
                <label>手 机 号 码</label>
                <input type="text" id="phoneNum" class="field" name="phoneNum" placeholder="建议使用常用手机">
                <i class="i-status"></i>
            </div>

            <!--   邮箱地址-->
            <div class="input-tip" id="emailTip"><span></span></div>
            <div class="form-item">
                <label>常 用 邮 箱</label>
                <input type="text" id="email" class="field" name="email" placeholder="请输入您的常用邮箱">
                <i class="i-status"></i>
            </div>

            <div class="submitWrapper">
                <button id="submit" class="submitButton" type="submit" onclick="check()">立 即 注 册</button>
            </div>
    </form>
    <div class="hasID">已有账号？<a href="logout.php">请登陆</a></div>

</div>

</body>
</html>