@extends('backend.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            {{ $title }}
        </h1>
    </section>
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
                                <th>Người yêu cầu</th>
                                <th>Tên phòng</th>
                                <th>Thời gian muốn gia hạn</th>
                                <th>Tổng tiền</th>
                                <th>Số điện thoại</th>
                                <th>Ngày tạo yêu cầu</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </tbody>
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                    <td>{{ \App\User::findOrFail($item->user_id)->name }}</td>
                                    <td>{{ \App\Room::findOrFail($item->room_id)->title  }}</td>
                                    <td>{{ $item->quantity . ' ' }} <?php if($item->unit_date == 1){ echo 'tuần'; } else if($item->unit_date == 2) { echo 'tháng'; } else { echo 'năm'; }  ?></td>
                                    <td>{{ number_format($item->total_price,0,",",".") . ' VNĐ' }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" class="btn btn-info" onclick="removeExtendRequest({{ $item->id }})">Duyệt</a>
                                        <!-- Thêm sự kiện onlick cho nút xóa -->
                                        <a href="{{ route('admin.deleteRequest.writeReason', [ 'request_id' => $item->id ]) }}" class="btn btn-danger" onclick="" >Xóa</a>
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
