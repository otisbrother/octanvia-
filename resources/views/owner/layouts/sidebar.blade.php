<?php
$user = \Illuminate\Support\Facades\Auth::user();
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if($user->image)
                    <img src="{{ asset($user->image) }}" class="user-image" alt="User Image">
                @else
                    <img src="https://scontent.fhan2-1.fna.fbcdn.net/v/t1.0-9/124822743_3465040393578871_218029598804167643_o.jpg?_nc_cat=101&ccb=2&_nc_sid=8bfeb9&_nc_ohc=q2oBoFlqtMUAX8q9P5Z&_nc_ht=scontent.fhan2-1.fna&oh=5d0290b78f33c2aa0a9eef90385361f9&oe=5FD01902" class="user-image" alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
                <p>{{ $user->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
{{--        <ul class="sidebar-menu" data-widget="tree">--}}
{{--            <li class="treeview">--}}
{{--                <a href="">--}}
{{--                    <i class="fa fa-dashboard"></i> <span>QL Phòng Trọ</span>--}}
{{--                    <span class="pull-right-container">--}}
{{--                         <i class="fa fa-angle-left pull-right"></i>--}}
{{--                    </span>--}}
{{--                </a>--}}
{{--                <ul class="treeview-menu">--}}
{{--                    <li><a href="{{route('owner.room.index')}}"><i class="fa fa-circle-o"></i>Danh Sách Bài Đăng</a></li>--}}
{{--                    <li><a href=""><i class="fa fa-circle-o"></i>Yêu cầu quyền sửa</a></li>--}}
{{--                </ul>--}}

{{--            </li>--}}
{{--        </ul>--}}
        <ul class="sidebar-menu" data-widget="tree">
            <li class="">
                <a href="{{route('owner.room.index')}}">
                    <i class="fa fa-dashboard"></i> <span>QL Phòng Trọ</span>
                </a>
            </li>
        </ul>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="">
                <a href="{{route('owner.showAllNoti')}}">
                    <i class="fa fa-dashboard"></i> <span>Tất cả thông báo</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
