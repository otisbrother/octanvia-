@extends('backend.layouts.main')
@section('content')
        <section class="content-header">
            <h1>
                Thêm bài viết <a href="{{route('admin.post.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách Bài viết</a>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="box box-primary">
                        <form role="form" action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề bài viết</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Ảnh bìa bài viết</label>
                                    <input type="file" class="" id="thumbnail" name="thumbnail">
                                </div>
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea id="editor1" name="content" class="form-control" rows="10" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Vị trí</label>
                                    <input type="number" class="form-control w-50" id="position" name="position" value="0">
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="is_active"> <b>Trạng thái</b>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="is_hot"> <b>Bài viết nổi bật</b>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tóm tắt</label>
                                    <textarea id="editor2" name="summary" class="form-control" rows="10" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Meta Title</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" >
                                </div>
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="3" ></textarea>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Tạo</button>
                                <input type="reset" class="btn btn-default pull-right" value="Reset">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
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
