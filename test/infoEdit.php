<?php
session_start();
date_default_timezone_set("PRC");         //设置时区
if (count($_FILES) > 0) {

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
            $_SESSION['img']=$img_name;
            echo "<script>alert('{$_SESSION['img']}')</script>";
            //echo $_SESSION['img'];
        } else {
            echo "上传失败";
        }
    } else {
        echo "不是图片类型";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人信息编辑页</title>
    <link rel="stylesheet" type="text/css" href="../css/register.css">
    <script src="../js/infoEdit.js"></script>
</head>
<body>
<!-- header -->
<div class="header"><?php echo '你好!&nbsp;' . $_SESSION['username']; ?></div>
<!-- main -->
<div class="main">
    <form action="../upDateDb.php" method="post" enctype="multipart/form-data">
        <table class="tableWrap">
            <tr>
                <td>
                    <table class="tableInner" cellspacing="0" cellpadding="0">
                        <tr class="zhxx">
                            <td colspan="2">&nbsp;账户信息</td>
                        </tr>
                        <!-- 用户名 -->
                        <tr>
                            <td class="leftTd"><label>*<b>用户名：</b></label>
                            </td>
                            <td><input type="text" name="username" id="username"
                                       value=<?php echo "{$_SESSION['username']}"; ?>></td>
                        </tr>
                        <!-- 上传照片 -->
                        <tr>
                            <td class="leftTd"><label>*<b>请上传您的照片：</b></label>
                            </td>
                            <td>
<!--                                这里不再设置value值：出于以下几点考虑：
1.如果用户之前没有有上传过照片，在login.php中，通过查找数据库，没有找到img信息，保存在$_SESSION['img']为空。
2.如果将value的值设置为$_SESSION['img'],那么再次提交表单时，$_POST中的值依旧为空，没有提交的意义。
3.如果将value的值设置为$img_name，在提交表单之前，会提示$img_name为undined
a.如果用户之前上传过照片，那么在login.php中，将会检索到img的值，并传递给$_SESSION['img']
b.如果用户将value的值设置为$_SESSION['img'],那么提交表单时，post的依旧是之前数据库中的img信息
c.如果将value的值设置为$img_name，在提交表单之前，会提示$img_name为undined

因此将新照片的路径只用$_SESSION['img']来存储即可，这样它既能获取之前数据库中的img信息（可以为空），又可以在用户提交表单时更新img信息。
我可以在upDateDb中使用$_SESSION['img']获取，并存储到数据库。

但是表单一旦提交，$_SESSION['img']来不及更新，就跳转了。
想如何更新之后再跳转，但是更新必须经过表单提交才能从$_FILE中获取到值。

添加button，js到新窗口，在新窗口实现图片上传，img信息保存到session中
-->
<!--                                <input type="file" name="img" id="img">-->


                                <input type=button class="addImgButton" value="点击添加图片" onclick="open_win()" />

                            </td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                    <?php
                                if($_SESSION['img']!=null){
                               echo "<img src='{$_SESSION['img']}'>";}?>
                                </div>
                            </td>
                        </tr>
                        <!-- 密码 -->
                        <tr>
                            <td class="leftTd"><label>*<b>密码：</b></label>
                            </td>
                            <td><input type="text" name="password" id="password" value = <?php echo "{$_SESSION['password']}"; ?>></td>
                        </tr>

                        <tr>
                            <td class="leftTd"><label>*<b>手机号码：</b></label>
                            </td>
                            <td><input type="text" name="phoneNum" id="phoneNum"
                                       value=<?php echo "{$_SESSION['phoneNum']}"; ?>></td>
                        </tr>

                        <tr>
                            <td class="leftTd"><label>*<b>注册邮箱：</b></label>
                            </td>
                            <td><input type="text" name="email" id="email" value=<?php echo "{$_SESSION['email']}"; ?>>
                            </td>
                        </tr>

                        <tr height="60">
                            <td align="right"></td>
                            <td>
                                <button class="submitButton" type="submit">提交更改</button>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>



