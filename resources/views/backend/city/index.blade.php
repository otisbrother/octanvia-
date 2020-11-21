@extends('backend.layouts.main')
@section('content')

    <section class="content-header">
        <h1>
            Danh Sách Thành Phố <a href="{{route('admin.city.create')}}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Thêm Tỉnh/Thành Phố</a>
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
                                <th>Id</th>
                                <th>Tên Tỉnh/Thành Phố</th>
                                <th>Tạo Bởi</th>
                                <th>Cập Nhật Bởi</th>
                                <th>Trạng Thái</th>
                                <th>Ngày Tạo</th>
                                <th>Ngày Cập Nhật</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </tbody>
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name  }}</td>
                                    <td>{{ \App\User::findOrFail($item->create_by)->name }}</td>
                                    @if($item->update_by != null)
                                        <td>{{ \App\User::findOrFail($item->update_by)->name }}</td>
                                    @else
                                        <td>Chưa ai cập nhật</td>
                                    @endif
                                    <td>{{ ($item->is_active == 1) ? 'Hiển thị' : 'Không hiển thị' }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.city.edit', ['id'=> $item->id ])}}" class="btn btn-info">Sửa</a>
                                        <!-- Thêm sự kiện onlick cho nút xóa -->
                                        <a href="javascript:void(0)" class="btn btn-danger" onclick="destroyCity({{ $item->id }})" >Xóa</a>
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
