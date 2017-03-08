define(['jquery', 'cookie', 'template'], function ($, ck, template) {
// 如果没有cookie信息就跳转到login
    if (!$.cookie("PHPSESSID") && location.pathname != "/login") {
        location.href = "/login";
    }

    if (location.pathname != "/login" && location.pathname != "/dashboard/login") {
        var tcInfo = JSON.parse($.cookie("tcInfo"));
        var html = template("avatar", tcInfo);
        $(".aside>.profile").html(html);
    }

    $("#logoutBtn").on("click", function () {
        //退出功能
        $.ajax({
            url: "/api/logout",
            type: "POST",
            success: function (info) {
                if (info.code == 200) {
                    location.href = "/login";
                }
            }
        })
    })
})


