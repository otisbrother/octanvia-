@extends('backend.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Tại sao bạn không muốn gia hạn bài này ?
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <form role="form" action="{{ route('admin.deleteRequest.refuseExtendDate', [ 'request_id' => $request_id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bài đăng</label>
                                    <input type="text" class="form-control" id="name" name="title" value="{{ $title }}"  disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Người nhận</label>
                                    <input type="text" class="form-control" id="name" name="user_name" value="{{ \App\User::findOrFail($receiver_id)->name }}"  disabled>
                                </div>
                                <div class="form-group">
                                    <label>Lý do không duyệt</label>
                                    <textarea id="editor1" name="content" class="form-control" rows="10" ></textarea>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Gửi thông báo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('my_javascript')
    <script type="text/javascript">
        $(function () {
            // setup textarea sử dụng plugin CKeditor
            var _ckeditor = CKEDITOR.replace('editor1');
            _ckeditor.config.height = 500; // thiết lập chiều cao
            var _ckeditor = CKEDITOR.replace('editor2');
            _ckeditor.config.height = 200; // thiết lập chiều cao
        })
    </script>
@endsection
