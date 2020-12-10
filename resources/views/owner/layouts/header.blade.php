<?php
    $user = \Illuminate\Support\Facades\Auth::user();
    $all_noti = \App\Notify::where(['receive_id' => $user->id])->get();
    $unread_noti_q = 0;
    foreach ($all_noti as $noti)
        {
            if($noti->be_seen == 0) {
                $unread_noti_q++ ;
            }
        }
?>

<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('owner.room.index') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">RH.co</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">RentHouse</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">{{ $unread_noti_q }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have {{ $unread_noti_q }} (unread) / {{ count($all_noti) }}  notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                @foreach($all_noti as $item)
                                    <li>
                                        <a href="{{ route('owner.showNoti', ['id' => $item->id]) }}">
                                            <i class="fa fa-users text-aqua"></i> {{ $item->content }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </li>
                        <li class="footer"><a href="{{ route('owner.showAllNoti') }}">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if($user->image)
                            <img src="{{ asset($user->image) }}" class="user-image" alt="User Image">
                        @else
                            <img src="https://scontent.fhan2-1.fna.fbcdn.net/v/t1.0-9/124822743_3465040393578871_218029598804167643_o.jpg?_nc_cat=101&ccb=2&_nc_sid=8bfeb9&_nc_ohc=q2oBoFlqtMUAX8q9P5Z&_nc_ht=scontent.fhan2-1.fna&oh=5d0290b78f33c2aa0a9eef90385361f9&oe=5FD01902" class="user-image" alt="User Image">
                        @endif
                        <span class="hidden-xs">{{ $user->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            @if($user->image)
                                <img src="{{ asset($user->image) }}" class="user-image" alt="User Image">
                            @else
                                <img src="https://scontent.fhan2-1.fna.fbcdn.net/v/t1.0-9/124822743_3465040393578871_218029598804167643_o.jpg?_nc_cat=101&ccb=2&_nc_sid=8bfeb9&_nc_ohc=q2oBoFlqtMUAX8q9P5Z&_nc_ht=scontent.fhan2-1.fna&oh=5d0290b78f33c2aa0a9eef90385361f9&oe=5FD01902" class="user-image" alt="User Image">
                            @endif

                            <p>
                                {{ $user->name }} - <?php if($user->role_id == 1) { echo "Admin"; } else if ($user->role_id == 2) { echo "Owner"; }   ?>
                                <small>Member since <?php $create = date('M d, Y', strtotime($user->created_at)); echo $create ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('owner.showProfile') }}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
