@extends('backend.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            {{ $title }}
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="box-tools">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                       placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>Người tạo</th>
                                <th>Tên phòng</th>
                                <th>Nội dung bình luận</th>
                                <th>Ngày đăng bình luận</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </tbody>
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                    <td>{{ \App\User::findOrFail($item->user_id)->name }}</td>
                                    <td>{{ \App\Room::findOrFail($item->room_id)->title  }}</td>
                                    <td>{{ $item->comment }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ ($item->is_approved == 1) ? 'Đã duyệt' : 'Chưa được duyệt' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.comment.show', ['id' => $item->id]) }}" class="btn btn-info">Chi tiết</a>
                                        <!-- Thêm sự kiện onlick cho nút xóa -->
                                        <a href="javascript:void(0)" class="btn btn-danger" onclick="destroyComment({{ $item->id }})" >Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
