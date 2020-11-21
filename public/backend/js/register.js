



$( document ).ready(function() {
    // Handler for .ready() called.
    var password = "";
    var repassword = "";

    var check = false;


    function printError(str) {
        let noti = $('.notification');
        noti.html('');
        noti.css('color', 'red');
        noti.html(str);
    }

    function  printNoti(str) {
        let noti = $('.notification');
        noti.html('');
        noti.css('color', 'green');
        noti.html(str);

    }

    function checkSubmit(check) {
        if(!check) {
            $("#submit-btn").attr('disabled', true);
        } else {
            $("#submit-btn").attr('disabled', false);
        }
    }

    function checkExistEmail(email) {


        $.ajax({
            url: "/checkInvalidEmail/" + email,
            type: "GET",
            dataType: "json",
            data: {
            },
            beforeSend: function () {
            },
            success: function (res) {
                if(res == true) {
                    check = true;
                    printNoti("Tên đăng nhập có thể sử dụng");
                } else {
                    check = false;
                    printError("Tên đăng nhập đã tồn tại");
                }
                checkSubmit(check);

            },
            error: function () {
            },
            complete: function () {
            }
        });
    }

    $('#email').change(function () {
        let email = $("#email");
        checkExistEmail(email.val());
    });
    $('#password').change(function () {
        password = $('#password').val();
        if(password.length < 8) {
            printError("Mật khẩu phải chứa ít nhất 8 ký tự");
            $('#re-password').prop('disabled', 'true');
            check = false;
            checkSubmit(check);
        } else {
            printError("");
            $('#re-password').removeAttr('disabled');
            check = true;
            checkSubmit(check);
        }
    });
    $('#re-password').change(function () {
        repassword = $('#re-password').val();
        if( repassword != password) {
            printError("Nhập lại mật khẩu không trùng");
            check = false;
            checkSubmit(check);
        } else {
            printNoti("Mật khẩu trùng khớp");
            check = true;
            checkSubmit(check);
        }
    });

    $("#submit-btn").click(function () {
        // console.log($("#name").val());
    });
    if(check == false) {
        $("#submit-btn").attr('disabled', true);
    }
});

