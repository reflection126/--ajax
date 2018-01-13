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
            $_SESSION['img'] = $img_name;
            echo  "{$_SESSION['img']}";
        } else {
            echo "移动文件失败";
        }
    } else {
        echo "服务器没有收到您正确的图片信息";
    }
}

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
