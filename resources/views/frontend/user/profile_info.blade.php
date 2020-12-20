<link rel="stylesheet" href="../frontend/css/profile-info.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="root">
    <form id="mainForm" class="row" action="" method="POST">
        <h3 id="tit">Thông tin tài khoản</h3>
        <div class="col-12">
            <label for="username">Username</label>
            <input type="text" placeholder="aladin" readonly>
        </div>
        <div class="col-12">
            <label for="pass">Password</label>
            <input type="password" value="asdkjhxcv">
        </div>
        <div class="col-12">
            <label for="fullname">Họ tên</label>
            <input type="text" id="fullname" placeholder="Pham Duc Anh">
        </div>
        <div class="col-12 col-md-4">
            <label for="gender">Giới tính</label>
            <select name="gender" id="gender">
                <option value="male">Nam</option>
                <option value="female">Nữ</option>
                <option value="other">Khác</option>
            </select>
        </div>
        <div class="col-12 col-md-8">
            <label for="phonenumber">Số điện thoại</label>
            <input type="text" id="phonenumber" value="0335229871">
        </div>
        <div class="col-12">
            <label for="email">Email</label>
            <input id="email" type="email" placeholder="ducanhfo3888@gmail.com">
        </div>
        <div class="col-12 col-md-4">
            <label for="birthdate">Ngày sinh</label>
            <input type="date" id="birthdate">
        </div>
        <div class="col-12 col-md-8">
            <label for="id">Số CMND/ Căn cước</label>
            <input type="text" id="id" placeholder="VD : 0335231548761">
        </div>
        <div class="col-12 ">
            <label for="address">Địa chỉ</label>
            <input type="text" id="address">
        </div>

        <div class="col-12">
            <label for="avatar" class="fileContainer">Đổi ảnh đại diện
                <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
            </label>
        </div>
        <div class="col-12 ">
            <button class="btn btn-save">Lưu thay đổi</button>
            <a class="btn btn-cancel" href="">Huỷ</a>
        </div>

    </form>
</div>

<script src="../frontend/js/iframeResizer.contentWindow.min.js"></script>
<script>
    $('#avatar').change(function(){
        if($('#avatar')[0].files.length === 0){
            console.log("NO");
        } else{
            console.log("Yes");
        }
    })
</script>
