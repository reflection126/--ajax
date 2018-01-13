<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册页面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/insertDb.css">

</head>
<body>
<!-- header -->
<div class="header">修改成功！</div>

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
   // echo '数据库连接成功！';

    //设置字符编码
    mysqli_query($conn, "set names utf8");
    //查询
    //  $sql = 'select * from tb_user';
    //  $queryResult = mysqli_query($conn,$sql);
    // if(!$queryResult){
    //   die('could not query'.  mysqli_error($conn));
    // }
    $id = $_SESSION["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $phoneNum = $_POST["phoneNum"];
    $email = $_POST["email"];
    $img = $_SESSION["img"];
    echo "<script>alert('{$username}')</script>";
    //插入数据库
    $upDateSql = "UPDATE tb_user SET username='{$username}',password='{$password}',phoneNum='{$phoneNum}',email='{$email}',img='{$img}' where id = '$id'";

    $upDateResult = mysqli_query($conn, $upDateSql);

    if ($upDateResult === true) {

       // Header("Location: userList.php");
    } else {
        die('信息修改失败！' . mysqli_error($conn));
    }

    ?>


</div>
</body>
</html>