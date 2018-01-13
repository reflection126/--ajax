<?php
/**
 * Created by PhpStorm.
 * User: caimzhao
 * Date: 2018/1/9
 * Time: 20:46
 * 退出登陆功能
 */
    session_start();
    session_destroy();
    Header("Location: login.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

</body>
</html>
