@extends('backend.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Thêm Quận/Huyện <a href="{{route('admin.district.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách Quận/Huyện</a>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <form role="form" action="{{route('admin.district.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tỉnh/Thành Phố</label>
                                    <select class="form-control w-50" name="city">
                                        <option value="0">-- Chọn Tỉnh/Thành Phố  --</option>
                                        @foreach($city as $t_city)
                                            <option value="{{$t_city->id}}">{{$t_city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Quận/Huyện</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên quận huyện">
                                </div>


                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" name="is_active"> Trạng thái hiển thị
                                    </label>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Tạo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
