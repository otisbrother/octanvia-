<?php

namespace App\Http\Controllers;

use App\ExtendPost;
use App\City;
use App\District;
use App\Facilities;
use App\Notify;
use App\RequestEditRoom;
use App\Room_facilities;
use App\Room;
use App\Room_image;
use App\Room_type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
//     Controller nay chua test dc gi vi chua co frontend, du lieu, route



    public function getAllRoom()
    {
        $user = Auth::user();
        $list = Room::where(['user_id' => $user->id])->orderBy('created_at', 'ASC')->get();
        $getDate = date('Y-m-d');
        foreach ($list as $value) {
            if ($getDate > $value->expired_date) {
                $value->is_active = 0;
            }
        }
        return view('owner.room.index', [
            'list' => $list
        ]);
        // or return json ?
    }

    public function getAllUnApprovedRoom()
    {
        $user = Auth::user();
        $list = Room::where(['user_id' => $user->id, 'approved_id' => null])->orderBy('created_at', 'ASC')->get();
        return view('', [
            'list' => $list
        ]);
    }

    public function showRoomDetail($id)
    {
        $data = Room::findorFail($id);
        $roomTypeName = Room_type::where('id', $data->roomType_id)->first();
        $facilities = $data->facilities()->get();
        $room_detailImages =  Room_image::where(['room_id' => $data->id ])->orderBy('position', 'ASC')->get();
        $getDate = date('Y-m-d');
        $expiredDate = $data->expired_date;
        if ($getDate > $expiredDate) {
            $data->is_active = 0;
        }

        $show_Request = 0;
        $request_edit = RequestEditRoom::where(['room_id' => $id])->first();
        if($request_edit == null) {
            $show_Request = 1;
        }

        $canEdit = $data->canbe_edit;
        return view('owner.room.show', [
            'data' => $data,
            'roomTypeName' => $roomTypeName->name,
            'room_detailImages' => $room_detailImages,
            'facilities' => $facilities,
            'getDate' => $getDate,
            'show_Request' => $show_Request

        ]);
    }
    public function require_extendDate(Request $request, $room_id)
    {
        // mac dinh unit_date: 1 la tuan, 2 la thang, 3 la nam
        // mac dinh gia tien cho thue la 50k 1 tuan
        $p = 50000;
        $total_price = 0;
        $unit_date = $request->input('unit_date');
        $q = $request->input('quantity');
        $r = new ExtendPost();
        $user = Auth::user();
        $r->room_id = $room_id;
        $r->user_id = $user->id;
        $r->quantity = $request->input('quantity');
        $r->unit_date = $unit_date;
        $r->phone = $user->phone;
        if($unit_date == 1) { // tuan
            $total_price = $p*$q;
        } else if ($unit_date == 2 ) { // thang
            $total_price = $p*$q*4;
        } else { // nam
            $total_price = $p*$q*52;
        }
        $r->total_price = $total_price;
        $r->save();
        return redirect()->route('owner.room.index')->with('msg', 'Gửi yêu cầu gia hạn bài viết thành công. Vui lòng đợi Admin phê duyệt');
    }

    public function login()
    {
        if(!Auth::check()) {
            return view('owner.login');
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
                if($user->role_id == 2 ) {
                    return redirect()->route('owner.room.index');
                } else if($user->role_id == 1 || $user->role_id == 3) {
                    Auth::logout();
                    return redirect()->back()->with('msg', 'Bạn không có quyền truy cập vào quản lý owner');
                }
            }
        }
        return redirect()->back()->with('msg', 'Email hoặc Password không chính xác');
    }



    public function register() {
        return view('owner.register');
    }

    public function postRegister(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);

        $is_active = 0;
        //luu vào csdl
        $user = new User();
        $user->name = $request->input('name'); // họ tên
        $user->birthday = $request->input('birthday');
        $user->phone = $request->input('phone');
        $user->cmnd = $request->input('cmnd');
        $user->email = $request->input('email'); // email
        $user->password = bcrypt($request->input('password')); // mật khẩu
        $user->role_id = 2; // phần quyền
        $user->address = $request->input('address');
        if ($request->hasFile('avatar')) {
            // get file
            $file = $request->file('avatar');
            // get ten
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/user/';
            // upload file
            $request->file('avatar')->move($path_upload,$filename);

            $user->image = $path_upload.$filename;
        }

        $user->is_active = $is_active;
        $user->save();

        // chuyen dieu huong trang
        return redirect()->back()->with('msg', 'Đăng ký tài khoản thành công. Vui lòng đợi Admin phê duyệt');
    }

    public function viewCreateRoom() {
        $typeRoom = Room_type::all();
        $city = City::all();
        $facility = Facilities::all();
        return view('owner.room.create', [
            'typeRoom' => $typeRoom,
            'city' => $city,
            'facility' => $facility
        ]);
    }

    public function storeRoom(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);
        $user = Auth::user();
        $room = new Room(); // khởi tạo model
        $room->roomType_id = $request->input('typeRoom');
        $room->title = $request->input('title');
        $room->address = $request->input('address');
        $room->district_id = $request->input('district');
        $room->city_id = $request->input('city');
        $room->quantity = $request->input('quantity');
        $room->price = $request->input('price');
        $room->price_unit = $request->input('priceUnit');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path_upload = 'uploads/room/';
            $request->file('image')->move($path_upload, $filename);
            $room->image = $path_upload . $filename;
        }
        $room->area = $request->input('area');
        $room->note = $request->input('note');
        $room->description = $request->input('description');
        $live_with_owner = 0;
        if ($request->has('with_owner')) {
            $live_with_owner = $request->input('with_owner');
        }
        $room->live_with_owner = $live_with_owner;

        $room->electric_price = $request->input('electricPrice');
        $room->water_price = $request->input('waterPrice');
        $room->user_id = $user->id;
        $is_active = 0;
        $room->is_active = $is_active;
        $facilities = $request->input('facilities');
        $room->save();
        if ($request->hasFile('detailImage')) {
            $file = $request->file('detailImage');
            $path_upload = 'uploads/room/';
            foreach ($file as $key => $item){
                $r_image = new Room_image();
                $r_image->room_id = $room->id;
                $r_image->position = $key;
                $f_name = time().'_'.$item->getClientOriginalName();
                $item->move($path_upload, $f_name);
                $r_image ->image = $path_upload.$f_name;
                $r_image->save();
            };
        }
        $room->Facilities()->syncWithoutDetaching($facilities);
        return redirect()->route('owner.room.index')->with('msg', 'Tạo Phòng Thành Công.Đợi Admin Duyệt');
    }

    public function viewEditRoom($id)
    {
        $room = Room::findorFail($id);
        $typeRoom = Room_type::all();
        $facility = Facilities::all();
        $room_facilities = Room_facilities::where(['room_id' => $id])->get();
        $exists_facilities = [];
        $room_detailImages =  Room_image::where(['room_id' => $room->id ])->orderBy('position', 'ASC')->get();
        $city = City::all();
        $district = District::all();
        foreach($room_facilities as $item) {
            array_push($exists_facilities,$item->facilities_id );
        }
        $arrPickedCity = DB::table('room')->join('city', 'room.city_id', '=', 'city.id')->where([
            'room.id' => $id
        ])->get();
        $pickedCity = $arrPickedCity[0];
        $arrPickedDistrict = DB::table('room')->join('district', 'room.district_id', '=', 'district.id')->where([
            'room.id' => $id
        ])->get();
        $pickedDistrict = $arrPickedDistrict[0];
        $arrPickedTypeRoom = DB::table('room')->join('room_type', 'room.roomType_id', '=', 'room_type.id')->where([
            'room.id' => $id
        ])->get();
        $pickedTypeRoom = $arrPickedTypeRoom[0];

        return view('owner.room.edit', [
            'room' => $room,
            'typeRoom' => $typeRoom,
            'city' => $city,
            'district' => $district,
            'facility' => $facility,
            'room_detailImages' => $room_detailImages,
            'exists_facilities' => $exists_facilities,
            'pickedCity'=> $pickedCity,
            'pickedDistrict' => $pickedDistrict,
            'pickedTypeRoom' =>$pickedTypeRoom
        ]);
    }

    public function extendDate($roomId)
    {
        $data = Room::findOrFail($roomId);
        return view('owner.room.extend', [
            'data' => $data,
        ]);
    }

    public function requestEditRoom($room_id)
    {
        $room = Room::findOrFail($room_id);
        return view('owner.room.requestEditRoom', [
            'room_id' => $room_id,
            'room_title' => $room->title
        ]);
    }
    public function sendRequestEditRoom(Request $request)
    {
        $r = new RequestEditRoom();
        $user = Auth::user();
        $r->user_id = $user->id;
        $r->room_id = $request->input('room_id');
        $r->reason = $request->input('reason');
        $r->save();

        return redirect()->route('owner.room.show', ['id'=> $request->input('room_id') ]);
    }

    public function getAllNotification()
    {
        $user = Auth::user();
        $data = Notify::where(['receive_id' => $user->id]);
        return json_encode($data); // lam js sau
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('owner.showProfile', [
            'user'=> $user
        ]);
    }
}
