@extends('backend.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Chỉnh sửa Thông Tin Tỉnh/Thành <a href="{{route('admin.city.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách Tỉnh/Thành</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="box box-primary">
                    <form role="form" action="{{route('admin.city.update', ['id' => $city->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Tỉnh/Thành</label>
                                <input value="{{$city->name}}" type="text" class="form-control" id="name" name="name" placeholder="Nhập tên loại phòng trọ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Được Tạo Bởi</label>
                                <input value="{{ \App\User::findOrFail($city->create_by)->name }}" type="text" class="form-control" id="create_by" name="create_by" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cập Nhật Bởi</label>
                                <input value="{{ ($city->update_by!=null) ? \App\User::findOrFail($city->update_by)->name : 'Chưa ai cập nhật' }}" type="text" class="form-control" id="update_by" name="update_by" disabled>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" name="is_active" {{ ($city->is_active == 1) ? 'checked' : '' }}> Trạng thái hiển thị
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ngày Tạo Bài</label>
                                <input value="{{$city->created_at}}" type="text" class="form-control" id="created_at" name="created_at" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ngày Cập Nhật</label>
                                <input value="{{$city->updated_at}}" type="text" class="form-control" id="updated  _at" name="updated_at" disabled>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
