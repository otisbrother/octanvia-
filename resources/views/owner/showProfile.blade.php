@extends('owner.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Thông tin cá nhân
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
            <!-- left column -->
            <div class="col-md-6">
                <div class="box box-primary">
                    <!-- form start -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td><b>Tên :</b></td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Ngày sinh :</b></td>
                                <td>{{ $user->birthday }}</td>
                            </tr>
                            <tr>
                                <td><b>Căn cước công dân :</b></td>
                                <td>{{ $user->CMND }}</td>
                            </tr>
                            <tr>
                                <td><b>Người duyệt :</b></td>
                                @if($user->approval_id != null)
                                    <td>{{ \App\User::findOrFail($user->approval_id)->name }}</td>
                                @else
                                    <td></td>
                                @endif
                            </tr>
                            <tr>
                                <td><b>Ngày được duyệt :</b></td>
                                @if($user->date_approval != null)
                                    <td>{{ $user->date_approval }}</td>
                                @else
                                    <td></td>
                                @endif
                            </tr>
                            <tr>
                                <td><b>Email :</b></td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td><b>Địa chỉ :</b></td>
                                <td>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <td><b>Số điện thoại :</b></td>
                                <td>{{ ($user->phone != null) ? $user->phone : 'Chưa có' }}</td>
                            </tr>
                            <tr>
                                <td><b>Hình ảnh:</b></td>
                                <td><img src="{{ asset($user->avatar) }}" width="250"></td>
                            </tr>


                            </tbody></table>
                    </div>
                </div>

                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection
