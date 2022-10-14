$(document).ready(function() {
    $("#login_form").validate({
        onfocusout: false,
        onclick: false,
        rules: {
            "email": {
                required: true,
                email: true,
            },
            "password": {
                required: true,
                minlength:6,
            },
        },
        messages: {
            "email": {
                required: "Bạn chưa nhập email",
                email: "Chưa đúng định dạng email",
            },
            "password": {
                required: "Bạn chưa nhập password",
                minlength: "Password phải trên 6 ký tự"
            },
        },
        errorPlacement: function(error, element) {
            $(element).parent('div').next('.err').html(error);
        },
    });


    $("#form_register").validate({
        onfocusout: false,
        onclick: false,
        rules: {
            "name": {
                required: true,
            },
            "email": {
                required: true,
                email: true,
            },
            "password": {
                required: true,
                minlength:8,
            },
            "re_pass": {
                required: true,
                equalTo: "#password",
            },

        },
        messages: {
            "name": {
                required: "Tên không được để trống",
            },
            "email": {
                required: "Email không được để trống",
                email: "Chưa đúng định dạng email",
            },
            "password": {
                required: "Pass word không được để trống",
                minlength: "Password phải trên 8 ký tự"
            },
            "re_pass": {
                required: "Mật khẩu xác nhận không được để trống",
                equalTo: "Mật khẩu xác nhận chưa đúng",
            },
        },
        errorPlacement: function(error, element) {
            $(element).parent('div').next('.err').html(error);
        },
    });
    $("#form_change_password").validate({
        onfocusout: false,
        onclick: false,
        rules: {
            "password": {
                required: true,
                minlength:8,
            },
            "re_pass": {
                required: true,
                equalTo: "#password",
            },

        },
        messages: {
            "password": {
                required: "Pass word không được để trống",
                minlength: "Password phải trên 8 ký tự"
            },
            "re_pass": {
                required: "Mật khẩu xác nhận không được để trống",
                equalTo: "Mật khẩu xác nhận chưa đúng",
            },
        },
        errorPlacement: function(error, element) {
            $(element).parent('div').next('.err').html(error);
        },
    });
    $("#form_forgot").validate({
        onfocusout: false,
        onclick: false,
        rules: {
            "email": {
                required: true,
                email: true,
            },
        },
        messages: {
            "email": {
                required: "Email không được để trống",
                email: "Chưa đúng định dạng email",
            },
        },
        errorPlacement: function(error, element) {
            $(element).parent('div').next('.err').html(error);
        },
    });
});