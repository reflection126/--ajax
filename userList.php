<?php
/**
 * Created by PhpStorm.
 * User: caimzhao
 * Date: 2018/1/10
 * Time: 8:49
 * 显示用户列表,通过查找数据库打印
 */

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
//echo $clean['username'];
// //查询
$sql = "select * from tb_user";
//尝试输出查询语句：
//echo $sql;

$queryResult = mysqli_query($conn, $sql);
if (!$queryResult) {
    die('could not query' . mysqli_error($conn));
}
session_start();
session_destroy();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户列表</title>
    <link rel="stylesheet" href="css/userList.css">
</head>
<body>
<div id="header" class="header"><span>用户列表</span></div>
<div class="main">
    <div class="user">
        <span class="id">序号
        </span><span class="username">用户名
        </span><span class="password">密  码
        </span><span class="phoneNum">电  话
        </span><span class="email">邮 箱
        </span><span class="update">修 改
        </span><span class="delete">删 除</span>
    </div>
    <?php
        while ($rows= mysqli_fetch_array($queryResult, MYSQLI_ASSOC)){
            echo "<div class='userList'><span>{$rows['id']}</span>".
                "<span class='username'>{$rows['username']}</span>".
                "<span class='password'>{$rows['password']}</span>".
                "<span class='phoneNum'>{$rows['phoneNum']}</span>".
                "<span class='email'>{$rows['email']}</span>".
                "<span class='update'><a href='updateUser.php?id={$rows['id']}'>修 改</a></span>".
                "<span class='delete'><a href='delete.php?id={$rows['id']}'>删 除</a></span>" .
                "</div><hr>";
        }
    ?>
</div>
</body>
</html>
