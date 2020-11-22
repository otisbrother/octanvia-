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
            Gia hạn thời gian hiển thị bài đăng <a href="{{route('owner.room.postextendDate', ['roomId' => $data->id])}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <form role="form" action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="div-center" >
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Id phòng</label>
                                <input value="{{ $data->id }}" type="text" class="form-control" id="room_id" name="room_id" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên phòng</label>
                                <input value="{{ $data->title }}" type="text" class="form-control" id="room_title" name="room_title" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Loại thời gian gia hạn ( ví dụ: tuần, tháng, năm )</label>
                                <select id="unit_date" class="form-control w-50" name="unit_date" required onchange="totalMoney()">
                                    <option value="">-- Chọn Loại Hình Gia Hạn</option>
                                    <option value="1">Tuần</option>
                                    <option value="2">Tháng</option>
                                    <option value="3">Năm</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng</label>
                                <input value="" onchange="totalMoney()"  type="text" class="form-control" id="quantity" name="quantity" placeholder="Nhập số lượng vui lòng nhập số nguyên" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tổng Tiền (VNĐ). Sẽ thanh toán offline với công ty.</label>
                                <input value=""  type="text" class="form-control" id="total_price" name="total_price" placeholder="Tổng tiền" readonly>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Gia Hạn</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script>
        function totalMoney() {
            var unit = document.getElementById('unit_date').value;
            var quantity = document.getElementById('quantity').value;
            var totalMoney =  0;
            if(unit == 1) {
                totalMoney = quantity*50000;
            } else if (unit == 2) {
                totalMoney = quantity*50000*4;
            } else if (unit == 3) {
                totalMoney = quantity*50000*52;
            }

            document.getElementById('total_price').value = totalMoney;
        }
    </script>
@endsection
