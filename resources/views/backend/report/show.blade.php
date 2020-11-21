@extends('backend.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Thông tin bình luận <a href="{{ route('admin.report.getAllUnApprovedReports') }}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh sách báo cáo chưa xem</a>
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
                                <td><b>Người báo cáo :</b></td>
                                <td>{{ \App\User::findOrFail($data->sender_id)->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Bài đăng bị báo cáo</b></td>
                                <td>{{ \App\Room::findOrFail($data->receive_id)->title }}</td>
                            </tr>
                            <tr>
                                <td><b>Nội dung báo cáo</b></td>
                                <td>{{ $data->content }}</td>
                            </tr>
                            <tr>
                                <td><b>Ngày đăng</b></td>
                                <td>{{ $data->created_at }}</td>
                            </tr>
                            <tr>
                                <td><b>Trạng thái</b></td>
                                @if($data->is_active == 1)
                                <td>Đã được duyệt bởi {{ \App\User::findOrFail($data->approved_by)->name }}</td>
                                @else
                                <td>Chưa được duyệt</td>
                                @endif
                            </tr>

                            </tbody></table>
                    </div>
                    @if($data->is_active == 0)
                        <form role="form" action="{{route('admin.report.update', ['id' => $data->id ] )}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Đánh dấu là đã xem</button>
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
