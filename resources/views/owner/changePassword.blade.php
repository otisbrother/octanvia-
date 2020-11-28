@extends('owner.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Thay đổi mật khẩu tài khoản <a href="{{route('owner.room.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <form  id="form_create_room" role="form" action="{{ route('postchangePassword') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu cũ</label>
                                <input type="password" class="form-control" id="old-password" name="old-password" placeholder="Nhập mật khẩu cũ" onchange="checkOldPassword()" required>
                                <span class="form-message" id="oldpass-msg" style="color: red"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu mới</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Nhập mật khẩu mới" onchange="checkPass()" required>
                                <span id="newpass-msg" style="color: red"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhập lại mật khẩu mới</label>
                                <input type="password" class="form-control" id="re-new_password" name="re-new_password" placeholder="Nhập lại mật khẩu mới" onchange="checkPass()" required>
                                <span class="" id="checkPass" style="color: red" ></span>
                            </div>

                        <div class="box-footer">
                            <p id="msg"></p>

                            <button type="submit" id="submit_btn" class="btn btn-primary" >Thay đổi</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
@section('my_javascript')
    <script>
        function checkPass() {
            let old_pass = $('#old-password').val();
            var pass = document.getElementById('new_password').value;
            var rePass = document.getElementById('re-new_password').value;
            if(old_pass == pass) {
                $('#newpass-msg').html('Mật khẩu mới trùng mật khẩu cũ.')
            } else {
                $('#newpass-msg').html('');
            }
            if (pass != rePass) {
                document.getElementById('checkPass').innerHTML = 'Nhập lại mật khẩu không trùng khớp';
                $('#submit_btn').attr('disabled', 'true');
            }else {
                document.getElementById('checkPass').innerHTML = '';
                $('#submit_btn').removeAttr('disabled');

            }

        }


        function checkOldPassword() {
            let password = $('#old-password').val();
            $.ajax({
                url: base_url + '/checkOldPassword/'+password, // base_url được khai báo ở đầu page == http://renthouse.co
                type: 'GET',
                data: {}, // dữ liệu truyền sang nếu có
                dataType: "json", // kiểu dữ liệu trả về
                success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                    if(response != true) {
                        $('#submit_btn').attr('disabled', 'true');
                        msg = 'Mật khẩu cũ không đúng';
                        $('#oldpass-msg').html(msg);
                        $('#oldpass-msg').css('color', 'red');
                    } else {
                        $('#submit_btn').removeAttr('disabled');
                        $('#oldpass-msg').html('');
                    }
                },
                error: function (e) { // lỗi nếu có
                    console.log(e.message);
                }
            });
        }
    </script>
@endsection
