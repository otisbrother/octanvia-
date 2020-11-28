@extends('owner.layouts.main')
<?php
    $role_id = \Illuminate\Support\Facades\Auth::user()->role_id;
?>

@section('content')
    <style>
        .allDetailImages {
            display: flex;
            flex-wrap: wrap;
        }
        .detail-Image {
            max-width: 180px;
            position: relative;
            margin-right: 10px;
            margin-top: 5px;
        }
        .detail-Image .icon-delete {
            position: absolute;
            right: 6px;
            top: 7px;
        }
        .detail-Image .icon-delete i {
            color: #d6140d;
        }
        .detail-Image img {
            max-width: 180px;
            max-height: 240px;
            border-radius: 10px;
        }
    </style>
    <section class="content-header">
        <h1>
            Chỉnh sửa Thông Tin Nhà Trọ <a href="{{ route('owner.room.index') }}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <form role="form" action="{{route('owner.room.update', ['id' => $room->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Loại Phòng</label>
                                <select class="form-control w-50" name="typeRoom" required>
                                    <option value="{{$pickedTypeRoom->id}}">{{$pickedTypeRoom->name}}</option>
                                    @foreach($typeRoom as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Tiêu Đề</label>
                                <input value="{{ $room->title }}" type="text" class="form-control" id="title" name="title" placeholder="Nhập tên tiêu đề" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                <input value="{{ $room->address }}" type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tỉnh/Thành Phố</label>
                                <select class="form-control w-50" name="city" id="city" required>
                                    <option value="{{ $pickedCity->id }}">{{ $pickedCity->name }}</option>
                                    @foreach($city as $t_city)
                                        <option value="{{$t_city->id}}">{{$t_city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quận/Huyện</label>
                                <select class="form-control w-50" name="district" id="district" required>
                                    <option value="{{$pickedDistrict->id}}">{{$pickedDistrict->name}}</option>
                                    @foreach($district as $t_district)
                                        <option value="{{$t_district->id}}">{{$t_district->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Số Lượng Phòng</label>
                                <input  value="{{ $room->quantity }}" type="text" class="form-control" id="quantity" name="quantity" placeholder="Nhập số lượng" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá Phòng (VNĐ)</label>
                                <input value="{{ $room->price }}" type="text" class="form-control" id="price" name="price" placeholder="Nhập giá phòng" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Đơn vị</label>
                                <input value="{{$room->price_unit}}" type="text" class="form-control" id="priceUnit" name="priceUnit" placeholder="giá nước/1 khối" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh tiêu đề phòng trọ hiện tại</label>
                                <img src="{{ asset($room->image) }}" width="250">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh tiêu đề phòng trọ mới</label>
                                <input value="" type="file" class="" id="image" name="new_image">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Diện Tích Phòng</label>
                                <input value="{{ $room->area }}" type="text" class="form-control" id="area" name="area" placeholder="Nhập diện tích" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ghi Chú</label>
                                <input value="{{ $room->note }}" type="text" class="form-control" id="note" name="note" placeholder="Ghi chú">
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" value="1" name="with_owner" {{ ($room->live_with_owner==1) ? 'checked' : '' }}> Chung Chủ
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ngày Phê Duyệt</label>
                                <input value="{{ $room->approval_date }}" type="text" class="form-control" id="approvalDate" name="approvalDate" placeholder="Chưa được phê duyệt" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ngày Hết Hạn</label>
                                <input value="{{ $room->expired_date }}" type="text" class="form-control" id="expiredDate" name="expiredDate" placeholder="Ngày hết hạn" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Giá Điện (VNĐ) / kWh</label>
                                <input value="{{ $room->electric_price }}" type="text" class="form-control" id="electricPrice" name="electricPrice" placeholder="Ngày hết hạn" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Giá Nước (VNĐ) / m3</label>
                                <input value="{{ $room->water_price }}" type="text" class="form-control" id="waterPrice" name="waterPrice" placeholder="Ngày hết hạn" required>
                            </div>


                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" name="is_active" {{ ($room->is_active == 1) ? 'checked' : ''  }}> Trạng thái hiển thị
                                </label>
                            </div>

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tienich-box">
                        <span class="title-box">Tiện Ích</span>
                        <div class="form-group form-outBox fixfloat">
                            @foreach($facility as $facilities)
                                <label class="label-checkBox">
                                    <input type="checkbox" value="{{$facilities->id}}" name="facilities[]" {{ (in_array($facilities->id, $exists_facilities)) ? 'checked' : ''    }}  ><span>{{$facilities->title}}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title setmore">Chi tiết ảnh sản phẩm</h3>
                        </div>

                        <div class="allDetailImages">
                            {{--                            <div class="detail-Image" id="">--}}

                            {{--                                <img src="https://scontent.fhan2-6.fna.fbcdn.net/v/t1.0-9/119412172_1025951881190605_2069520140826674487_o.jpg?_nc_cat=103&ccb=2&_nc_sid=a4a2d7&_nc_ohc=0-QANzM3zh0AX8jYe4E&_nc_ht=scontent.fhan2-6.fna&oh=b9c11ce1d8f724ff71777148cf6034f5&oe=5FD56E8B" alt="detail-Image">--}}
                            {{--                                <span class="icon-delete" onclick=""><i class="fa fa-power-off"></i> </span>--}}
                            {{--                                <p>Ảnh chi tiết 1</p>--}}
                            {{--                                <div class="form-group">--}}
                            {{--                                    <label for="exampleInputFile">Ảnh chi tiết 1 mới</label>--}}
                            {{--                                    <input value="" type="file" class="" id="image" name="new_image1" style="max-width: 180px">--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            @foreach($room_detailImages as $item)
                                <div class="detail-Image" id="detailImage{{$item->id}}">
                                    <img width="180px" height="180px" src="{{ asset($item->image) }}" alt="detail-Image{{ $item->id }}">
                                    <span class="icon-delete" onclick="destroyRoomImage({{ $item->id }}, {{ \Illuminate\Support\Facades\Auth::user()->role_id }})"><i class="fa fa-power-off"></i> </span>
                                    {{--                                    <p>Ảnh chi tiết {{ $item->id }}</p>--}}
                                    <div class="form-group">
                                        <label for="exampleInputFile"> Thay đổi ảnh chi tiết {{ $item->id }}</label>
                                        <input value="" type="file" class="" id="image" name="new_image{{ $item->id }}" style="max-width: 180px">
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    {{--                        <div class="box-body">--}}
                    {{--                            @for($i=1; $i<=5; $i++)--}}
                    {{--                                <div class="form-group">--}}
                    {{--                                    <label for="exampleInputFile">Ảnh sản phẩm {{$i}}</label>--}}
                    {{--                                    <input type="file" class="" id="image" name="detailImage{{$i}}">--}}
                    {{--                                </div>--}}
                    {{--                            @endfor--}}
                    {{--                        </div>--}}
                    <!-- /.box-body -->
                        <div class="box-footer">
                            {{--                                <button type="submit" class="btn btn-primary">Tạo</button>--}}
                            <input type="reset" class="btn btn-default" value="Reset">
                        </div>

                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title setmore">Thêm Chi Tiết Ảnh Phòng Trọ</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh chi tiết phòng trọ</label>
                                <input type="file" class="" id="array_detailImage" name="new_detailImage[]" multiple>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <input type="reset" class="btn btn-default" value="Reset">
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('my_javascript')
    <script>
        $('#city').change(function () {
            id = $(this).val();
            $('#district').html('');
            getAllDistrict(id);
        })
    </script>
@endsection
