@extends('backend.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Chỉnh sửa Thông Tin Quận/Huyện <a href="{{route('admin.district.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách Quận/Huyện</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="box box-primary">
                    <form role="form" action="{{route('admin.district.update', ['id' => $district->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tỉnh/Thành Phố</label>
                                <select class="form-control w-50" name="city">
                                    <option value="{{ $chosenCity->id }}">{{ $chosenCity->name }}</option>
                                    @foreach($city as $t_city)
                                        <option value="{{$t_city->id}}">{{$t_city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Quận/Huyện</label>
                                <input value="{{$district->name}}" type="text" class="form-control" id="name" name="name" placeholder="Nhập tên quận huyện">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Được Tạo Bởi</label>
                                <input value="{{ \App\User::findOrFail($district->create_by)->name }}" type="text" class="form-control" id="create_by" name="create_by" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cập Nhật Bởi</label>
                                <input value="{{ ($district->update_by!=null) ? \App\User::findOrFail($district->update_by)->name : 'Chưa ai cập nhật' }}" type="text" class="form-control" id="update_by" name="update_by" disabled>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Ngày Tạo </label>
                                <input value="{{$district->created_at}}" type="text" class="form-control" id="created_at" name="created_at" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ngày Cập Nhật gần nhất</label>
                                <input value="{{$district->updated_at}}" type="text" class="form-control" id="updated  _at" name="updated_at" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile" style="color: #9c3328">** Thay đổi ảnh quận/huyện</label>
                                <input type="file" id="new_image" name="new_image">
                                <br>
                                <img src="{{ asset($district->image) }}" width="250">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" name="is_active" {{ ($district->is_active == 1) ? 'checked' : ''  }}> Hiển thị
                                </label>
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
