/**
 * Created by caimzhao on 2018/1/11.
 */
(function () {
    var file = {
        upload: function (e) {
            var file = e.target.files[0];
            var type = file.type.split('/')[0];
            if (type != 'image') {
                alert('请上传图片');
                return;
            }
            var size = Math.floor(file.size / 1024 / 1024);
            if (size > 3) {
                alert('图片大小不得超过3M');
                return;
            }
            ;
            var reader = new FileReader();
            console.log(file);

            // reader.readAsBinaryString(file);
            // reader.readAsArrayBuffer(file);
            // reader.abort(file);
            // reader.readAsText(file);
            reader.readAsDataURL(file);
            reader.onloadstart = function () {
                console.log('start');
            };
            reader.onprogress = function (e) {
                var p = '已完成：' + Math.round(e.loaded / e.total * 100) + '%';
                $(".file_con").find(".progress").html(p);
                // console.log(e);
                console.log('uploading');
            };
            reader.onabort = function () {
                console.log('abort');
            };
            reader.onerror = function () {
                console.log('error');
            };
            reader.onload = function () {
                $(".sessionImg").css("display","none");
                $(".img_holder").css("display","block");
                console.log('load complete');
            };
            reader.onloadend = function (e) {

                var dataURL = reader.result;

                var image = '<img src="' + dataURL + '"/>';

                var text = '<span>"' + dataURL + '"</span>';

                //file里面存放有文件的名字(name)、格式(type)、大小(size)、上传时间(time)等等
                var name = file.name, size = Math.round(file.size / 1024), time = new Date(file.lastModified);

                time = time.getFullYear() + '年' + Math.floor(time.getMonth() + 1) + '月' + time.getDate() + '日';
                //var div = '<p>Name: ' + name + '</p><p>Size: ' + size + 'kb</p>';
                var imglist = '<div class="img_box"><span class="delete">X</span>' + image + '</div>';
                $(".img_holder").html(imglist);
                //异步提交数据
                //$(".upload_bt").click(function () {
                //    if ($("#upload").val() == '') {
                //        alert('请上传图片');
                //        return;
                //    }
                //    ;
                //    var para = {
                //        name: name,
                //        url: dataURL
                //    };
                //    $.ajax({
                //        url: 'http://www.baidu.com',
                //        type: 'post',
                //        data: para,
                //        success: function (data) {
                //            if (data) {
                //                alert('success');
                //            } else {
                //                alert('failure');
                //            }
                //        },
                //        err: function () {
                //            alert('error');
                //        }
                //    })
                //});
            };
        },

        event: function () {
            $("#upload").change(function (e) {
                $(".progress").removeClass("none");
                file.upload(e);
            });
        },
        init: function () {
            this.event();
        }
    }
    file.init();


}());