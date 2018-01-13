<?php
/**
 * Created by PhpStorm.
 * User: caimzhao
 * Date: 2018/1/7
 * Time: 20:21
 *
 *
 * 从userList.php 到 updateUser.php ，数据库中没有img 信息为空
 *
 *
 */

session_start();
date_default_timezone_set("PRC");         //设置时区
if (count($_FILES) > 0) {
    echo "收到一个文件";
    $sort = array("image/jpeg", "image/jpg", "image/gif", "image/pdg", "image/png");
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
            //echo "<script>alert('{$_SESSION['img']}')</script>";
            // echo $_SESSION['img'];

        } else {
            echo "上传失败";
        }
    } else {
        echo "<script>alert('文件格式错误！')</script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加图片</title>
    <link rel="stylesheet" href="css/img.css">
    <script src="js/img.js"></script>
</head>
<body>
<div class="leftButtons">
    <form action="#" method="post" enctype="multipart/form-data">
        <div><a href="javascript:;" class="selectFile">
                <input class="selectImg" type="file" name="img">选择文件
            </a>
        </div>
        <div class="submitWrapper">
<!--           点击预览之后实际上已经提交了form,只不过action="#",同时session['img']得到了刷新-->
            <input type="submit" class="submitImg" value="点击预览">
        </div>

    </form>
    <div class="confirmWrapper">
<!--        确认提交：调用js,刷新它的父窗口，同时时关闭当前窗口-->
        <input type="button" class="confirmImg" value="确认提交" onclick="reLoadParent()">
    </div>
    <div class="infoWrapper">
        <p>*请使用后缀为.jpg .png .gif .jpg .jpeg的文件格式</p>

         <?php echo "<hr>". "图片信息：". "{$_SESSION['img']}" ?>
    </div>
</div>

<div class="rightGallery">
    <div class="imgWrapper">
<!--无图片则不显示-->
        <img onerror="this.style.display='none'" src= <?php echo "{$_SESSION['img']}";?> >
    </div>
</div>
</body>
</html>