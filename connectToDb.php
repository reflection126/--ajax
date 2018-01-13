<?php
/**
 * Created by PhpStorm.
 * User: caimzhao
 * Date: 2018/1/13
 * Time: 9:16
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
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

</body>
</html>


