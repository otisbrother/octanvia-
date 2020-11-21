@extends('owner.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Thêm Phòng Trọ <a href="{{route('owner.room.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <form  id="form_create_room" role="form" action="{{route('owner.room.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-body">
                            {{--                            loại phòng--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Loại Phòng</label>
                                <select class="form-control w-50" name="typeRoom"  id="typeRoom" required>
                                    <option value="">-- Chọn Loại Phòng  --</option>
                                    @foreach($typeRoom as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                                <span class="form-message" style="color: red"></span>
                            </div>
                            {{--                            tiêu đề--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Tiêu Đề</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tên tiêu đề" required>
                                <span class="form-message" style="color: red"></span>
                            </div>
                            {{--                            tỉnh/thành phố--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tỉnh/Thành Phố</label>
                                <select class="form-control w-50" name="city" id="city" required>
                                    <option value="">-- Chọn Tỉnh/Thành Phố  --</option>
                                    @foreach($city as $t_city)
                                        <option value="{{$t_city->id}}">{{$t_city->name}}</option>
                                    @endforeach
                                </select>
                                <span class="form-message" style="color: red"></span>
                            </div>
                            {{--                            quận huyện--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quận/Huyện</label>
                                <select class="form-control w-50" name="district" id="district" required>
                                    <option value="">-- Chọn Quận Huyện  --</option>
                                    @foreach($district as $t_district)
                                        <option value="{{$t_district->id}}">{{$t_district->name}}</option>
                                    @endforeach
                                </select>
                                <span class="form-message" style="color: red"></span>
                            </div>
                            {{--                            địa chỉ--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ chính xác (số nhà ...) </label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ" required>
                                <span class="form-message" style="color: red"></span>
                            </div>
                            {{--                            số lượng phòng--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số Lượng Phòng</label>
                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Nhập số lượng phòng" required>
                                <span class="form-message" style="color: #ff0000"></span>
                            </div>
                            {{--                            giá phòng--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá Phòng (vnđ)</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Nhập giá phòng" required>
                                <span class="form-message" style="color: red"></span>
                            </div>
                            {{--                            đơn vị--}}
                            <div class="form-group">
                                <label for="exampleInputFile">Đơn vị</label>
                                <input type="text" class="form-control" id="priceUnit" name="priceUnit" placeholder="Price Unit" required>
                                <span class="form-message" style="color: red"></span>
                            </div>
                            {{--                            ảnh--}}
                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh Phòng Trọ</label>
                                <input type="file" class="" id="image" name="image" required>
                            </div>
                            {{--                            mô tả--}}
                            <div class="form-group">
                                <label for="exampleInputFile">Mô tả</label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Mô tả" required>
                                <span class="form-message" style="color: red"></span>
                            </div>
                            {{--                            diện tích--}}
                            <div class="form-group">
                                <label for="exampleInputFile">Diện Tích (m2)</label>
                                <input type="text" class="form-control" id="area" name="area" placeholder="Nhập diện tích" required>
                                <span class="form-message" style="color: red"></span>
                            </div>
                            {{--                            ghi chú--}}
                            <div class="form-group">
                                <label for="exampleInputFile">Ghi Chú</label>
                                <input type="text" class="form-control" id="note" name="note" placeholder="Ghi chú" required>
                            </div>
                            {{--                            chung chủ--}}
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" value="1" name="with_owner"> Chung Chủ
                                </label>
                            </div>
                            {{--                            giá điện--}}
                            <div class="form-group">
                                <label for="exampleInputFile">Giá Điện</label>
                                <input type="text" class="form-control" id="electricPrice" name="electricPrice" placeholder="Nhập giá điện / 1 kWh" required>
                                <span class="form-message" style="color: red"></span>
                            </div>
                            {{--                            giá nước--}}
                            <div class="form-group">
                                <label for="exampleInputFile">Giá Nước</label>
                                <input type="text" class="form-control" id="waterPrice" name="waterPrice" placeholder="Giá nước / m3" required>
                                <span class="form-message" style="color: red"></span>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" >Tạo</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tienich-box">
                        <span class="title-box">Tiện Ích</span>
                        <div class="form-group form-outBox fixfloat">
                            @foreach($facility as $facilities)
                                <label class="label-checkBox">
                                    <input type="checkbox" value="{{$facilities->id}}" name="facilities[]"><span>{{$facilities->title}}</span>
                                </label>
                            @endforeach
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
                                <label for="exampleInputFile">Ảnh Phòng Trọ</label>
                                <input type="file" class="" id="image" name="detailImage[]" multiple>
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
    <script src="/backend/js/validate.js"></script>
    <script>
        Validator({
            form:'#form_create_room',
            rules: [
                Validator.isRequired('#title'),
                Validator.isRequiredAddress('#address'),
                Validator.isRequiredQuantity('#quantity'),
                Validator.isRequiredPrice('#price'),
                Validator.isRequiredArea('#area'),
                Validator.isRequiredNote('#note'),
                Validator.isRequiredelEctricPrice('#electricPrice'),
                Validator.isRequiredelWaterPrice('#waterPrice'),
                Validator.isRequiredelPriceUnit('#priceUnit'),
            ]
        });

        validatorSelect({
            form:'#form_create_room',
            rules: [
                validatorSelect.requiredTypeRoom('#typeRoom'),
                validatorSelect.requiredCity('#city'),
                validatorSelect.requiredDistrict('#district'),
            ]
        });
    </script>
@endsection
