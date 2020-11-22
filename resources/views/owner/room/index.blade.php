@extends('owner.layouts.main')
@section('content')

    <section class="content-header">
        <h1>
            Danh Sách Phòng Trọ <a href="{{route('owner.room.create')}}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Thêm Phòng Trọ</a>
        </h1>
    </section>
    @if (session('msg'))
        <div class="pad margin no-print">
            <div class="alert alert-success alert-dismissible" style="" id="thongbao">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Thông báo !</h4>
                {{ session('msg') }}
            </div>
        </div>
    @endif
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
                                <th>Id Bài Viết</th>
                                <th>Tên Tiêu Đề</th>
                                <th>Loại Phòng</th>
                                <th>Địa Chỉ</th>
                                <th>Giá Phòng</th>
                                <th>Hình ảnh</th>
                                <th>Ngày Đăng Bài</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </tbody>
                            @foreach($list as $key => $item)
                                <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->roomType_id  }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        <img src="{{ $item->image }}" width="50" height="50">
                                    </td>
                                    <td>{{ $item->public_date }}</td>
                                    <td>{{ ($item->is_active==1) ? 'Hiển thị' : 'Không' }}</td>
                                    <td class="text-center">
                                        <a href="{{route('owner.room.show', ['id'=> $item->id ])}}" class="btn btn-default">Xem</a>
                                        <a href="{{route('owner.room.edit', ['id'=> $item->id ])}}" class="btn btn-info" disabled>Sửa</a>
                                        <!-- Thêm sự kiện onlick cho nút xóa -->
                                        <a href="javascript:void(0)" class="btn btn-danger" onclick="destroyRoom({{ $item->id }})" >Xóa</a>
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
