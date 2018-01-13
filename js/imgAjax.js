/**
 * Created by caimzhao on 2018/1/12.
 */
    //ajax 异步上传图片


$(document).ready(
    function(){
        $('#btn').click(function () {
            var img = document.myForm.img.files[0];

            var fm = new FormData();
            fm.append('img', img);
            $.ajax(
                {
                    url: 'imgAjaxToSession.php',
                    type: 'POST',
                    data: fm,
                    contentType: false, //禁止设置请求类型
                    processData: false, //禁止jquery对DAta数据的处理,默认会处理
                    //禁止的原因是,FormData已经帮我们做了处理
                    success: function (result) {
                        //测试是否成功
                        //但需要你后端有返回值
                        alert(result);
                    }
                }
            );
        });
    }
);








