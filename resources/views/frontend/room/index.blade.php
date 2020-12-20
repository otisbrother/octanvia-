@extends('frontend.layouts.main')
@section('content')
    <style>
        .top-bar .extra-menu {
            display: flex;
        }

        .body {
            transform: translateY(130px);
            margin-bottom: 150px;
        }

        .body .filter {
            background-color: white;
            margin: 0 auto;
            padding: 5%;
            border-radius: 15px;
            align-self: flex-start;
        }

        .filter>h2 {
            margin-bottom: 20px;
        }

        .filter form>div {
            margin-bottom: 15px;
        }
        .filter form input[type="range"]{
            -webkit-appearance: none;
            width: 100%;
            height: 15px;
            border-radius: 5px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }
        .filter form button{
            width: 90%;
            background-color: rgb(255, 130, 151);
            border-radius: 15px;
            border: none;
            padding: 10px 5%;
            font-weight: 500;
            margin: auto;
        }
        .showBtn{
            margin-right: 10px;
            display: flex;
            justify-content: flex-end;
            padding: 10px;
            transition: 0.2s;
        }
        .op {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .item{
            display: none;
        }
        #city{
            margin-top: 5px;
            border: 1px solid gray;
        }
        @media only screen and (max-width: 1024px){
            .main-section{
                width: 95%;
                margin: auto;
                margin-bottom: 200px;
            }
        }
        @media only screen and (max-width: 768px) {
            .body .filter {
                padding: 30px 2%;
                margin-bottom: 30px;
            }
            .body .filter form{
                display: flex;
                justify-content: space-between;
            }
        }
    </style>
    <div class="body main-section container-fluid">
        <div class="row">
            <div class="col-12 col-md-3 filter">
                <h2>Bộ lọc</h2>
                <form action="" method="post" class="row">
                    <div class="col-12">
                        <h5 class="op">Giá thấp hơn</h5>
                        <span><span id="pr-value">8</span> triệu</span>
                        <br>
                        <input type="range" name="price" id="price" type="range" min="0.5" max="15" step="0.5" value="8">
                    </div>
                    <div class="room-type col-12">
                        <h5 class="op">Loại phòng <span class="showBtn"><i class="fa fa-caret-down" aria-hidden="true"></i></span></h5>

                        <div class="item">
                            <input type="checkbox" id="room-type-1" value="">
                            <label for="room-type-1">Chung cư mini</label>
                        </div>
                        <div class="item">
                            <input type="checkbox" id="room-type-2" value="">
                            <label for="room-type-2">Nhà nguyên căn</label>
                        </div>
                        <div class="item">
                            <input type="checkbox" id="room-type-3" value="">
                            <label for="room-type-3">Tất cả</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <h5 class="op">Thành phố </h5>


                        <select name="city" id="city">
                            <option value="Hanoi">Hà Nội</option>
                            <option value="HCM">TP. Hồ Chí Minh</option>
                            <option value="Danang">Đà Nẵng</option>
                        </select>
                    </div>

                    <div id="district" class="col-12">
                        <h5 class="op">Quận <span class="showBtn"><i class="fa fa-caret-down" aria-hidden="true"></i></span></h5>
                        <div class="item">
                            <input id="distr-1" value="Caugiay" type="checkbox">
                            <label for="distr-1">Cầu Giấy</label>
                        </div>
                        <div class="item">
                            <input id="distr-2" value="Caugiay" type="checkbox">
                            <label for="distr-2">Nam Từ Liêm</label>
                        </div>
                        <div class="item">
                            <input id="distr-3" value="Caugiay" type="checkbox">
                            <label for="distr-3">Bắc Từ Liêm</label>
                        </div>
                        <div class="item">
                            <input id="distr-4" value="Caugiay" type="checkbox">
                            <label for="distr-4">Đống Đa</label>
                        </div>
                        <div class="item">
                            <input id="distr-5" value="Caugiay" type="checkbox">
                            <label for="distr-5">Hoàn Kiếm</label>
                        </div>
                        <div class="item">
                            <input id="distr-6" value="Caugiay" type="checkbox">
                            <label for="distr-6">Ba Đình</label>
                        </div>
                    </div>

                    <div class="facilities col-12">
                        <h5 class="op">Cơ sở vật chất <span class="showBtn"><i class="fa fa-caret-down" aria-hidden="true"></i></span></h5>
                        <div class="item">
                            <input type="checkbox" id="fac-1" value="">
                            <label for="fac-1">WC riêng</label>
                        </div>
                        <div class="item">
                            <input type="checkbox" id="fac-2" value="">
                            <label for="fac-2">Chỗ để xe</label>
                        </div>
                        <div class="item">
                            <input type="checkbox" id="fac-3" value="">
                            <label for="fac-3">Cửa sổ</label>
                        </div>
                        <div class="item">
                            <input type="checkbox" id="fac-4" value="">
                            <label for="fac-4">Tự do giờ giấc</label>
                        </div>
                        <div class="item">
                            <input type="checkbox" id="fac-5" value="">
                            <label for="fac-5">Chủ ở riêng</label>
                        </div>
                        <div class="item">
                            <input type="checkbox" id="fac-6" value="">
                            <label for="fac-6">Nhà bếp</label>
                        </div>
                        <div class="item">
                            <input type="checkbox" id="fac-7" value="">
                            <label for="fac-7">Điều hoà</label>
                        </div>
                        <div class="item">
                            <input type="checkbox" id="fac-8" value="">
                            <label for="fac-8">Máy nước nóng</label>
                        </div>
                        <div class="item">
                            <input type="checkbox" id="fac-9" value="">
                            <label for="fac-9">Máy giặt</label>
                        </div>
                        <div class="item">
                            <input type="checkbox" id="fac-10" value="">
                            <label for="fac-10">Tủ lạnh</label>
                        </div>
                        <div class="item">
                            <input type="checkbox" id="fac-11" value="">
                            <label for="fac-11">Gác lửng</label>
                        </div>
                        <div class="item">
                            <input type="checkbox" id="fac-12" value="">
                            <label for="fac-12">Tủ đồ</label>
                        </div>
                        <div class="item">
                            <input type="checkbox" id="fac-13" value="">
                            <label for="fac-13">Thú cưng</label>
                        </div>
                    </div>
                    <button>Lọc</button>
                </form>
            </div>
            <div class="col-12 col-md-8 newest-rooms room-list">
                <div class="top">
                    <h2>Phòng mới nhất</h2>
                </div>
                <div class="rooms">
                    @foreach($data as $room)
                        <a href="{{ route('guest.showroom', ['room_id' => $room->id]) }}" id="room-{{ $room->id }}">
                            <div class="room row">
                                <div class="room-img col-md-5 col-sm-6 col-12">
                                    <img src="{{ asset($room->image) }}" alt="Ảnh của phòng {{ $room->title }}" style="max-height: 247.09px!important">
                                </div>
                                <div class="room-info col">
                                    <p class="room-name">
                                        {{ $room->title }}
                                    </p>
                                    <div class="room-detail">
                                        <div class="line-1 line">
                                            <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                                            @if($room->rented == 0)
                                                <span>Còn phòng</span>
                                            @else
                                                <span>Hết phòng</span>
                                            @endif
                                        </div>
                                        <div class="line line-2">
                                            <span class="icon"><i class="fas fa-user-friends"></i></span>
                                            <span>Nam & Nữ</span>
                                        </div>
                                        <div class="line line-3">
                                            <span class="icon"><i class="fas fa-ruler    "></i></span>
                                            <span>{{ $room->area }} m<sup style="font-size: 10px;">2</sup></span>
                                        </div>
                                        <div class="line line-4">
                                            <span class="icon"><i class="fas fa-map-marked    "></i></span>
                                            <span>{{ $room->address }}</span>
                                        </div>
                                        <div class="line line-5">
                                            <span class="icon"><i class="fas fa-money-check    "></i></span>
                                            <span class="price">6 triệu/tháng</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <hr>
                    @endforeach

                    <a href="#" class="view-all btn btn-success" style="margin: 0 auto; width: 110px;">Xem tất cả</a>
                </div>
            </div>
        </div>
    </div>

    <script src="../frontend/js/price_range.js"></script>
    <script src="../frontend/js/show_filter.js"></script>
@endsection
