@extends('frontend.layouts.main')
@section('content')
    <style>
        *{
            outline: none;
        }
        .header{
            margin-bottom: 140px;
        }
        body{
            display: flex;
            flex-direction: column;
        }
        .body{
            height: 100%;
            margin-bottom: 0;
        }
        .main-section{
            margin-bottom: 100px;
        }
        .extra-menu{
            display: flex !important;
        }
        .hero{
            width: 100%;
            height: 100%;
            font-family: sans-serif;

        }
        .form-box{
            width: 380px;
            height: 500px;
            position: relative;
            margin: 6% auto;
            background: rgb(255, 255, 255);
            padding: 5px;
            overflow: hidden;
        }
        .button-box{
            width: 220px;
            margin: 35px auto;
            position: relative;
            box-shadow: 0 0 20px 9px #f8f3f11f;
            border-radius: 30px;
            display: flex;
            background-color: rgba(105, 105, 121, 0.5);
        }
        .toggle-btn{
            padding: 10px 10px;
            cursor: pointer;
            background: transparent ;
            border: 0;
            outline: none;
            position: relative;
            flex-grow: 1;
            color: rgb(255, 255, 255);
        }
        .toggle-btn:focus{
            outline: none;
        }
        #btn{
            top: 0;
            left: 0;
            position: absolute;
            width: 110px;
            height: 100%;
            background:rgb(241, 50, 155);
            border-radius: 30px;
            transition: 0.5s;
            outline: none;
        }
        .social-icon{
            margin: 30px auto;
            text-align: center;
        }
        .social-icon img{
            width: 30px;
            margin: 0 12px;
            box-shadow: 0 0 20px 0 #7f7f7f3d;
            cursor: pointer;
            border-radius: 50%;
        }
        .input-group{
            top: 180px;
            position: absolute;
            width: 280px;
            transition: .5s;
        }
        .input-field{
            width: 100%;
            padding: 10px 0;
            margin: 5px 0;
            border-left: 0;
            border-top: 0;
            border-right: 0;
            border-bottom: 1px solid #999;
            outline: none;
            background: transparent;
            color: rgb(64, 139, 139);
        }
        .submit-btn{
            width: 85%;
            padding: 10px 30px;
            cursor: pointer;
            display: block;
            margin: auto;
            background:rgb(252, 0, 155);;
            border: 0;
            outline: 0;
            border-radius: 30px;
            color: rgb(253, 249, 249);
            transition: 0.3s;
            outline: none;
        }
        .submit-btn:hover{
            background-color:rgba(197, 12, 135);
        }

        .checkbox{
            margin: 30px 10px 30px 0;
        }
        span.rmb{
            color: #777;
            font-size: 12px;
            margin: 28px 10px 30px 0;
            /* position: absolute; */
        }
        #login{
            position: absolute;
            left: 50px;
        }
        #register{
            position: absolute;
            left: 450px;
        }
        .error-msg {
            font-size: 14px;
            color: red;
            margin-left: -148px;
        }
    </style>
    <div class="body main-section container-fluid">
        <div class="row">

            <div class="hero">
                <div class="form-box">
                    <!-- hộp nút chuyển form trên cùng -->
                    <div class="button-box">
                        <!-- nút sáng -->
                        <div id="btn"></div>

                        <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                        <button type="button" class="toggle-btn"  onclick="register()">Register</button>
                    </div>
                    <!-- form đăng nhập -->
                    <form role="form" id="login" action="{{ route('guest.postLogin') }}" class="input-group" method="post">
                        @csrf
                        <input type="email" class="input-field" name="email" placeholder="User Name" required>
                        <input type="password" class="input-field" name="password" placeholder="Enter Password" required>

                        <input type="checkbox" name="remember" id="remember" class="checkbox"><span class="rmb">Remember Password</span>
                        @if(session('msg'))
                            <span role="alert" class="error-msg">{{ session('msg') }}</span>
                        @endif

                        <button type="submit" class="submit-btn">Login</button>

                    </form>
                    <!-- form đăng ký -->
                    <form id="register" action="" class="input-group">
                        <input type="text" class="input-field" placeholder="User Name" required>
                        <input type="email" class="input-field" placeholder="Email" required>
                        <input type="password" class="input-field" placeholder="Enter Password" required>
                        <input type="checkbox" name="" class="checkbox"><span class="rmb">I agree to ther term & conditions</span>
                        <button type="submit" class="submit-btn">Register</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="../frontend/js/float_form.js"></script>
@endsection
