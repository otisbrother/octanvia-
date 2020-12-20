@extends('backend.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết bài viết <a href="{{route('admin.post.index')}}" class="btn btn-info pull-right"><i class="fa fa-list"></i> Danh sách bài viết</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-10">
                <!-- general form elements -->
                <div class="box box-primary">

                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td><b>Tiêu đề</b></td>
                                <td>{{ $data->title }}</td>
                            </tr>
                            <tr>
                                <td><b>Hình ảnh tiêu đề:</b></td>
                                <td><img src="{{ asset($data->thumbnail) }}" width="300px" style="max-height: 300px;"></td>
                            </tr>
                            <tr>
                                <td><b>Nội dung</b></td>
                                <td>{{ $data->content }}</td>
                            </tr>
                            <tr>
                                <td><b>Vị trí:</b></td>
                                <td>{{ $data->position }}</td>
                            </tr>
                            <tr>
                                <td><b>Trạng thái</b></td>
                                <td>@if($data->is_active ==0)Ẩn @else Hiển thị @endif</td>
                            </tr>
                            <tr>
                                <td><b>Bài viết nổi bật:</b></td>
                                <td>@if( $data->is_hot == 0) Không @else Có @endif</td>
                            </tr>
                            <tr>
                                <td><b>Lượng views:</b></td>
                                <td>{{ $data->views }}</td>
                            </tr>
                            <tr>
                                <td><b>Tóm tắt:</b></td>
                                <td>{{ $data->summary }}</td>
                            </tr>
                            <tr>
                                <td><b>Người tạo:</b></td>
                                <td><?php $username = \App\User::findorFail($data->user_id)->name; echo $username ?></td>
                            </tr>
                            <tr>
                                <td><b>Người sửa cuối cùng:</b></td>
                                <td><?php $username = \App\User::findorFail($data->user_id_edit)->name; echo $username ?></td>
                            </tr>
                            </tbody></table>
                    </div>
                </div>
                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection
