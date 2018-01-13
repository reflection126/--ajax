<?php include("postImg.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册结果</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/insertDb.css">
</head>
<body>
<!-- header -->
<div class="header">注册结果</div>
<!-- main -->
<div class="main">
    <?php
    include("connectToDb.php");
    //判断用户名或密码是否为空，并加密密码
    if(trim($_POST['username'])!= "" and trim($_POST['password'])!= ""){
        $username = $_POST["username"];
        $password = crypt($_POST["password"],"key");//加密
        $phoneNum = $_POST["phoneNum"];
        $email = $_POST["email"];
        //如果上传图片失败，为null
        if(!isset($registerImg)){
            $registerImg = null;
            echo "服务器没有收到您正确的图片信息<br>";
        }else{
            echo "图片上传成功<br>";
        }

        $insertSql = "INSERT INTO tb_user (username, password, phoneNum,email,img) VALUES ('{$username}','{$password}','{$phoneNum}','{$email}','{$registerImg}')";
        $insertResult = mysqli_query($conn, $insertSql);

        if ($insertResult === true) {
            echo "数据库录入成功<br>";
            echo "<div> <a href='login.php'><br>请点击这里，重新登陆</a></div>";
        } else {
            die('信息录入失败！' . mysqli_error($conn));
        }
    }else{
        echo "用户名或密码为空！". "<a href='register2.php'>请重新注册</a><br><br>";
    }
    ?>
</div>
</body>
</html>