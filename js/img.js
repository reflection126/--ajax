/**
 * Created by caimzhao on 2018/1/7.
 */

var windowHeight = 380;
var windowWidth = 420;

var iTop = (window.screen.availHeight - windowHeight) / 2;
var iLeft = (window.screen.availWidth) / 2;
console.log(iTop);
console.log(iLeft);
window.resizeTo(windowWidth, windowHeight);
window.moveTo(iLeft, iTop);
window.toolbar = 0;
window.menubar = 0;
function reLoadParent() {
    //window.opener.location.reload(); //刷新父窗口中的网页
    window.close();//关闭当前窗窗口
}
