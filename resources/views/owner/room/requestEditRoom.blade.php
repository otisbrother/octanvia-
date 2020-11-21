@extends('owner.layouts.main')
@section('content')
    <style>
        .div-center{
            width:50%;
            margin:0 auto;
        }
    </style>
    <section class="content-header" style="text-align: center;width: 100%;">
        <h1>
            Yêu Cầu Chỉnh Sửa <a href="{{route('owner.room.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <form role="form" action="{{ route('owner.room.sendRequestEditRoom') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="div-center" >
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Id phòng</label>
                                <input value="{{$room_id}}" type="text" class="form-control" id="room_id" name="room_id" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên phòng</label>
                                <input value="{{$room_title}}" type="text" class="form-control" id="room_title" name="room_title" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Lý do</label>
                                <textarea  class="form-control" id="reason" name="reason"> </textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Gửi yêu cầu</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
