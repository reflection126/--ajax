
# loginRegister-ajax

公共部分：
conenctToDb.php ，连接数据库

逻辑部分：
register2.php 注册页面，包含客户端认证register.js，图片预览 input.js ,图片异步提交 imgAjax.js ，提交到imgAjaxToSession.php，将图信息保存到session
insertDb.php 注册结果页面，注册成功后将信息插入数据库，引用connecToDb.php 链接数据库
login.php  登陆页面，表单提交给当前页,查询数据库，验证成功后，Header到信息编辑页面
