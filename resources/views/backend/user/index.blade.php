@extends('backend.layouts.main')
@section('content')

<section class="content-header">
    <h1>
        Danh Sách Người Dùng <a href="{{route('admin.user.create')}}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Thêm tài khoản</a>
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
                            <th>Họ & Tên</th>
                            <th>Email</th>
                            <th>Hình ảnh</th>
                            <th>Phân Quyền</th>
                            <th>Trạng thái</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                        </tbody>
                        @foreach($data as $key => $item)
                            <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                @if ($item->image) <!-- Kiểm tra hình ảnh tồn tại -->
                                    <img src="{{asset($item->image)}}" width="70">
                                    @endif
                                </td>
                                <td>
                                    <?php
                                        if($item->role_id == 1) {
                                            echo "Admin";
                                        }
                                        else if ($item->role_id == 2) {
                                            echo "Owner";
                                        }
                                        else {
                                            echo "Customer";
                                        }
                                    ?>
                                </td>
                                <td>{{ ($item->is_active == 1) ? 'Kích hoạt' : 'Chưa kích hoạt' }}</td>
                                <td class="text-center">
                                    <a href="{{route('admin.user.show', ['id'=> $item->id ])}}" class="btn btn-default">Xem</a>
                                    <a href="{{route('admin.user.edit', ['id'=> $item->id])}}" class="btn btn-info">Sửa</a>
                                    <!-- Thêm sự kiện onlick cho nút xóa -->
                                    <a href="javascript:void(0)" class="btn btn-danger" onclick="destroyUser({{ $item->id }})" >Xóa</a>
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
