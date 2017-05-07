jQuery(document).ready(function (a) {
    a("form#login1").on("submit", function (b) {
        a("form#login1 p.status").show().text(ajax_login_object.loadingmessage), a.ajax({
            type: "POST",
            dataType: "json",
            url: ajax_login_object.ajaxurl,
            data: {
                action: "ajaxlogin",
                username: a("form#login1 #username").val(),
                password: a("form#login1 #password").val(),
                security: a("form#login1 #security").val()
            },
            success: function (b) {
                a("form#login1 p.status").text(b.message), 1 == b.loggedin && (document.location.href = ajax_login_object.redirecturl)
            }
        }), b.preventDefault()
    })
});

jQuery(document).ready(function (a) {
    a("form#login_user").on("submit", function (b) {
        a("form#login_user p.status").show().text(ajax_login_object.loadingmessage), a.ajax({
            type: "POST",
            dataType: "json",
            url: ajax_login_object.ajaxurl,
            data: {
                action: "ajaxlogin",
                username: a("form#login_user #login_username").val(),
                password: a("form#login_user #login_password").val(),
                security: a("form#login_user #security").val()
            },
            success: function (b) {
                a("form#login_user p.status").text(b.message), 1 == b.loggedin && (document.location.href = ajax_login_object.redirecturl)
            }
        }), b.preventDefault()
    })
});