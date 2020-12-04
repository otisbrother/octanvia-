@extends('owner.layouts.main')
@section('content')

    <section class="content-header">
        <h1>
            Tất cả thông báo <a href="{{route('owner.room.index')}}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Danh sách phòng trọ</a>
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
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Trạng thái</th>
                                <th>Ngày nhận</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </tbody>
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}" @if($item->be_seen == 1) style="background-color: #c2d6d6 " @endif > <!-- Thêm Class Cho Dòng -->
                                    <td>{{ $item->title }}</td>
                                    <td>{{ substr($item->content,0, 10) . '...' }}</td>
                                    <td id="be_seen-{{ $item->id }}">{{ ($item->be_seen == 1) ? 'Đã xem' : 'Chưa xem'  }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td class="text-center" id="action-{{ $item->id }}">
                                        <a href="{{route('owner.showNoti', ['id'=> $item->id ])}}" class="btn btn-default">Xem chi tiết</a>
                                        <!-- Thêm sự kiện onlick cho nút xóa -->
                                        @if($item->be_seen == 0)
                                            <a href="javascript:void(0)" class="btn btn-danger" id="markAsRead-btn-{{ $item->id }}" onclick="markAsRead({{ $item->id }}, 'index')" >Đánh dấu là đã xem</a>
                                        @else
                                            <a href="javascript:void(0)" class="btn btn-primary" id="markAsUnRead-btn-{{ $item->id }}" onclick="markAsUnRead({{ $item->id }}, 'index')" >Đánh dấu là chưa xem</a>
                                        @endif
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
