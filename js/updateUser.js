/**
 * Created by caimzhao on 2018/1/7.
 */
function open_win()
{
    window.open('img.php','','height=400,width=600,top=300,left=500');

}

function validate() {
    var pwd1 = document.getElementById("password1").value;
    var pwd2 = document.getElementById("password2").value;
    <!-- 对比两次输入的密码 -->
    if (pwd1 == pwd2) {
        document.getElementById("tishi").innerHTML = "<font color='green'>√ 两次密码输入一致</font>";
        document.getElementById("submit").disabled = false;
    }
    else {
        document.getElementById("tishi").innerHTML = "<font color='red'>× 两次密码输入不一致</font>";
        document.getElementById("submit").disabled = true;
    }

}

//function logout(){
//
//        var xmlhttp;
//        if (window.XMLHttpRequest)
//        {// code for IE7+, Firefox, Chrome, Opera, Safari
//            xmlhttp=new XMLHttpRequest();
//        }
//        else
//        {// code for IE6, IE5
//            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//        }
//        xmlhttp.onreadystatechange=function()
//        {
//            if (xmlhttp.readyState==4 && xmlhttp.status==200)
//            {
//                document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
//            }
//        }
//        xmlhttp.open("GET","logout.php",true);
//        xmlhttp.send();
//}