<?php

namespace App\Http\Controllers;

use App\District;
use App\ExtendPost;
use App\Notify;
use App\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.home');
    }

    public function  login() {
        if(!Auth::check()) {
            return view('backend.login');
        } else {

            $user = Auth::user();
            if($user->role_id == 1 ) {
                return redirect()->route('admin.dashboard');
            } else if($user->role_id == 2 ) {
                return redirect()->route('owner.room.index');
            }
            else if($user->role_id == 3) {
                return redirect('/');
           }
        }
    }

    public function postLogin(Request $request)
    {
        //validate du lieu
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6'
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];


        // check success
        if (Auth::attempt($data, $request->has('remember'))) {
            $user = Auth::user();
            if($user->is_active == 0) {
                Auth::logout();
                return redirect()->back()->with('msg', 'Tài khoản của bạn chưa được kích hoạt');
            } else {
                if($user->role_id == 1 ) {
                    return redirect()->route('admin.dashboard');
                } else if($user->role_id == 2 || $user->role_id == 3) {
                    Auth::logout();
                    return redirect()->back()->with('msg', 'Bạn không có quyền truy cập vào admin');
                }
            }
        }
        return redirect()->back()->with('msg', 'Email hoặc Password không chính xác');
    }

    public function logout()
    {
        $user = Auth::user();
//        dd($user);
        Auth::logout();
        // chuyển về trang đăng nhập
        if($user->role_id == 1) {
            return redirect()->route('admin.login');
        }
        else if ($user->role_id == 2 ) {
            return redirect()->route('owner.login');
        }
        else if ($user->role_id == 3) {
            return redirect('/'); // chua co view login client
        }
    }

    public function showAllExtendRoomRequest()
    {
        $data = ExtendPost::where(['approved_date' => null])->get();
        $title = 'Danh sách yêu cầu gia hạn';
        return view('backend.manageRequest.allExtendRequest', [
            'data' => $data,
            'title' => $title
        ]);
    }

    public function sendNoti($title,$msg, $receiver_id) // da chay dc
    {
        $noti = new Notify();
        $noti->receive_id = $receiver_id;
        $noti->title = $title;
        $noti->content = $msg;
        $noti->save();
    }

    public function writeReason($request_id)
    {
        $request = ExtendPost::findOrFail($request_id);
        $title = Room::findOrFail($request->room_id)->title;
        return view('backend.manageRequest.sendReason', [
            'receiver_id' => $request->user_id,
            'title' => $title,
            'request_id' => $request_id
        ]);
    }

    public function refuseExtendDate(Request $request, $request_id)
    {
        $r = ExtendPost::findOrFail($request_id);
        $room = Room::findOrFail($r->room_id);
        $noti_title = '';
        $noti_msg = '';
        $noti_msg = $request->input('content');
        $noti_title = 'Gia hạn bài đăng ' . $room->title . ' bị từ chối !';
        $noti_msg = $noti_msg . '. Chúng tôi rất tiếc khi không thể duyệt yêu cầu này.';
        $this->sendNoti($noti_title, $noti_msg, $r->user_id);
        $room->is_active = 0;
        $room->canbe_edit = 0;
        $room->save();

        ExtendPost::destroy($request_id);
        return redirect()->route('admin.showAllExtendRoomRequest');

    }


    public function showDetailRequest($r_id) // function xem chi tiet yeu cau gia han bai viet
    {
        $data = ExtendPost::findOrFail($r_id);
        return view('', [ // chua tao view
            'data' => $data
        ]);
    }


    public function extendDate($r_id) // duyet request gia han bai
    {
        $r = ExtendPost::findOrFail($r_id);
        $user = Auth::user();
        $noti_title = '';
        $noti_msg = '';
        $client = User::findOrFail($r->user_id);
        // xu ly lai room
        $date = date('Y-m-d');
        $quantity = $r->quantity;
        $unit_date = $r->unit_date;
        $extendInt = date('Y-m-d');
        if($unit_date == 1) {
            $extendInt = mktime(0, 0, 0, date('m'), date('d')+$quantity*7, date('Y') );
        } else if ($unit_date == 2) {
            $extendInt = mktime(0, 0, 0, date('m')+$quantity, date('d'), date('Y') );
        } else {
            $extendInt = mktime(0, 0, 0, date('m'), date('d'), date('Y')+$quantity );

        }
        $extend = date('Y-m-d', $extendInt);
        $room = Room::findOrFail($r->room_id);
        $room->expired_date = $extend;
        $room->approval_date = $date;
        $room->approval_id = $user->id;
        $room->is_active = 1;
        $room->save();
        $noti_title = 'Bài đăng ' . $room->title . ' đã được gia hạn thành công!';
        // xu ly xong roi thi save yeu cau gia han
        $noti_msg = 'Chào ' . $client->name . ' !. Bài đăng của bạn đã được gia hạn thành công với mức phí ' . $r->total_price . ' VNĐ. Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ của chúng tôi.';
        $r->approved_by = $user->id;
        $r->approved_date = $date;
        $r->save();
        // gui noti cho owner
        $this->sendNoti($noti_title, $noti_msg, $client->id);
        return response()->json([
            'status' => true
        ], 200);
    }

    public function getListDistrict($city_id)
    {
        $data = District::where(['city_id' => $city_id])->get(['id', 'name']);
        return json_encode($data);
    }

    public function approveOwnerAccount($owner_id)
    {
        $user = Auth::user();
        $account = User::findOrFail($owner_id);
        $account->is_active = 1;
        $account->approval_id = $user->id;
        $account->date_approval = now();
        $account->save();
        return response()->json([
            'status' => true
        ], 200);
    }

    public function test()
    {
        $date = date('Y-m-d');
        $quantity = 1;
        $unit_date = 3;
        $extendInt = date('Y-m-d');
        if($unit_date == 1) {
            $extendInt = mktime(0, 0, 0, date('m'), date('d')+$quantity*7, date('Y') );
        } else if ($unit_date == 2) {
            $extendInt = mktime(0, 0, 0, date('m')+$quantity, date('d'), date('Y') );
        } else {
            $extendInt = mktime(0, 0, 0, date('m'), date('d'), date('Y')+$quantity );

        }
        $extend = date('Y-m-d', $extendInt);
        dd($extend);
    }
}
