<?php
session_start();

if (isset($_GET['action']) == 'login') {
    //echo "action :login";
    $clean = array();
    $clean['username'] = ($_POST['username']);
    $clean['password'] = ($_POST['password']);

    //echo $clean['username'];
    //echo $clean['password'];

   include ("connectToDb.php");
    // //查询
    $sql = "select * from tb_user where username = '{$clean['username']}'";
    $queryResult = mysqli_query($conn, $sql);
    if (!$queryResult) {
        die('could not query' . mysqli_error($conn));
    }

    $rows = mysqli_fetch_array($queryResult, MYSQLI_ASSOC);
    //输出当前输入用户名所对应的密码，如果用户名不在数据库，则为空

    //echo $rows["password"];同名情况下只输出第一个password->

    //用输入的密码和用户名对赢得密码比对，判断是否匹配
    if ($rows["password"] ==  crypt($clean['password'],"key")) {
        //echo "密码正确";
        //Header("HTTP/1.1 303 See Other");
        //在使用header函数之前，不能输出任何东西
        $_SESSION['id'] = $rows["id"];
        $_SESSION['username'] = $rows["username"];
        $_SESSION['password'] = $clean['password'];
        $_SESSION['phoneNum'] = $rows["phoneNum"];
        $_SESSION['email'] = $rows["email"];
        $_SESSION['img'] = $rows["img"];

        Header("Location: infoEdit2.php");


    } else {
        echo "<script>alert('用户名或密码错误');</script>";
    }


}

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        <登陆>
    </title>
    <script type="text/javascript" src="js/html5.js"></script>
    <link href="css/login.css" rel="stylesheet" type="text/css"/>
</head>
<body>


<div class="loginBox">
    <div class="loginLogo">
        <h1>用户登陆</h1>
    </div>
    <div class="loginContent">
        <!-- <font color="red">用户名或密码错误</font> -->
        <form name="login" action="login.php?action=login" method="post">
            <div class="userNameBox">
                <span>用户名：</span><input type="text" name="username">
            </div>

            <div class="passwordBox">
                <span>密&nbsp&nbsp&nbsp&nbsp码：</span><input type="password" name="password">
            </div>

            <div class="submitBox">
                <button type="submit" class="bt_submit">登&nbsp&nbsp&nbsp&nbsp陆</button>
            </div>
            <div class="register"><a href="register2.php">注册新用户</a></div>

        </form>
    </div>
</div>

</body>
</html>