@extends('backend.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Thông tin bình luận <a href="{{ route('admin.comment.getAllUnApprovedComments') }}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh sách bình luận chờ duyệt</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <div class="box box-primary">
                    <!-- form start -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td><b>Người bình luận :</b></td>
                                <td>{{ \App\User::findOrFail($data->user_id)->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Tên bài đăng</b></td>
                                <td>{{ \App\Room::findOrFail($data->room_id)->title }}</td>
                            </tr>
                            <tr>
                                <td><b>Nội dung bình luận</b></td>
                                <td>{{ $data->comment }}</td>
                            </tr>
                            <tr>
                                <td><b>Ngày đăng</b></td>
                                <td>{{ $data->created_at }}</td>
                            </tr>
                            <tr>
                                <td><b>Trạng thái</b></td>
                                <td>{{ ($data->is_approved == 1) ? 'Đã được duyệt' : 'Chưa được duyệt'  }}</td>
                            </tr>

                            </tbody></table>
                    </div>
                    @if($data->is_approved == 0)
                        <form role="form" action="{{route('admin.comment.update', ['id' => $data->id ] )}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Duyệt</button>
                            </div>
                        </form>
                    @endif
                </div>

                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection
