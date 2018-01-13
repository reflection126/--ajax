/**
 * Created by caimzhao on 2018/1/7.
 */

//对象选择器
function $sel(id,tabname){
    if(id!="" && tabname!=""){
        var tem_obj=document.getElementById(id);
        return tem_obj.getElementsByTagName(tabname);
    }else if(id!=""){
        return document.getElementById(id);
    }else{
        return document.getElementsByTagName(tabname);
    }
}

//电话号码验证
function isNum(obj){
    var reg=/^1[0-9]{10}/;
    if(!reg.test(obj.value)){
        document.getElementById("phoneTip").innerHTML = "<font color='red'>× 手机号码不合法</font>";
        obj.value="";
        document.getElementById("submit").disabled = true;
    }else{
        document.getElementById("phoneTip").innerHTML = "<font color='green'>√ 手机号码合法</font>";
        document.getElementById("submit").disabled = false;
    }
}

//验证邮件格式
function isMail(obj){
    var reg=/[a-zA-Z0-9]{1,10}@[a-zA-Z0-9]{1,5}\.[a-zA-Z0-9]{1,5}/;
    if(!reg.test(obj.value)){
        document.getElementById("emailTip").innerHTML = "<font color='red'>× 邮箱不合法</font>";
        obj.value="";
        document.getElementById("submit").disabled = true;
    }else{
        document.getElementById("emailTip").innerHTML = "<font color='green'>√ 邮箱合法</font>";
        document.getElementById("submit").disabled = false;

    }
}

//验证用户名格式
function isName(obj){
    var reg=/^[\u4e00-\u9fa5]{2,4}$/;
    if(!reg.test(obj.value)){
        document.getElementById("nameTip").innerHTML = "<font color='red'>× 用户名不合法</font>";
        obj.value="";
        document.getElementById("submit").disabled = true;
    }else{
        document.getElementById("nameTip").innerHTML = "<font color='green'>√ 用户名合法</font>";
        document.getElementById("submit").disabled = false;

    }
}


function init(){
    //注册一个失去焦点的事件
    $sel("phoneNum","").onblur=function(){
        isNum(this);
    }

    $sel("email","").onblur=function(){
        isMail(this);
    }

    $sel("username","").onblur=function(){
        isName(this);
    }
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



function check(){
    var psd1 = document.getElementById("password1").value;
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var phoneNum = document.getElementById("phoneNum").value;
    if(username==""){
        document.getElementById("submit").disabled = true;
        alert("用户名不能为空");
    }

    if (psd1==""){
        document.getElementById("submit").disabled = true;
        alert("密码不能为空");
    }
    var psd2 = document.getElementById("password2").value;

    if (psd1!=psd2) {
        alert("请确认您的密码");
        document.getElementById("submit").disabled = true;
    }
    if(phoneNum==""){
        alert("请填写您的手机号码");
        document.getElementById("submit").disabled = true;
    }
    if(email==""){
        alert("请填写您的邮箱");
        document.getElementById("submit").disabled = true;
    }


}