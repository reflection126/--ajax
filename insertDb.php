<?php
session_start();
date_default_timezone_set("PRC");         //设置时区
if (count($_FILES) > 0) {
    $sort = array("image/jpeg", "image/jpg", "image/gif", "image/pdg", "image/png","image/bmp");
//判断是否是图片类型,$_FILES['img']['type']:表单中的name为img，第二项为类型。
    //echo "<br>{$_FILES['img']['type']}<br>";
    // echo "{$_FILES['img']['name']}<br>";

    if (in_array($_FILES['img']['type'], $sort)) {
        $img = "img";    //获取上传到的文件夹位置
//判断文件夹是否存在 ,如果不存在创建一个
        if (!file_exists($img)) {
            mkdir("$img", 0700);        //0700最高权限
        }
        $time = date("Y_m_d_H_i_s");     //获取当前时间
//      $file_name 被“.”打断为为数组，第一项为文件名，第二项为文件后缀
        $file_name = explode(".", $_FILES['img']['name']);         //$_FILES['img']['name'] 上传文件的名称 explode字符串打断转字符串
//       将文件名第一项修改为时间
        $file_name[0] = $time;
//        此时file_name为两项的数组，然后要转成字符串
        $name = implode(".", $file_name);    //implode 把数组拼接成字符串
//        添加文件路径img
        $img_name = "img/" . $name;

        // move_uploaded_file() 函数将上传的文件移动到新位置。
        //若成功，则返回 true，否则返回 false。
        //move_uploaded_file(file,newloc)
        if (move_uploaded_file($_FILES['img']['tmp_name'], $img_name)) {   //move_uploaded_file 移动文件
            $registerImg = $img_name;
        } else {
            echo "移动文件失败";
        }
    } else {

        echo "服务器没有收到您正确的图片信息";
    }
}


?>
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


        //插入数据库
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