<?php
/**
 * Created by PhpStorm.
 * User: caimzhao
 * Date: 2018/1/8
 * Time: 19:13
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>


<script language="javascript">

    alert("会议记录保存成功！");
    function reload(){
        window.opener.location.reload(); //刷新父窗口中的网页
        window.close();//关闭当前窗窗口
    }


</script>

<div><input type="button" value="reload" onclick="reload()"></div>
</body>
</html>
