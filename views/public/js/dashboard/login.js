/**
 * Created by lenovo on 2017/3/7.
 */
define(["jquery","cookie"], function ($) {
//给表单注册点击事件
    $("#loginForm").submit(function () {
        //表单序列化
        var data = $("#loginForm").serializeArray();
        $.ajax({
            url: "/api/login",
            data: data,
            type: "post",
            success: function (info) {
                if (info.code == 200) {
                    $.cookie("tcInfo", JSON.stringify(info.result));
                    location.href = '/dashboard/index';
                }
            },
            error: function (info) {
                alert('用户名或密码错误');
            }
        });
        return false;
    })
})
