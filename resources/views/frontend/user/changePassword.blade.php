<link rel="stylesheet" href="../frontend/css/profile-info.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    var base_url = '<?php echo e(url('/')); ?>';
</script>
<style>
    #old-password-span, #re-password-span {
        font-size: 14px;
        color: red;
    }
    .f-w-500 {
        font-weight: 500!important;
    }
</style>
<div class="root">
    <form role="form" id="mainForm" class="row" action="#" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h3 id="tit">Đổi mật khẩu</h3>
        <div class="col-12">
            <label for="email" class="f-w-500">Mật khẩu cũ</label>
            <input id="old_password" type="password" value="" placeholder="Nhập mật khẩu cũ tại đây" >
            <span id="old-password-span">Làm route check pass cũ rồi làm đổi mật khẩu !!</span>
        </div>
        <div class="col-12">
            <label for="new_password" class="f-w-500">Mật khẩu mới</label>
            <input type="password" id="new_password" name="name" value="" placeholder="Nhập mật khẩu mới tại đây" onchange="checkPass()">
        </div>
        <div class="col-12">
            <label for="re_new_password" class="f-w-500">Nhập lại mật khẩu mới</label>
            <input type="password" id="re_new_password" name="name" value="" placeholder="Nhập lại mật khẩu mới" onchange="checkPass()">
            <span id="re-password-span"></span>
        </div>

        <div class="col-12 ">
            <button type="submit" class="btn btn-save" id="submit_btn">Lưu thay đổi</button>
            <a class="btn btn-cancel" href="">Huỷ</a>
        </div>

    </form>
</div>



<script src="../frontend/js/iframeResizer.contentWindow.min.js"></script>
<script>
    function checkPass() {
        var pass = $('#new_password').val();
        var rePass = $('#re_new_password').val();
        if (pass != rePass) {
            $('#re-password-span').css('color', 'red');
            $('#re-password-span').html('Nhập lại mật khẩu không trùng khớp !');
            $('#submit_btn').attr('disabled', 'true');
        }else {
            $('#re-password-span').css('color', 'green');
            $('#re-password-span').html('Nhập lại mật khẩu trùng khớp !');
            $('#submit_btn').removeAttr('disabled');

        }
    }
</script>

{{--<script>--}}
{{--    $('#avatar').change(function(){--}}
{{--        if($('#avatar')[0].files.length === 0){--}}
{{--            console.log("NO");--}}
{{--        } else{--}}
{{--            console.log("Yes");--}}
{{--        }--}}
{{--    })--}}
{{--</script>--}}
