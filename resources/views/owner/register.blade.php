<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rent House | Register</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <base href="{{ asset('') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/backend/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/backend/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/backend/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/backend/plugins/iCheck/square/blue.css">
    <script type="text/javascript">
        var base_url = '{{ url('/') }}';
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>Register Owner</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <form role="form" action="{{ route('owner.postRegister') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="name" placeholder="Họ Và Tên" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="birthday" name="birthday" placeholder="Ngày sinh dd/mm/yy">
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" id="cmnd" name="cmnd" placeholder="CMND" onchange="checkExistsCmnd()" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <p id="cmnd-msg"></p>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="address" placeholder="Địa Chỉ" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="phone" placeholder="Số Điện Thoại" pattern="\d{10,11}" title="Vui lòng kiểm tra lại số điện thoại" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="email" id="email" type="email" class="form-control" placeholder="Email : hovaten@gmail.com" pattern=".+@.+(\.[a-z]{2,3})" title="Kiểm tra lại định dạng email" onchange="checkExistsEmail()" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <p id="email-msg"></p>
{{--                @if ($errors->has('email'))--}}
{{--                    <span class="invalid-feedback" role="alert" style="color:red;">{{ $errors->first('email') }}</span>--}}
{{--                @endif--}}
            </div>
            <div class="form-group has-feedback">
                <input id="password" name="password" type="password" class="form-control" placeholder="Mật Khẩu" pattern=".{8,}" title="Mật khẩu phải từ 8 kí tự" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
{{--                @if ($errors->has('password'))--}}
{{--                    <span class="invalid-feedback" role="alert" style="color:red;">{{ $errors->first('password') }}</span>--}}
{{--                @endif--}}
            </div>
            <div class="form-group has-feedback">
                <input id="re_password" name="re_password" type="password" class="form-control" placeholder="Nhập Lại Mật Khẩu" oninput="checkPass()" required>
                <span class="" id="checkPass" style="color: red" ></span>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Avatar</label>
                <input type="file" id="avatar" name="avatar">
            </div>
            @if (session('msg'))
                <div class="form-group has-feedback"><a href="javascript:void(0)" style="color: #008000">{{ session('msg') }}</a></div>
            @endif

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                             <a href="{{route('owner.login')}}"><span> Đã có tài khoản ?</span></a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button id="submit_btn" type="submit" class="btn btn-primary btn-block btn-flat">Đăng Ký</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/backend/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });

    function checkPass() {
        var pass = document.getElementById('password').value;
        var rePass = document.getElementById('re_password').value;
        if (pass != rePass) {
            document.getElementById('checkPass').innerHTML = 'Mật khẩu không trùng khớp';
            $('#submit_btn').attr('disabled', 'true');
        }else {
            document.getElementById('checkPass').innerHTML = '';
            $('#submit_btn').removeAttr('disabled');

        }

    }

    function checkExistsEmail() {
        let email = $('#email').val();
        if(email == '') {
            $('#email-msg').html('');
            $('#submit_btn').removeAttr('disabled');
        } else {
            let msg = '';
            $.ajax({
                url: base_url + '/checkExistsEmail/'+email, // base_url được khai báo ở đầu page == http://renthouse.co
                type: 'GET',
                data: {}, // dữ liệu truyền sang nếu có
                dataType: "json", // kiểu dữ liệu trả về
                success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                    if(response != true) {
                        $('#submit_btn').attr('disabled', 'true');
                        msg = 'Email này đã tồn tại. Vui lòng chọn email khác!';
                        $('#email-msg').html(msg);
                        $('#email-msg').css('color', 'red');
                    } else {
                        $('#submit_btn').removeAttr('disabled');
                        msg = 'Email này có thể sử dụng';
                        $('#email-msg').html(msg);
                        $('#email-msg').css('color', '#00fa04');
                    }
                },
                error: function (e) { // lỗi nếu có
                    console.log(e.message);
                }
            });
        }

    }

    function checkExistsCmnd() {
        let cmnd = $('#cmnd').val();
        if(cmnd == '') {
            $('#cmnd-msg').html('');
            $('#submit_btn').removeAttr('disabled');
        } else {
            let msg = '';
            $.ajax({
                url: base_url + '/checkExistsCmnd/'+cmnd, // base_url được khai báo ở đầu page == http://renthouse.co
                type: 'GET',
                data: {}, // dữ liệu truyền sang nếu có
                dataType: "json", // kiểu dữ liệu trả về
                success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                    if(response != true) {
                        $('#submit_btn').attr('disabled', 'true');
                        msg = 'Số chứng minh nhân dân / căn cước này đã tồn tại!';
                        $('#cmnd-msg').html(msg);
                        $('#cmnd-msg').css('color', 'red');
                    } else {
                        $('#submit_btn').removeAttr('disabled');
                        $('#cmnd-msg').html('');
                    }
                },
                error: function (e) { // lỗi nếu có
                    console.log(e.message);
                }
            });
        }

    }
</script>
</body>
</html>
