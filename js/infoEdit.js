/**
 * Created by caimzhao on 2018/1/7.
 */
//function open_win()
//{
//    window.open('img.php','','height=400,width=600,top=300,left=500,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,status=no');
//
//}

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
